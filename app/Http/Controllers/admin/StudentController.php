<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Year;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Student;
use App\Models\admin\school\School;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\StudentCurrentRecord;
use App\Models\admin\school\School_registration;

class StudentController extends Controller
{
    public function index()
    {
        $page_title = 'Student Info ';
        $active = 'student_creation';
        $schools = School::eligible()->get();
        $products = Product::active()->get();
        $classes = Classes::active()->get();
        $years = Year::eligible()->pluck('year_id','year');
        return view('admin.student.student_creation', compact('page_title', 'active','schools','products','classes','years'));
    }
    public function fetch_level(Request $request)
    {
        $product_id = $request->input('product_id');
        $level = Material_category::where('deleted', 0)
        ->where('status', 1)
        ->where('product_id', $product_id)
        ->orderBy('id', 'asc')
        ->first();
        $to_send = '<option value="' . $level->material_category_id . '">' . $level->level . '</option>';
        return response()->json(['result' => $to_send]);
    }
    // both admin and coordinator use this function to save student details into db
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'school_id' => 'required',
            'product_id' => 'required',
            'material_category_id' => 'required',
            'class_id' => 'required',
            'student_name' => 'required|string',
            'student_username' => 'required',
            'email' => 'required|email',
            'mobile' =>'required|numeric',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'year_id' => 'required',

        ])->setAttributeNames([
            'school_id' => 'School ',
            'product_id' => 'Product ',
            'material_category_id' => 'Level',
            'class_id' => 'Class',
            'student_name' => 'Student Name',
            'student_username' => 'Student Username',
            'email' => 'Email Address',
            'mobile' => 'Mobile Number',
            'year_id' => 'Year',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Student::create([
                'school_id' => $request->input('school_id'),
                'product_id' => $request->input('product_id'),
                'material_category_id' => $request->input('material_category_id'),
                'class_id' => $request->input('class_id'),
                'student_name' => $request->input('student_name'),
                'student_username' => $request->input('student_username'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' =>bcrypt($request->input('password')) ,
                'year_id'=>$request->input('year_id')
            ]);
            if ($data) {
                $current_inserted_student_id = $data->student_id;
                $student_current_data = StudentCurrentRecord::create([
                    'student_id' => $current_inserted_student_id,
                    'product_id' => $request->input('product_id'),
                    'material_category_id' => $request->input('material_category_id'),
                    'class_id' => $request->input('class_id'),
                    'year_id'=>$request->input('year_id'),
                    'current_level_material_purchase_status' => 0
                ]);
                if($student_current_data){
                    return response()->json(['response' => 'success', 'message' => 'Student Successfully Created']);
                }else{
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }

        }
    }
    public function all_students()
    {
        $studentModel = new Student();
        $page_title = 'Student  ';
        $active = 'all_student';
        $allStudents = $studentModel->getAllStudents();
        return view('admin.student.all_students', compact('page_title', 'active','allStudents'));
    }

    //// coordinator registering student
    public function coordinatorStudentRegistration()
    {
        $schoolRegistrationModel = new School_registration();
        $page_title = 'Student Info ';
        $active = 'coordinator_student_creation';
        $schools = $schoolRegistrationModel->coordinatorSchools();
        $products = Product::active()->get();
        $classes = Classes::active()->get();
        $years = Year::eligible()->pluck('year_id','year');
        return view('coordinator.student.coordinator_student_creation', compact('page_title', 'active','years','schools','products','classes'));
    }
    public function coordinatorStudentList(){
        $page_title = 'Student Info ';
        $active = 'student_creation';
        $coordinatorId = auth()->user()->coordinator_id;

        $students = Student::with([
            'studentCurrentRecord',
            'school' => function ($query) use ($coordinatorId) {
                $query->whereHas('schoolRegistration', function ($query) use ($coordinatorId) {
                    $query->where('coordinator_id', $coordinatorId);
                })->with('schoolRegistration.coordinator');
            },
            'class',
            'product',
        ])->active()->get();
        
        return view('coordinator.student.coordinator_all_students', compact('page_title', 'active','students'));
    }


    // student profile- in student login section
    public function profile(){
        $page_title = 'Profile';
        $active = 'student_profile';
        $currentLevel = StudentCurrentRecord::where('student_id', auth()->user()->student_id)
        ->join('material_categories', 'student_current_records.material_category_id', '=', 'material_categories.material_category_id')
        ->value('material_categories.level');
        return view('student.student_profile', compact('page_title', 'active','currentLevel'));
    }
    public function profileUpdate(Request $request){
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'student_name' => 'required|string',
                'email' => 'required|email',
                'mobile' =>'required|numeric',
                'address' => 'required',
                'parent_name' => 'required',
                'parent_email' => 'required|email',
                'parent_mobile' => 'required|numeric',
                'parent_occupation' => 'required',
            ])->setAttributeNames([
                'student_name' => 'Student Name',
                'email' => 'Email Address',
                'mobile' => 'Mobile Number',
                'parent_name' => 'Parent name',
                'parent_email' => 'Parent email',
                'parent_mobile' => 'Parent mobile',
                'parent_occupation' => 'Parent occupation',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = Student::where('student_id',auth()->user()->student_id)->update([
                    'student_name' => $request->input('student_name'),
                    'email' => $request->input('email'),
                    'mobile' => $request->input('mobile'),
                    'address' => $request->input('address'),
                    'parent_name' => $request->input('parent_name'),
                    'parent_email' => $request->input('parent_email'),
                    'parent_mobile' => $request->input('parent_mobile'),
                    'parent_occupation' => $request->input('parent_occupation'),
                ]);
                if($data){
                    return response()->json(['response' => 'success', 'message' => 'Profile Updated']);
                }else{
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }   
     }

     // school register student
     public function schoolStudentRegistration()
     {
         $page_title = 'Student Info ';
         $active = 'school_student_creation';
         $products = Product::active()->get();
         $classes = Classes::active()->get();
         $years = Year::eligible()->pluck('year_id','year');
         return view('school.student.add_student', compact('page_title', 'active','products','classes','years'));
     }

     public function schoolStudentCreation(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'material_category_id' => 'required',
            'class_id' => 'required',
            'student_name' => 'required|string',
            'student_username' => 'required',
            'email' => 'required|email',
            'mobile' =>'required|numeric',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'year_id' => 'required',

        ])->setAttributeNames([
            'product_id' => 'Product ',
            'material_category_id' => 'Level',
            'class_id' => 'Class',
            'student_name' => 'Student Name',
            'student_username' => 'Student Username',
            'email' => 'Email Address',
            'mobile' => 'Mobile Number',
            'year_id' => 'Year',

        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = Student::create([
                'school_id' => auth()->user()->school_id,
                'product_id' => $request->input('product_id'),
                'material_category_id' => $request->input('material_category_id'),
                'class_id' => $request->input('class_id'),
                'student_name' => $request->input('student_name'),
                'student_username' => $request->input('student_username'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' =>bcrypt($request->input('password')) ,
                'year_id'=>$request->input('year_id')

            ]);
            if ($data) {
                $current_inserted_student_id = $data->student_id;
                $student_current_data = StudentCurrentRecord::create([
                    'student_id' => $current_inserted_student_id,
                    'product_id' => $request->input('product_id'),
                    'material_category_id' => $request->input('material_category_id'),
                    'class_id' => $request->input('class_id'),
                    'year_id'=>$request->input('year_id'),
                    'current_level_material_purchase_status' => 0
                ]);
                if($student_current_data){
                    return response()->json(['response' => 'success', 'message' => 'Student Successfully Created']);
                }else{
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }

        }
    }
    // student list in school
    public function schoolStudentList(){
        $page_title = 'Students ';
         $active = 'school_student_list';
        // $students = Student::with('studentCurrentRecord','class')->active()->where('school_id',auth()->user()->school_id)->first();
        $students = Student::with('studentCurrentRecord','class','product','class')->active()->where('school_id','=',auth()->user()->school_id)->get();
         return view('school.student.all_students', compact('page_title', 'active','students'));
    }
    // end of controller
}
