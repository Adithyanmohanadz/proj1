<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use App\Models\admin\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        $page_title = 'Create Notification';
        $active = 'news_notifications';
        $products = Product::active()->pluck('product_id', 'product_name');
        $classes = Classes::active()->pluck('class_id', 'class');
        return view('admin.notification.notification_creation', compact('page_title', 'active', 'products', 'classes'));
    }
    public function fetch_level(Request $request)
    {
        $product_id = $request->input('product_id');
        $category_level = Material_category::active()->where('product_id', $product_id)->get();
        $to_send = '<option disabled selected >Select Level</option>';
        foreach ($category_level as $row) {
            $to_send .= '<option value="' . $row->material_category_id . '">' . $row->level . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'not_product_id' => 'required',
                'not_material_category_id' => 'required',
                'not_class_id' => 'required',
                'title' => 'required',
                'notification_file' => 'required|file|mimes:pdf,docx,doc,jpeg|max:9048', // Adjust file validation rules
            ])->setAttributeNames([
                'not_product_id' => 'Product ',
                'not_material_category_id' => 'Level ',
                'not_class_id' => 'Class ',
                'notification_file' => 'File ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if($request->input('all')){
                    $coordinator = 1;
                    $school = 1;
                    $student = 1;
                }else{
                    if(empty($request->input('coordinator'))){$coordinator=0;}else{$coordinator=1;}
                    if(empty($request->input('school'))){$school=0;}else{$school=1;}
                    if(empty($request->input('student'))){$student=0;}else{$student=1;}
                }
                if ($request->hasFile('notification_file')) {
                    $file = $request->file('notification_file');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    // Use the "project_uploads" disk
                    $file->storeAs('notification', $fileName, 'project_uploads');
                    $path = 'project_uploads/notification/' . $fileName;
                } else {
                    $path = null;
                }
                $data = Notification::create([
                    'product_id' => $request->input('not_product_id'),
                    'level_id' => $request->input('not_material_category_id'),
                    'class_id' => $request->input('not_class_id'),
                    'title' =>  $request->input('title'),
                    'file_path' =>  $path,  
                    'school' => $school,
                    'coordinator'  => $coordinator,
                    'student' => $student
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Notification  Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function allNotification(){
        $page_title = ' Notifications';
        $active = 'news_notifications_list';
        $notifications = Notification::active()->get();
        return view('admin.notification.all_notification', compact('page_title', 'active','notifications'));
    }
    // notification in school
    public function schoolNotification(){
        $page_title = ' Notifications';
        $active = 'school_notification';
        $notifications = Notification::active()->where('school',1)->get();
        return view('school.school_notification', compact('page_title', 'active','notifications'));
    }
    // notification in student
    public function studentNotification(){
        $page_title = ' Notifications';
        $active = 'student_notification';
        $notifications = Notification::active()->where('student',1)->get();
        return view('student.student_notification', compact('page_title', 'active','notifications'));
    }
}
