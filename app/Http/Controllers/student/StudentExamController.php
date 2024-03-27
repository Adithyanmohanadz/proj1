<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\admin\exam\MockExam;
use App\Http\Controllers\Controller;
use App\Models\admin\exam\FinalExam;
use Illuminate\Support\Facades\Redirect;
use App\Models\admin\StudentCurrentRecord;

class StudentExamController extends Controller
{
    public function mockExamNotification()
    {
        $page_title = 'Mock Test Exam Info';
        $active = 'student_mock_exam';
        $studentCurrentData = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->first();
        $now = now();
        
        $mockExams = MockExam::with(['product', 'level', 'classModel', 'year'])
            ->where('exam_start_date_time', '>', $now)
            ->where('exam_end_date_time', '>', $now)
            ->where('product_id', $studentCurrentData->product_id)
            ->where('class_id', $studentCurrentData->class_id)
            ->where('material_category_id', $studentCurrentData->material_category_id)
            ->where('year_id', $studentCurrentData->year_id)
            ->where('status', 1)
            ->where('deleted', 0)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('student_current_records')
                    ->where('student_id', auth()->user()->student_id)
                    ->where('current_level_material_purchase_status', 1)
                    ->where('current_level_mockexam_attended_status', 0)
                    ->where('current_level_mockexam_result_status', 0);

            })
            ->first();
        return view('student.exam.mock_exam_notification', compact('page_title', 'active', 'mockExams'));
    }

    public function mockExamConfirm(Request $request)
    {
        if ($request->ajax()) {
            $mock_exam_id = $request->input('mock_exam_id');
            $update = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->update(['current_level_mockexam_attended_status' => 1,'mock_exam_id' => $mock_exam_id]);
            if ($update) {
                return response()->json(['response' => 'success']);
            } else {
                return response()->json(['response' => 'error']);
            }
        } else {
            return Redirect::route('login');
        }
    }

    // final exam section
    public function finalExamNotification()
    {
        $page_title = 'Final Test Exam Info';
        $active = 'student_final_exam';
        $now = now();
        $studentCurrentData = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->first();
      
        $finalExams = FinalExam::with(['product', 'level', 'classModel', 'year'])
            ->where('exam_start_date_time', '>', $now)
            ->where('exam_end_date_time', '>', $now)
            ->where('product_id', $studentCurrentData->product_id)
            ->where('class_id', $studentCurrentData->class_id)
            ->where('material_category_id', $studentCurrentData->material_category_id)
            ->where('year_id', $studentCurrentData->year_id)
            ->where('status', 1)
            ->where('deleted', 0)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('student_current_records')
                    ->where('student_id', auth()->user()->student_id)
                    ->where('current_level_material_purchase_status', 1)
                    ->where('current_level_exam_attended_status', 0)
                    ->where('current_level_mockexam_result_status', 1);

            })
            ->first();
        return view('student.exam.final_exam_notification', compact('page_title', 'active', 'finalExams'));
    }
    public function finalExamConfirm(Request $request)
    {
        if ($request->ajax()) {
            $final_exam_id = $request->input('final_exam_id');

            $update = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->update(['current_level_exam_attended_status' => 1,'final_exam_id'=>$final_exam_id]);
            if ($update) {
                return response()->json(['response' => 'success']);
            } else {
                return response()->json(['response' => 'error']);
            }
        } else {
            return Redirect::route('login');
        }
    }
    // end of controller
}
