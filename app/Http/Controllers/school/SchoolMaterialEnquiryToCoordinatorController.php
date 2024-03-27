<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Material;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\school\SchoolMaterialEnquiry;

class SchoolMaterialEnquiryToCoordinatorController extends Controller
{
    public function fetch_level(Request $request)
    {
        $product_id = $request->input('product_id');
        $category_level = Material_category::where('deleted', 0)->where('product_id', $product_id)->get();
        $to_send = '<option disabled selected >Select Level</option>';
        foreach ($category_level as $row) {
            $to_send .= '<option value="' . $row->material_category_id . '">' . $row->level . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function fetch_material(Request $request)
    {
        $product_id = $request->input('product_id');
        $level_id = $request->input('level_id');
        $class_id = $request->input('class_id');
        $material = Material::where('product_id', $product_id)->where('material_category_id', $level_id)->where('class_id', $class_id)->first();
        if ($material) {
            $to_send = '<option value="' . $material->material_id . '">' . $material->material_name . '</option>';
        } else {
            $to_send = '<option value="">No material found</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function index()
    {
        $smeModel = new SchoolMaterialEnquiry();
        $page_title = 'Material Enquiry List';
        $active = 'material_enquiry';
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->get();
        $materialEnquiry = $smeModel->schoolMaterialEnquiry();
        // $studentDetails = Student::where('student_id', 'stud6')->first();
        // $productName = Product::where('product_id', $studentDetails->product_id)->value('product_name');
        // $className = Classes::where('class_id', $studentDetails->class_id)->value('class');
        // $levelName = Material_category::where('material_category_id', $studentDetails->material_category_id)->value('level');
        // $materialData = Material::where('class_id', $studentDetails->class_id)->where('product_id', $studentDetails->product_id)->where('material_category_id', $studentDetails->material_category_id)->first();
        return view('school.school_material_enquiry_to_coordinator', compact('page_title', 'active', 'products', 'classes','materialEnquiry'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
            'sc_product_id' => 'required',
            'sc_material_category_id' => 'required',
            'sc_class_id' => 'required',
            'sc_material_id' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = SchoolMaterialEnquiry::create([
                    'school_id' => 'schl2',
                    'coordinator_id' => 'cord1',
                    'product_id' => $request->input('sc_product_id'),
                    'material_category_id' => $request->input('sc_material_category_id'),
                    'class_id' => $request->input('sc_class_id'),
                    'material_id' => $request->input('sc_material_id')
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

    // end of controller
}
