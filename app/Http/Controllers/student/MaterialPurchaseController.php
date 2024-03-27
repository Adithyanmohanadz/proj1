<?php

namespace App\Http\Controllers\student;

use App\Models\admin\school\School_registration;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Student;
use App\Models\school\SchoolStock;
use App\Http\Controllers\Controller;
use App\Models\student\MaterialEnquiry;
use App\Models\student\MaterialPurchase;
use Illuminate\Support\Facades\Redirect;
use App\Models\admin\StudentCurrentRecord;
use App\Models\school\SchoolMaterialEnquiry;

class MaterialPurchaseController extends Controller
{
    public function index()
    {
        $meModel = new MaterialEnquiry();
        $page_title = 'Material Purchase List';
        $active = 'material_purchase';
        $materialEnquiry = $meModel->studentMaterialEnquiry();
        return view('student.material_enquiry', compact('page_title', 'active', 'materialEnquiry'));
    }

    public function materialPurchase(Request $request)
    {
        if ($request->ajax()) {
            $insert = MaterialPurchase::create([
                'school_id' => $request->input('school_id'),
                'student_id' => auth()->user()->student_id,
                'product_id' => $request->input('product_id'),
                'material_category_id' => $request->input('level_id'),
                'class_id' => $request->input('class_id'),
                'material_id' => $request->input('material_id'),
                'coordinator_id' => $request->input('coordinator_id'),
            ]);
            if ($insert) {
                $update = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->update(['current_level_material_purchase_status' => 1,'type_of_exam' => 'mock']);
                // checking the current school stock
                $currentStock = SchoolStock::where('material_id', $request->input('material_id'))->where('school_id',$request->input('school_id'))->value('stock_quantity');
                // updating current school stock 
                SchoolStock::where('material_id', $request->input('material_id'))->where('school_id',$request->input('school_id'))->update(['stock_quantity' => $currentStock - 1]);
                if ($currentStock <= 0) {
                    SchoolMaterialEnquiry::create([
                        'school_id' =>  $request->input('school_id'),
                        'coordinator_id' => $request->input('coordinator_id'),
                        'product_id' => $request->input('product_id'),
                        'material_category_id' => $request->input('level_id'),
                        'class_id' => $request->input('class_id'),
                        'material_id' => $request->input('material_id')
                    ]);
                }

                return response()->json(['response' => 'success', 'message' => 'Yor Payment Successful','stock' => $currentStock]);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        } else {
            return Redirect::route('login');
        }
    }
}
