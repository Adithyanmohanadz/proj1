<?php

namespace App\Http\Controllers\student;

use App\Models\admin\StudentCurrentRecord;
use App\Models\student\MaterialEnquiry;
use App\Models\student\MaterialPurchase;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Student;
use App\Models\admin\Material;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MaterialEnquiryController extends Controller
{
    public function index()
    {
        $meModel = new MaterialEnquiry();
        $page_title = 'Material Enquiry List';
        $active = 'material_enquiry';
        $materialEnquiry = $meModel->studentMaterialEnquiry();
        $studentDetails = Student::where('student_id', 'stud6')->first();
        $productName = Product::where('product_id', $studentDetails->product_id)->value('product_name');
        $className = Classes::where('class_id', $studentDetails->class_id)->value('class');
        $levelName = Material_category::where('material_category_id', $studentDetails->material_category_id)->value('level');
        $materialData = Material::where('class_id', $studentDetails->class_id)->where('product_id', $studentDetails->product_id)->where('material_category_id', $studentDetails->material_category_id)->first();
        return view('student.material_enquiry', compact('page_title', 'active','studentDetails','productName','className','levelName','materialData','materialEnquiry'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = MaterialEnquiry::create([
                    'school_id' => $request->input('school_id'),
                    'student_id' => 'stud6',
                    'product_id' => $request->input('product_id'),
                    'material_category_id' => $request->input('level_id'),
                    'class_id' => $request->input('class_id'),
                    'material_id' => $request->input('material_id')
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Yor Enquiry Successfully Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }  
    }

    public function materialPurchase(Request $request){
        if ($request->ajax()) {
           $update= StudentCurrentRecord::where('student_id','stud6')->update(['current_level_material_purchase_status' => 1]);
           if($update){
            return response()->json(['response' => 'success', 'message' => 'Purchase Completed']);
           }else{
            return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
           }
        } else {
            return Redirect::route('login');
        }  
    }
    // end of controller
}
