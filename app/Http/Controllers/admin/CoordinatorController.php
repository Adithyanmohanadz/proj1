<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Coordinator;
use App\Models\admin\ledger\AdminLedger;
use App\Models\admin\ledger\CoordinatorOutstanding;
use Illuminate\Http\Request;
use App\Models\admin\location\City;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use App\Models\admin\location\Country;
use App\Models\admin\location\Pincode;
use App\Models\admin\NationalCoordinator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller
{
    public function index()
    {
        $page_title = 'Coordinator Info';
        $active = 'coordinator_creation';
        $countries = Country::where('deleted', 0)->where('status', 1)->get();
        $pincodes = Pincode::where('deleted', 0)->where('status', 1)->get();
        return view('admin.coordinator.coordinator_creation', compact('page_title', 'active', 'countries','pincodes'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'coordinator_name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'address' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'prefix' => 'required',
                'ob' => 'required',
                'pincode_id' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ])->setAttributeNames([
                'country_id' => 'Country ',
                'state_id' => 'State ',
                'city_id' => 'City',
                'pincode_id' => 'Pincode',
                'ob' => 'Opening balance',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = Coordinator::create([
                    'coordinator_name' => $request->input('coordinator_name'),
                    'username' => $request->input('username'),
                    'mobile' => $request->input('mobile'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                    'prefix_number' =>$request->input('prefix'),
                    'opening_balance' => $request->input('ob'),
                    'country_id' => $request->input('country_id'),
                    'state_id' => $request->input('state_id'),
                    'city_id' => $request->input('city_id'),
                    'pincode_id' => $request->input('pincode_id'),
                    'password' => bcrypt($request->input('password')),
                ]);
                if ($data) {
                    AdminLedger::create([
                        'coordinator_id' =>  $data->coordinator_id, 
                        'affected_date' => now(),
                        'in' =>  $request->input('ob'),
                        'balance' => $request->input('ob'),
                        'opening_balance' => 1
                    ]);
                    CoordinatorOutstanding::create([
                        'coordinator_id' =>  $data->coordinator_id, 
                        'total_in' => $request->input('ob'),
                        'total_out' => 0.00,
                        'total_outstanding' => $request->input('ob'),
                    ]);

                    return response()->json(['response' => 'success', 'message' => 'Coordinator Successfully Created']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function allCoordinators()
    {
        $page_title = 'Coordinators';
        $active = 'all_coordinator';
        $coordinators = Coordinator::with( 'city', 'state', 'country', 'pincode','coordinatorOutstanding')->active()->get();
        return view('admin.coordinator.all_coordinators', compact('page_title', 'active','coordinators'));
    }
    public function profile()
    {
        $page_title = 'Profile';
        $active = 'coordinator_profile';
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $pincodes = Pincode::all();

        return view('coordinator.profile', compact('page_title', 'active', 'cities', 'states', 'countries', 'pincodes'));
    }

    public function profileEdit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'coordinator_name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'address' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'pincode_id' => 'required',
            ])->setAttributeNames([
                'country_id' => 'Country ',
                'state_id' => 'State ',
                'city_id' => 'City',
                'pincode_id' => 'Pincode',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                // Fetch the coordinator record using coordinator_id
                $coordinator = Coordinator::find(auth()->user()->id);
                if ($coordinator) {
                    // Update the coordinator fields
                    $coordinator->update([
                        'coordinator_name' => $request->input('coordinator_name'),
                        'mobile' => $request->input('mobile'),
                        'email' => $request->input('email'),
                        'address' => $request->input('address'),
                        'country_id' => $request->input('country_id'),
                        'state_id' => $request->input('state_id'),
                        'city_id' => $request->input('city_id'),
                        'pincode_id' => $request->input('pincode_id'),
                    ]);
                    return response()->json(['response' => 'success', 'message' => ' Successfully Updated']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Coordinator not found']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    ////////////////////////////////// creating National coordinator //////////////////////////////

    public function nationalCoordinator(){
        $page_title = 'National coordinators';
        $active = 'all_coordinator';
        $states = State::doesntHave('nationalCoordinator')->get();
        $coordinators = Coordinator::where('status',1)->where('deleted',0)->get();
        $nationalCoordinators =  NationalCoordinator::with('coordinator','state')->where('status',1)->where('deleted',0)->get();
        return view('admin.coordinator.national_coordinator', compact('page_title', 'active','states','coordinators','nationalCoordinators'));
    }

    public function nationalCoordinatorStore(Request  $request){
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'state_id' => 'required',
                'coordinator_id' => 'required',

            ])->setAttributeNames([
                'coordinator_id' => 'Coordinator ',
                'state_id' => 'State ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $result = NationalCoordinator::create([
                    'state_id' => $request->input('state_id'),
                    'coordinator_id' => $request->input('coordinator_id')
                ]);
                if($result) {
                    return response()->json(['response' => 'success', 'message' => 'National Coordinator Successfully Created']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
