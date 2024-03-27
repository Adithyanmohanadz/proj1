<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\exam\MockExam;
use App\Models\admin\Year;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Http\Controllers\Controller;
use App\Models\admin\exam\FinalExam;
use App\Models\admin\Material_category;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function mockExam()
    {
        $page_title = 'Mock Test Exam Creation ';
        $active = 'mock_test_exam_creation';
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->orderBy('class_id', 'asc')->get();
        $year = Year::where('deleted', 0)->where('status', 1)->get();
        return view('admin.exam.mock_exam_creation', compact('page_title', 'active', 'products', 'classes', 'year'));
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
    public function mockExamStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_product_id' => 'required',
            'exam_level_id' => 'required',
            'exam_class_id' => 'required',
            'exam_year_id' => 'required',
            'mock_exam_name' => 'required|string',
            'mock_exam_google_link' => 'required',
            'mock_exam_start_date_time' => 'required',
            'mock_exam_end_date_time' => 'required',
        ])->setAttributeNames([
            'exam_product_id' => 'Product ',
            'exam_level_id' => 'Level ',
            'exam_class_id' => 'Class',
            'exam_year_id' => 'Year ',
            'mock_exam_name' => 'Exam Name ',
            'mock_exam_google_link' => 'Google Link ',
            'mock_exam_start_date_time' => 'Start Date ',
            'mock_exam_end_date_time' => 'End Date '
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = MockExam::create([
                'product_id' => $request->input('exam_product_id'),
                'material_category_id' => $request->input('exam_level_id'),
                'class_id' => $request->input('exam_class_id'),
                'year_id' => $request->input('exam_year_id'),
                'mock_exam_name' => $request->input('mock_exam_name'),
                'google_link' => $request->input('mock_exam_google_link'),
                'exam_start_date_time' => $request->input('mock_exam_start_date_time'),
                'exam_end_date_time' => $request->input('mock_exam_end_date_time'),
                'status' => $request->has('status') ? 1 : 0
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Mock Exam Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }

    public function mockExamList()
    {
        $mockExamModel = new MockExam();
        $page_title = 'Mock Exam List ';
        $active = 'mock_exam_list';
        $mockExamList = $mockExamModel->mockExamList();
        return view('admin.exam.mock_exam_list', compact('page_title', 'active', 'mockExamList'));
    }

    // final exam section
    public function finalExam()
    {
        $page_title = 'Final Test Exam Creation ';
        $active = 'final_test_exam_creation';
        $products = Product::where('deleted', 0)->where('status', 1)->get();
        $classes = Classes::where('deleted', 0)->where('status', 1)->orderBy('class_id', 'asc')->get();
        $year = Year::where('deleted', 0)->where('status', 1)->get();
        return view('admin.exam.final_exam_creation', compact('page_title', 'active', 'products', 'classes', 'year'));
    }

    public function finalExamStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'finalexam_product_id' => 'required',
            'finalexam_level_id' => 'required',
            'finalexam_class_id' => 'required',
            'finalexam_year_id' => 'required',
            'final_exam_name' => 'required|string',
            'final_exam_google_link' => 'required',
            'final_exam_start_date_time' => 'required',
            'final_exam_end_date_time' => 'required',
        ])->setAttributeNames([
            'finalexam_product_id' => 'Product ',
            'finalexam_level_id' => 'Level ',
            'finalexam_class_id' => 'Class',
            'finalexam_year_id' => 'Year ',
            'final_exam_name' => 'Exam Name ',
            'final_exam_google_link' => 'Google Link ',
            'final_exam_start_date_time' => 'Start Date ',
            'final_exam_end_date_time' => 'End Date '
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => 'error', 'message' => $validator->errors()]);
        } else {
            $data = FinalExam::create([
                'product_id' => $request->input('finalexam_product_id'),
                'material_category_id' => $request->input('finalexam_level_id'),
                'class_id' => $request->input('finalexam_class_id'),
                'year_id' => $request->input('finalexam_year_id'),
                'final_exam_name' => $request->input('final_exam_name'),
                'google_link' => $request->input('final_exam_google_link'),
                'exam_start_date_time' => $request->input('final_exam_start_date_time'),
                'exam_end_date_time' => $request->input('final_exam_end_date_time'),
                'status' => $request->has('final_status') ? 1 : 0
            ]);
            if ($data) {
                return response()->json(['response' => 'success', 'message' => 'Final Exam Successfully Created']);
            } else {
                return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
            }
        }
    }
    public function finalExamList()
    {
        $finalExamModel = new FinalExam();
        $page_title = 'Final Exam List ';
        $active = 'final_exam_list';
        $finalExamList = $finalExamModel->finalExamList();
        $year = Year::where('deleted', 0)->where('status', 1)->get();
        return view('admin.exam.final_exam_list', compact('page_title', 'active', 'finalExamList'));
    }


    /// coordinator viewing exam list
    public function CoordinatorViewMockExamList()
    {
        $mockExamModel = new MockExam();
        $page_title = 'Mock Exam List ';
        $active = 'coordinator_mock_exam';
        $mockExamList = $mockExamModel->mockExamList();
        return view('coordinator.exam.mock_exam_list', compact('page_title', 'active', 'mockExamList'));
    }

    public function CoordinatorViewFinalExamList()
    {
        $finalExamModel = new FinalExam();
        $page_title = 'Final Exam List ';
        $active = 'coordinator_final_exam';
        $finalExamList = $finalExamModel->finalExamList();
        return view('coordinator.exam.final_exam_list', compact('page_title', 'active', 'finalExamList'));
    }


    // school viewing exam
    public function examView()
    {
        $page_title = 'Exam';
        $active = 'dashboard';
       
        return view('school.exam.exam', compact('page_title', 'active'));
    }
    public function SchoolViewMockExamList()
    {
        $page_title = 'Mock Exam List ';
        $active = 'school_mock_list';
        $schoolProducts = explode(',', auth()->user()->product_id);
        // $mockExams = MockExam::where(function ($query) use ($schoolProducts) {
        //     foreach ($schoolProducts as $productId) {
        //         $query->orWhereRaw("FIND_IN_SET(?, mock_exams.product_id)", [$productId]);
        //     }
        // })->get();
        $mockExams = MockExam::whereIn('product_id', $schoolProducts)
        ->with('product', 'level', 'classModel','year')->active()
        ->get();
        return view('school.exam.mock_exam_list', compact('page_title', 'active','mockExams'));
    }
    public function SchoolViewFinalExamList()
    {
        $page_title = 'Final Exam List ';
        $active = 'school_final_list';
        $schoolProducts = explode(',', auth()->user()->product_id);
        $finalExam = FinalExam::whereIn('product_id', $schoolProducts)
        ->with('product', 'level', 'classModel','year')->active()
        ->get();
        return view('school.exam.final_exam_list', compact('page_title', 'active','finalExam'));
    }
    // end of class
}
