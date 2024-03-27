<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\school\SchoolMaterialEnquiry;

class SchoolMaterialEnquiryController extends Controller
{
    public function index()
    {
        $schoolMaterialEnquiryModel = new SchoolMaterialEnquiry();
        $page_title = 'School Material Enquires';
        $active = 'school_material_enquiry';
        $allEnquires = $schoolMaterialEnquiryModel->allSchoolMaterialEnquires();
        return view('coordinator.school_material_enquiry_list', compact('page_title', 'active', 'allEnquires'));
    }

    public function materialAvailable(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id');
            $result = SchoolMaterialEnquiry::where('school_material_enquiry_id', $id)->update(['material_availability' => 1, 'status' => 0]);
            if ($result) {
                return response()->json(['response' => 'success', 'message' => 'Enquiry Status Updated']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wong']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
