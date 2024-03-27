<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\OfficeContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OfficeContactController extends Controller
{
    public function index()
    {
        $page_title = 'Office Contact ';
        $active = 'office_contact';
        $officeContact = OfficeContact::first();
        return view('admin.office_contact', compact('page_title', 'active','officeContact'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'office_name' => 'required',
                'email' => 'required|email',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
            ])->setAttributeNames([
                'office_name' => 'Office Name ',
                'mobile_number' => 'Mobile Number ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {

                $data = OfficeContact::updateOrCreate([],[
                    'office_name' => $request->input('office_name'),
                    'mobile_number' => $request->input('mobile_number'),
                    'address' => $request->input('address'),
                    'email' => $request->input('email'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'success']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function studentOfficeContact(){
        $page_title = 'Office Contact ';
        $active = 'student_contact';
        $coordinator = Student::with('school','school.schoolRegistration.coordinator')->active()->where('student_id',auth()->user()->student_id)->first();
        $nationalCoordinator = Student::with('school','school.schoolState.nationalCoordinator.coordinator')->active()->where('student_id',auth()->user()->student_id)->first();
        $officeContact = OfficeContact::first();
        return view('student.student_office_contact', compact('page_title', 'active','coordinator','nationalCoordinator','officeContact')); 
    }
    // end of controller
}
