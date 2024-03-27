<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\student\MaterialEnquiry;
use Illuminate\Support\Facades\Redirect;

class StudentMaterialEnquiryController extends Controller
{
    public function index()
    {
        $materialEnquiryModel = new MaterialEnquiry();
        $page_title = 'Students Material Enquires';
        $active = 'studentMaterialEnquiry';
        $allEnquires = $materialEnquiryModel->allStudentMaterialEnquires();
        return view('school.student_material_enquiry_list', compact('page_title', 'active', 'allEnquires'));
    }

    public function materialAvailable(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id');
            $result = MaterialEnquiry::where('material_enquiry_id',$id)->update(['material_availability'=>1,'status'=> 0]);
            if($result){
                return response()->json(['response' => 'success', 'message' => 'Enquiry Status Updated']);
            }else{
                return response()->json(['response' => 'error', 'message' => 'Something went wong']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
