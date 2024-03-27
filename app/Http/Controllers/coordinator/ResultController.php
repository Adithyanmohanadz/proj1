<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\coordinator\Result;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\StudentCurrentRecord;

class ResultController extends Controller
{
    public function index()
    {
        $currentStudentModel = new StudentCurrentRecord();
        $page_title = 'Result Updation';
        $active = 'coordinator_result';
        $students = $currentStudentModel->allEligibleStudentsForExam();
        // dd($students);
        return view('coordinator.result.result_updation', compact('page_title', 'active', 'students'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'score' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
                $result =  Result::create([
                    'student_id' => $request->input('student_id'),
                    'school_id' => $request->input('school_id'),
                    'coordinator_id' => auth()->user()->coordinator_id,
                    'product_id' => $request->input('product_id'),
                    'material_category_id' => $request->input('material_category_id'),
                    'class_id' => $request->input('class_id'),
                    'year_id' => $request->input('year_id'),
                    'exam_type' => $request->input('type_of_exam'),
                    'exam_id' => $request->input('exam_id'),
                    'exam_score' => $request->input('score'),
                    'exam_status' => $request->input('examResult'),
                ]);
                if($result){
                    if($request->input('type_of_exam') == 'mock'){
                        StudentCurrentRecord::where('student_id',$request->input('student_id'))->update(['type_of_exam' => 'final','current_level_mockexam_result_status' => 1]);
                    }elseif($request->input('type_of_exam') == 'final'){
                        if($request->input('examResult') == 0){
                            // 0 => means ,student failed in exam
                            StudentCurrentRecord::where('student_id',$request->input('student_id'))->update(['final_status' => 1,'win_or_lose' => 0]);
                        }elseif($request->input('examResult') == 1){
                            //1 => means ,student  passed in the exam
                            $totalNumberOfLevels = Product::where('product_id',$request->input('product_id'))->value('number_of_levels');
                            $currentLevelOrderNumber = Material_category::where('product_id',$request->input('product_id'))->where('material_category_id',$request->input('material_category_id'))->value('level_order');
                            if($totalNumberOfLevels == $currentLevelOrderNumber){
                                // if this is true that means student in the final level
                                StudentCurrentRecord::where('student_id',$request->input('student_id'))->update(['final_status' => 1,'win_or_lose' => 1,'current_level_exam_result_status'=>1]);
                            }else{
                                // false means, he is not in the final level ,so he is eligible for next level
                                // to find next level
                                $nextLevelId =  Material_category::where('product_id',$request->input('product_id'))->where('level_order',$currentLevelOrderNumber+1)->value('material_category_id');
                                StudentCurrentRecord::where('student_id',$request->input('student_id'))->update(['material_category_id' =>$nextLevelId ,'current_level_material_purchase_status' => 0,'type_of_exam'=>'none','current_level_mockexam_attended_status'=>0,'current_level_mockexam_result_status'=>0,'current_level_exam_attended_status'=>0,'current_level_exam_result_status'=>0]);
                            }
                        }else{
                            // else, means student was absent , so he failed
                            StudentCurrentRecord::where('student_id',$request->input('student_id'))->update(['final_status' => 1,'win_or_lose' => 0]);
                        }
                    }
                        $responseMessage = 'Pass';
                        if ($request->input('examResult') == 0) {
                            $responseMessage = 'Fail';
                        } elseif ($request->input('examResult') == 2) {
                            $responseMessage = 'Absent';
                        }
                        return response()->json(['response' => 'success','message'=> $responseMessage ]);
                }else{
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }
    }
    public function mockResultUpdation(){
        $page_title = 'Mock Exam Result Updation';
        $active = 'coordinator_result';
       
        $students = StudentCurrentRecord::with('student','student.school','product','class','mc','year','mockExam')
        ->where('current_level_material_purchase_status', 1)
        ->where('current_level_mockexam_attended_status', 1)
        ->where('current_level_mockexam_result_status', 0)
        ->get();  
        return view('coordinator.result.mock_exam_results', compact('page_title', 'active', 'students'));
    }
    public function finalResultUpdation(){
        $page_title = 'Final Exam Result Updation';
        $active = 'coordinator_result';
       
        $students = StudentCurrentRecord::with('student','student.school','product','class','mc','year','finalExam')
        ->where('current_level_material_purchase_status', 1)
        ->where('current_level_exam_attended_status', 1)
        ->where('current_level_exam_result_status', 0)
        ->where('final_status', 0)
        ->get();  
        return view('coordinator.result.final_exam_results', compact('page_title', 'active', 'students'));
    }
    // end of controller
}
