<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\AdminResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminResourceController extends Controller
{
    public function index()
    {
        $page_title = 'Upload Resources  ';
        $active = 'r_upload';
        $files = AdminResource::where('status',1)->where('deleted',0)->get();
        return view('admin.admin_resource', compact('page_title', 'active','files'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'file_name' => 'required',
                'resource' => 'required|file|mimes:pdf,docx,doc,php,jpg,jpeg,png|max:9048',
                
            ])->setAttributeNames([
                'file_name' => 'File Name',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                if ($request->hasFile('resource')) {
                    $file = $request->file('resource');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    // Use the "project_uploads" disk
                    $file->storeAs('admin_resource', $fileName, 'project_uploads');
                    // Save the complete path in the database
                    $path = 'project_uploads/admin_resource/' . $fileName;
                    $data = AdminResource::create([
                        'file_name' => $request->input('file_name'),
                        'file_details' => $request->input('file_details'),
                        'file_path' => $path,
                    ]);
                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Resource Uploaded  ']);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
                
            }
        } else {
            return Redirect::route('login');
        }
    }

    public function allResource(){
        $page_title = 'Resources  ';
        $active = 'school_resources';
        $files = AdminResource::where('status',1)->where('deleted',0)->get();
        return view('school.resource', compact('page_title', 'active','files'));
    }
    // end of controller
}
