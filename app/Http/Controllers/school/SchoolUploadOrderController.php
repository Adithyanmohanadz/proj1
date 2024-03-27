<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Coordinator;
use App\Models\admin\school\School;
use App\Models\admin\school\School_registration;
use App\Models\school\SchoolUploadOrder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SchoolUploadOrderController extends Controller
{
    public function index()
    {
        $page_title = 'Upload School Order';
        $active = 'school_order';
        $files = SchoolUploadOrder::where('school_id', auth()->user()->school_id)->where('status', 1)->where('deleted', 0)->get();
        return view('school.school_upload_order', compact('page_title', 'active', 'files'));
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
                    $file->storeAs('school_upload_orders', $fileName, 'project_uploads');
                    // Save the complete path in the database
                    $path = 'project_uploads/school_upload_orders/' . $fileName;
                    $data = SchoolUploadOrder::create([
                        'school_id' => auth()->user()->school_id,
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

    public function coordinatorSchoolOrderView()
    {
        $page_title = 'View School Order';
        $active = 'coordinator_school_order';
        $schools = School_registration::with('school')
            ->where('coordinator_id', auth()->user()->coordinator_id)
            ->where('status', 1)
            ->where('deleted', 0)
            ->whereHas('school', function ($query) {
                $query->where('registered', 1);
            })
            ->get();

        return view('coordinator.school_orders', compact('page_title', 'active', 'schools'));
    }

    // coordinator viewing school order files
    public function coordinatorSchoolOrderById(Request $request)
    {
        if ($request->ajax()) {
            $schoolId = $request->input('school_id');
            if ($request->filled('school_id')) {
                $schoolUploads = SchoolUploadOrder::with('school')->where('school_id', $schoolId)->get();
                $toSend = '';
                $index = 0;
                foreach ($schoolUploads as $rows) {
                    $index++;
                    $toSend .= '
                    <tr>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">' . $index . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $rows->school->school_name . '</p>
                        </td>  
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $rows->file_name . '</p>
                        </td> 
                        <td class="text-sm">
                                
                            <a href="' . $rows->file_path . '" download="' . $rows->file_name . '" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="download">
                                <i class="material-icons text-info position-relative text-lg">download</i>
                            </a> 
                        </td>
                    </tr>
                ';
                }
                return response()->json(['response' => 'success', 'result' => $toSend]);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Please select School']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // admin viewing school order files
    public function adminSchoolOrderView()
    {
        $page_title = 'View School Order';
        $active = 'school_order_file';
        $coordinators = Coordinator::active()->pluck('coordinator_id', 'coordinator_name');
        return view('admin.all_school_order_files', compact('page_title', 'active', 'coordinators'));
    }
    // fetch school based on coordinator
    public function fetch_schools(Request $request)
    {
        $coordinator_id = $request->input('coordinator_id');
        $schools = School_registration::with('school')->where('coordinator_id',$coordinator_id)->active()->get();
        $to_send = '<option disabled selected >Select School</option>';
        foreach ($schools as $row) {
            $to_send .= '<option value="' . $row->school->school_id . '">' . $row->school->school_name . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }

    public function adminSchoolOrderViewById(Request $request)
    {
        if ($request->ajax()) {
            $schoolId = $request->input('school_id');
            if ($request->filled('school_id')) {
                $schoolUploads = SchoolUploadOrder::with(['school', 'school.schoolRegistration.coordinator'])
                ->where('school_id', $schoolId)
                ->get();
                $toSend = '';
                $index = 0;
                foreach ($schoolUploads as $rows) {
                    $index++;
                    $toSend .= '
                    <tr>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">' . $index . '</p>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $rows->school->school_name . '</p>
                        </td>  
                        <td>
                        <p class="text-sm font-weight-bold mb-0">' . $rows->school->schoolRegistration->coordinator->coordinator_name . '</p>
                    </td>  
                        <td>
                            <p class="text-sm font-weight-bold mb-0">' . $rows->file_name . '</p>
                        </td> 
                        <td class="text-sm">
                                
                            <a href="' . $rows->file_path . '" download="' . $rows->file_name . '" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="download">
                                <i class="material-icons text-info position-relative text-lg">download</i>
                            </a> 
                        </td>
                    </tr>
                ';
                }
                return response()->json(['response' => 'success', 'result' => $toSend]);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Please select School']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
