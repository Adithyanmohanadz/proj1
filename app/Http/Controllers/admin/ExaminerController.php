<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Student;
use PhpParser\Node\Expr\Assign;
use App\Models\admin\Coordinator;
use Illuminate\Support\Facades\DB;
use App\Models\admin\location\City;
use App\Models\admin\school\School;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use App\Models\admin\examiner\Examiner;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\coordinator\examinerMeetLink;
use App\Models\admin\examiner\SchoolExaminer;
use App\Models\admin\school\School_registration;
use App\Models\admin\examiner\AssignExaminerToUser;

class ExaminerController extends Controller
{
    public function index()
    {
        $page_title = 'Examiners List ';
        $active = 'dashboard';
        $states = State::active()->pluck('state_id', 'state');
        $examiners = Examiner::with('state', 'city')->active()->get();
        return view('admin.examiner.examiner', compact('page_title', 'active', 'states', 'examiners'));
    }
    public function fetch_city(Request $request)
    {
        $state_id = $request->input('state_id');
        $cities = City::active()->where('state_id', $state_id)->get();
        $to_send = '<option disabled selected >Select City</option>';
        foreach ($cities as $row) {
            $to_send .= '<option value="' . $row->city_id . '">' . $row->city . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'examiner_name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'address' => 'required',
                'ex_state_id' => 'required',
                'ex_city_id' => 'required',

            ])->setAttributeNames([
                'examiner_name' => 'Examiner name ',
                'ex_state_id' => ' State ',
                'ex_city_id' => ' City ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $data = Examiner::create([
                    'examiner_name' => $request->input('examiner_name'),
                    'address' => $request->input('address'),
                    'mobile' => $request->input('mobile'),
                    'email' => $request->input('email'),
                    'state_id' => $request->input('ex_state_id'),
                    'city_id' => $request->input('ex_city_id'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Created']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    // assigning examiner to school
    public function schoolAssign()
    {
        $page_title = 'Assign To Schools ';
        $active = 'dashboard';
        $schools = School::active()->pluck('school_id', 'school_name');
        $coordinators = Coordinator::active()->pluck('coordinator_id', 'coordinator_name');
        $examinerSchools = SchoolExaminer::with('coordinator', 'examiner')->active()->get();
        $data = '';
        $index = 0;
        foreach ($examinerSchools as $rows) {
            $index++;
            $data .= '
            <tr>
                <td>
                    <p class="text-sm font-weight-bold mb-0">' . $index . '</p>
                </td>
                <td>
                    <p class="text-sm font-weight-bold mb-0">' . $rows->coordinator->coordinator_name . '</p>
                </td>
                <td>
                <p class="text-sm font-weight-bold mb-0">' . $rows->examiner->examiner_name . '</p>
            </td>
                <td>
                    <ul class="list-group">
           ';
            $schoolList = explode(',', $rows->school_id);
            foreach ($schoolList as $sh) {
                $school_name = School::where('school_id', $sh)->value('school_name');
                $data .= '<li class="list-group-item p-0 border-none">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">' . $school_name . '</span>
                            </span>
                        </li>';
            }
            $data .= '
                    </ul>
                </td>
                <td class="text-sm">
                    <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit    ">
                        <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                    </a>
                    <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="delete">
                        <i class="material-icons text-danger position-relative text-lg">delete</i>
                    </a>
                </td>
            </tr>
        ';
        }
        return view('admin.examiner.examiner_assign_to_school', compact('page_title', 'active', 'coordinators', 'schools', 'data'));
    }
    public function schoolAssignStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'coordinator_id' => 'required',
                'examiner_id' => 'required',
                'school_ids' => 'required'
            ])->setAttributeNames([
                'coordinator_id' => 'Coordinator',
                'examiner_id' => ' Examiner',
                'school_ids' => ' School  ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                // Check if the school already has an examiner-   GPT code for future use
                // $existingRecord = SchoolExaminer::where('examiner_id', $request->examiner_id)
                // ->whereIn('school_id', explode(',', $request->school_ids))
                // ->exists();
                $existingRecord = SchoolExaminer::where('examiner_id', $request->input('examiner_id'))->active()->first();
                if ($existingRecord) {
                    $newSchoolIds = is_array($request->input('school_ids')) ? $request->input('school_ids') : [$request->input('school_ids')];
                    $existingSchoolIds = explode(',', $existingRecord->school_id);

                    // Filter out IDs that are already present in the existing record
                    $filteredSchoolIds = array_diff($newSchoolIds, $existingSchoolIds);

                    // Merge new and filtered IDs, remove duplicates, and update the record
                    $mergedSchoolIds = implode(',', array_unique(array_merge($existingSchoolIds, $filteredSchoolIds)));

                    $existingRecord->update(['school_id' => $mergedSchoolIds]);
                    return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Schools']);
                } else {

                    $data = SchoolExaminer::create([
                        'coordinator_id' => $request->input('coordinator_id'),
                        'examiner_id' => $request->input('examiner_id'),
                        'school_id' => is_array($request->input('school_ids')) ? implode(',', $request->input('school_ids')) : $request->input('school_ids'),
                    ]);
                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Schools']);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    // assigning examiner to coordinator
    public function coordinatorAssign()
    {
        $page_title = 'Assign To Coordinator ';
        $active = 'dashboard';
        $coordinators = Coordinator::active()->pluck('coordinator_id', 'coordinator_name');
        $examiners = Examiner::active()->pluck('examiner_id', 'examiner_name');
        $assignedCoordinators = AssignExaminerToUser::with('coordinator')->active()->get();
        $data = '';
        $index = 0;
        foreach ($assignedCoordinators as $rows) {
            $index++;
            $data .= '
            <tr>
                <td>
                    <p class="text-sm font-weight-bold mb-0">' . $index . '</p>
                </td>
                <td>
                    <p class="text-sm font-weight-bold mb-0">' . $rows->coordinator->coordinator_name . '</p>
                </td>
                <td>
                    <ul class="list-group">
           ';
            $examinersList = explode(',', $rows->examiner_id);
            foreach ($examinersList as $ex) {
                $examiner_name = Examiner::where('examiner_id', $ex)->value('examiner_name');
                $data .= '<li class="list-group-item p-0 border-none">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">' . $examiner_name . '</span>
                            </span>
                        </li>';
            }
            $data .= '
                    </ul>
                </td>
                <td class="text-sm">
                    <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit    ">
                        <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                    </a>
                    <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="delete">
                        <i class="material-icons text-danger position-relative text-lg">delete</i>
                    </a>
                </td>
            </tr>
        ';
        }
        return view('admin.examiner.examiner_assign_to_coordinator', compact('page_title', 'active', 'examiners', 'coordinators', 'data'));
    }
    public function coordinatorAssignStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'coordinator_id' => 'required',
                'examiner_ids' => 'required',
            ])->setAttributeNames([
                'coordinator_id' => 'Coordinator',
                'examiner_ids' => 'Examiner',
            ]);

            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                // Check if there is an existing record for the coordinator
                $existingRecord = AssignExaminerToUser::where('user_id', $request->input('coordinator_id'))->active()->first();

                if ($existingRecord) {
                    // Coordinator already has an assigned examiner
                    $newExaminerIds = is_array($request->input('examiner_ids')) ? $request->input('examiner_ids') : [$request->input('examiner_ids')];

                    // Explode existing examiner IDs
                    $existingExaminerIds = explode(',', $existingRecord->examiner_id);

                    // Filter out IDs that are already present in the existing record
                    $filteredExaminerIds = array_diff($newExaminerIds, $existingExaminerIds);

                    // Merge new and filtered IDs, remove duplicates, and update the record
                    $mergedExaminerIds = implode(',', array_unique(array_merge($existingExaminerIds, $filteredExaminerIds)));

                    $existingRecord->update(['examiner_id' => $mergedExaminerIds]);
                    return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Coordinator']);
                } else {
                    // No existing record, create a new one
                    $data = AssignExaminerToUser::create([
                        'user_type' => 'coordinator',
                        'user_id' => $request->input('coordinator_id'),
                        'examiner_id' => is_array($request->input('examiner_ids')) ? implode(',', $request->input('examiner_ids')) : $request->input('examiner_ids'),
                    ]);

                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Coordinator']);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    //////////////////////////////// coordinator examiner section /////////////////////////////////////////////////
    public function coordinatorExaminers()
    {
        $page_title = 'Examiners List ';
        $active = 'coordinator_examiners';
        $data = '';
        $index = 0;
        $examinerIds = AssignExaminerToUser::where('user_id', auth()->user()->coordinator_id)->active()
            ->value('examiner_id');
        $examinerIdsArray = explode(',', $examinerIds);
        foreach ($examinerIdsArray as $ex) {
            $examiner = Examiner::with('state', 'city')->where('examiner_id', $ex)->active()->first();
            $index++;
            $data .= '
                <tr>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $index . '</p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $examiner->examiner_name . ' </p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $examiner->mobile . ' </p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $examiner->email . '</p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $examiner->state->state . '</p>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">' . $examiner->city->city . '</p>
                    </td>
                    <td>
                    ';
            $schoolIds = SchoolExaminer::where('examiner_id', $ex)->value('school_id');
            $schoolIdsArray = explode(',', $schoolIds);
            foreach ($schoolIdsArray as $sc) {
                $school = School::where('school_id', $sc)->value('school_name');
                $data .= ' <p class="text-sm font-weight-bold mb-0">' . $school . '</p>';
            }

            $data .= '     </td> 
                </tr>
            ';
        }
        return view('coordinator.examiner.coordinator_all_examiners', compact('page_title', 'active', 'data'));
    }
    // coordinator assign schools to examiner
    public function coordinatorAssignExaminerToSchool()
    {
        $page_title = 'Assign To Schools ';
        $active = 'coordinator_examiners';
        $examiners = AssignExaminerToUser::where('user_id', auth()->user()->coordinator_id)->active()->value('examiner_id');
        $list = explode(',', $examiners);
        $examinerList = Examiner::whereIn('examiner_id', $list)->eligible()->pluck('examiner_id', 'examiner_name');
        $schools = School_registration::with('school')->where('coordinator_id', auth()->user()->coordinator_id)
            ->eligible()->get();
        $examinerSchools = SchoolExaminer::with('examiner')
            ->where('coordinator_id', auth()->user()->coordinator_id)
            ->active()->get();
        $data = '';
        $index = 0;
        foreach ($examinerSchools as $rows) {
            $index++;
            $data .= '
            <tr>
                <td>
                    <p class="text-sm font-weight-bold mb-0">' . $index . '</p>
                </td>
                <td>
                <p class="text-sm font-weight-bold mb-0">' . $rows->examiner->examiner_name . '</p>
            </td>
                <td>
                    <ul class="list-group">
           ';
            $schoolList = explode(',', $rows->school_id);
            foreach ($schoolList as $sh) {
                $school_name = School::where('school_id', $sh)->value('school_name');
                $data .= '<li class="list-group-item p-0 border-none">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">' . $school_name . '</span>
                            </span>
                        </li>';
            }
            $data .= '
                    </ul>
                </td>
                <td class="text-sm">
                    <a class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="Edit    ">
                        <i class="material-icons text-success position-relative text-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">drive_file_rename_outline</i>
                    </a>
                    <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-original-title="delete">
                        <i class="material-icons text-danger position-relative text-lg">delete</i>
                    </a>
                </td>
            </tr>
        ';
        }
        return view('coordinator.examiner.assign_school', compact('page_title', 'active', 'examinerList', 'schools', 'data'));
    }

    public function coordinatorAssignExaminerToSchoolStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'examiner_id' => 'required',
                'school_ids' => 'required'
            ])->setAttributeNames([
                'examiner_id' => ' Examiner',
                'school_ids' => ' School  ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {

                $existingRecord = SchoolExaminer::where('examiner_id', $request->input('examiner_id'))
                    ->where('coordinator_id', auth()->user()->coordinator_id)->active()->first();
                if ($existingRecord) {
                    $newSchoolIds = is_array($request->input('school_ids')) ? $request->input('school_ids') : [$request->input('school_ids')];
                    $existingSchoolIds = explode(',', $existingRecord->school_id);

                    // Filter out IDs that are already present in the existing record
                    $filteredSchoolIds = array_diff($newSchoolIds, $existingSchoolIds);

                    // Merge new and filtered IDs, remove duplicates, and update the record
                    $mergedSchoolIds = implode(',', array_unique(array_merge($existingSchoolIds, $filteredSchoolIds)));

                    $existingRecord->update(['school_id' => $mergedSchoolIds]);
                    return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Schools', 'id' => $request->input('examiner_id')]);
                } else {

                    $data = SchoolExaminer::create([
                        'coordinator_id' => auth()->user()->coordinator_id,
                        'examiner_id' => $request->input('examiner_id'),
                        'school_id' => is_array($request->input('school_ids')) ? implode(',', $request->input('school_ids')) : $request->input('school_ids'),
                    ]);
                    if ($data) {
                        return response()->json(['response' => 'success', 'message' => 'Examiner Successfully Assign to Schools', 'dddata' => $data]);
                    } else {
                        return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                    }
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function examinerMeetLink()
    {
        $page_title = ' Add Examiner Meet link ';
        $active = 'coordinator_examiners';
        $examiners = AssignExaminerToUser::where('user_id', auth()->user()->coordinator_id)->active()->value('examiner_id');
        $list = explode(',', $examiners);
        $examinerList = Examiner::whereIn('examiner_id', $list)->eligible()->pluck('examiner_id', 'examiner_name');
        $meetLinks = examinerMeetLink::with('examiner')->active()->get();
        return view('coordinator.examiner.meet_link', compact('page_title', 'active', 'examinerList', 'meetLinks'));
    }
    public function examinerMeetLinkStore(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'examiner_id' => 'required',
                'meet_link' => 'required'
            ])->setAttributeNames([
                'examiner_id' => ' Examiner',
                'meet_link' => ' Link',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {

                $data = examinerMeetLink::create([
                    'coordinator_id' => auth()->user()->coordinator_id,
                    'examiner_id' => $request->input('examiner_id'),
                    'meet_link' => $request->input('meet_link'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Meet Link Successfully Assign to Examiner']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }

    ///////////////////////////////////////student examiner section ///////////////////////////////////////////////
    public function studentExaminer()
    {
        $page_title = 'Examiner';
        $active = 'student_examiners';
        $studentId = auth()->user()->student_id;

        $examinerData = Examiner::select('examiners.examiner_name', 'examiner_meet_links.meet_link','examiners.email','examiners.mobile')
            ->join('school_examiners', function ($join) {
                $join->on('examiners.examiner_id', '=', 'school_examiners.examiner_id');
            })
            ->join('coordinators', function ($join) {
                $join->on('school_examiners.coordinator_id', '=', 'coordinators.coordinator_id');
            })
            ->join('school_registrations', function ($join) {
                $join->on('coordinators.coordinator_id', '=', 'school_registrations.coordinator_id');
            })
            ->join('schools', function ($join) {
                $join->on('school_registrations.school_id', '=', 'schools.school_id');
            })
            ->join('students', function ($join) use ($studentId) {
                $join->on('schools.school_id', '=', 'students.school_id')
                    ->where('students.student_id', '=', $studentId);
            })
            ->leftJoin('examiner_meet_links', function ($join) {
                $join->on('examiners.examiner_id', '=', 'examiner_meet_links.examiner_id')
                    ->where('examiner_meet_links.status', '=', 1)
                    ->where('examiner_meet_links.deleted', '=', 0);
            })
            ->whereRaw('FIND_IN_SET(schools.school_id, school_examiners.school_id)')
            ->first();
        return view('student.student_examiner', compact('page_title', 'active','examinerData'));
    }
    // end of controller
}
