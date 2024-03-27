<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Coordinator;
use App\Models\admin\location\City;
use App\Models\admin\school\School;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use App\Models\admin\location\Country;
use App\Models\admin\location\Pincode;
use App\Models\admin\OfficeContact;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\school\School_registration;
use Illuminate\Support\Facades\Storage;


class SchoolController extends Controller
{
    public function index()
    {
        $page_title = 'School Registration';
        $active = 'school_registration';
        $coordinators = Coordinator::where('deleted', 0)->where('status', 1)->get();
        $countries = Country::where('deleted', 0)->where('status', 1)->get();

        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->get();
        return view('admin.school.school_registration', compact('page_title', 'active', 'coordinators', 'countries', 'products', 'classes'));
    }
    // fetch state corresponding to country
    public function fetch_state(Request $request)
    {
        $country_id = $request->input('country_id');
        $state = State::where('deleted', 0)->where('country_id', $country_id)->get();
        $to_send = '<option disabled selected >Select State</option>';
        foreach ($state as $row) {
            $to_send .= '<option value="' . $row->state_id . '">' . $row->state . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    // fetch city corresponding to state
    public function fetch_city(Request $request)
    {
        $state_id = $request->input('state_id');
        $city = City::where('deleted', 0)->where('state_id', $state_id)->get();
        $to_send = '<option disabled selected >Select City</option>';
        foreach ($city as $row) {
            $to_send .= '<option value="' . $row->city_id . '">' . $row->city . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    // fetch schools corresponding to city
    public function fetch_school(Request $request)
    {
        $city_id = $request->input('city_id');
        $schools = School::where('registered', 0)->where('deleted', 0)->where('city', $city_id)->get();
        $to_send = '<option disabled selected >Select School</option>';
        foreach ($schools as $row) {
            $to_send .= '<option value="' . $row->school_id . '">' . $row->school_name . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    // school registration
    public function school_registration(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'coordinator_id' => 'required',
                'reg_school_id' => 'required',
                'reg_product_id' => 'required',
                'reg_class_id' => 'required',
                'principal_name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'school_files' => 'file|mimes:pdf,docx,doc,jpeg|max:9048', // Adjust file validation rules
            ])->setAttributeNames([
                'coordinator_id' => 'Coordinator ',
                'reg_school_id' => 'School ',
                'reg_product_id' => 'Product ',
                'reg_class_id' => 'Class ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if ($request->hasFile('school_files')) {
                    $file = $request->file('school_files');
                    $fileName = time() . '_' . $file->getClientOriginalName();

                    // Use the "project_uploads" disk
                    $file->storeAs('school', $fileName, 'project_uploads');
                    $path = 'project_uploads/school/' . $fileName;
                } else {
                    $path = null;
                }
                $data = School_registration::create([
                    'coordinator_id' => $request->input('coordinator_id'),
                    'school_id' => $request->input('reg_school_id'),
                    'product_id' => is_array($request->input('reg_product_id')) ? implode(',', $request->input('reg_product_id')) : $request->input('reg_product_id'),
                    'class_id' => is_array($request->input('reg_class_id')) ? implode(',', $request->input('reg_class_id')) : $request->input('reg_class_id'),
                    'school_principal_name' => $request->input('principal_name'),
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'school_file' => $path
                ]);

                if ($data) {
                    School::where('school_id', $request->input('reg_school_id'))->update(['registered' => 1]);
                    return response()->json(['response' => 'success', 'message' => 'School Successfully Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function registered_schools()
    {
        $schoolRegistrationModel = new School_registration();
        $page_title = 'Registered Schools';
        $active = 'registered_school';
        $all_schools = $schoolRegistrationModel->getAllRegisteredSchools();

        return view('admin.school.registered_school', compact('page_title', 'active', 'all_schools'));
    }
    // admin to approve or disapprove school
    public function adminApproveOrDisapproveSchool(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id');
            // if 'disapprove' variable  is present that means disapprove
            $status = $request->input('disapprove') ? 0 : 1;
            $result = School_registration::where('school_registration_id',$id)->update(['status' => $status]);
            if ($result) {
                return response()->json(['response' => 'success', 'message' => 'success']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function all_schools()
    {
        $page_title = 'List of Schools';
        $active = 'all_school_list';
        $schools = School::with('schoolCity','schoolState','schoolCountry')->active()->get();
        return view('admin.school.all_school_list', compact('page_title', 'active','schools'));
    }
    public function add_school()
    {
        $page_title = 'Add School';
        $active = 'all_school_list';
        $countries = Country::where('deleted', 0)->where('status', 1)->get();
        $states = State::where('deleted', 0)->where('status', 1)->get();
        $cities = City::where('deleted', 0)->where('status', 1)->get();
        $pincodes = Pincode::where('deleted', 0)->where('status', 1)->get();
        return view('admin.school.add_school', compact('page_title', 'active', 'countries', 'states', 'cities', 'pincodes'));
    }

    public function add_school_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode_id' => 'required'
        ])->setAttributeNames([
            'school_name' => 'School Name',
            'email' => 'Email Address',
            'mobile' => 'Mobile Number',
            'country_id' => 'Country ',
            'state_id' => 'State',
            'city_id' => 'City',
            'pincode_id' => 'Pincode'
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = School::create([
                'school_name' => $request->input('school_name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'country' => $request->input('country_id'),
                'state' => $request->input('state_id'),
                'city' => $request->input('city_id'),
                'pincode' => $request->input('pincode_id'),
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'School Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }

    /// coordinator registering schools 
    public function coordinatorSchoolRegistration()
    {
        $page_title = 'School Registration';
        $active = 'coordinator_school_creation';
        $countries = Country::where('deleted', 0)->where('status', 1)->get();
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->get();
        return view('coordinator.school.coordinator_school_registration', compact('page_title', 'active', 'countries', 'products', 'classes'));
    }

    public function coordinatorSchoolRegistrationStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'cr_school_id' => 'required',
                'reg_product_id' => 'required',
                'reg_class_id' => 'required',
                'principal_name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'school_files' => 'file|mimes:pdf,docx,doc,jpeg|max:9048', // Adjust file validation rules
            ])->setAttributeNames([
                'cr_school_id' => 'School ',
                'reg_product_id' => 'Product ',
                'reg_class_id' => 'Class ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if ($request->hasFile('school_files')) {
                    $file = $request->file('school_files');
                    $fileName = time() . '_' . $file->getClientOriginalName();

                    // Use the "project_uploads" disk
                    $file->storeAs('school', $fileName, 'project_uploads');
                    $path = 'project_uploads/school/' . $fileName;
                } else {
                    $path = null;
                }
                $data = School_registration::create([
                    'coordinator_id' => auth()->user()->coordinator_id,
                    'school_id' => $request->input('cr_school_id'),
                    'product_id' => is_array($request->input('reg_product_id')) ? implode(',', $request->input('reg_product_id')) : $request->input('reg_product_id'),
                    'class_id' => is_array($request->input('reg_class_id')) ? implode(',', $request->input('reg_class_id')) : $request->input('reg_class_id'),
                    'school_principal_name' => $request->input('principal_name'),
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'school_file' => $path
                ]);

                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'School Successfully Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function allCoordinatorSchools()
    {
        $schoolRegistrationModel = new School_registration();
        $page_title = 'Registered Schools';
        $active = 'coordinator_all_school';
        $all_schools = $schoolRegistrationModel->getAllRegisteredSchoolsByCoordinator();
        return view('coordinator.school.all_schools', compact('page_title', 'active', 'all_schools'));
    }
    // school profile
    public function profile(){
        $page_title = 'School Info';
        $active = 'school_profile';
       $schoolProfile = School_registration::with('coordinator','school','school.schoolCity','school.schoolState','school.schoolPincode','school.schoolState.nationalCoordinator.coordinator')
       ->where('school_id',auth()->user()->school_id)
       ->first();
       $officeDetails = OfficeContact::first();
        return view('school.school_profile', compact('page_title', 'active','schoolProfile','officeDetails'));
    }

    // end of controller
}
