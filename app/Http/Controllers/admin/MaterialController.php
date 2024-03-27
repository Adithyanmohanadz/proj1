<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Material;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use App\Models\admin\StudentCurrentRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function index()
    {
        $page_title = 'Material Creation ';
        $active = 'material_creation';
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->orderBy('class_id', 'asc')->get();
        return view('admin.material.material_creation', compact('page_title', 'active', 'classes', 'products'));
    }

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

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'category_level_id' => 'required',
                'class_id' => 'required',
                'material_name' => 'required',
                'material_price' => 'required|numeric',
                'material_resource' => 'file|mimes:pdf,docx,doc|max:9048', // Adjust file validation rules
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $alreadyExist = Material::where('product_id', $request->input('product_id'))
                    ->where('material_category_id', $request->input('category_level_id'))
                    ->where('class_id', $request->input('class_id'))
                    ->where('status', 1)->where('deleted', 0)->first();
                if ($alreadyExist) {
                    return response()->json(['response' => 'error', 'message' => 'Material already created for this product-level-class']);
                } else {
                    if ($request->hasFile('material_resource')) {
                        $file = $request->file('material_resource');
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        // Use the "project_uploads" disk
                        $file->storeAs('materials', $fileName, 'project_uploads');
                        // Save the complete path in the database
                        $path = 'project_uploads/materials/' . $fileName;
                    } else {
                        $path = null;
                    }
                    $data = Material::create([
                        'material_name' => $request->input('material_name'),
                        'material_price' => $request->input('material_price'),
                        'product_id' => $request->input('product_id'),
                        'material_category_id' => $request->input('category_level_id'),
                        'class_id' => $request->input('class_id'),
                        'material_resource' => $path
                    ]);
                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Material Successfully Created']);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function all_materials(){
        $page_title = 'Material List';
        $active = 'all_material';
        $materials = Material::with('product','materialCategory','class')->active()->get();
        return view('admin.material.all_materials', compact('page_title', 'active','materials'));
    }

    public function studentE_resource(){
        $page_title = 'E-resource ';
        $active = 'student_e_resources';
        $studentData = StudentCurrentRecord::where('student_id',auth()->user()->student_id)->first();
        $material = Material::where('product_id',$studentData->product_id)->where('material_category_id',$studentData->material_category_id)
          ->where('class_id',$studentData->class_id)->first();
        return view('student.e_resource', compact('page_title', 'active','material'));
    }
    // end of class
}
