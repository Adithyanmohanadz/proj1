<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class debugController extends Controller
{
    public function index(){
        echo 'hhhhhhhhhai';

        $currentRecords = DB::select("
        SELECT
        schools.school_name AS school_name,
        students.student_name AS student_name,
        products.product_name AS product_name,
        material_categories.level AS material_category_name,
        classes.class AS class_name,
    student_current_records.student_id,
    schools.school_id,
    products.product_id,
    material_categories.material_category_id,
    classes.class_id,
        CASE
            WHEN student_current_records.type_of_exam = 'mock' THEN mock_exams.mock_exam_name
            WHEN student_current_records.type_of_exam = 'final' THEN final_exams.final_exam_name
            ELSE NULL
        END AS exam_name,
        CASE
            WHEN student_current_records.type_of_exam = 'mock' THEN mock_exams.exam_start_date_time
            WHEN student_current_records.type_of_exam = 'final' THEN final_exams.exam_start_date_time
            ELSE NULL
        END AS exam_date,
        CASE
            WHEN student_current_records.type_of_exam = 'mock' THEN mock_exams.mock_exam_id
            WHEN student_current_records.type_of_exam = 'final' THEN final_exams.final_exam_id
            ELSE NULL
        END AS exam_id
    FROM student_current_records
    JOIN students ON students.student_id = student_current_records.student_id
    JOIN schools ON schools.school_id = students.school_id
    JOIN products ON products.product_id = student_current_records.product_id
    JOIN material_categories ON material_categories.material_category_id = student_current_records.material_category_id
    JOIN classes ON classes.class_id = student_current_records.class_id
    LEFT JOIN mock_exams ON
        mock_exams.product_id = student_current_records.product_id AND
        mock_exams.material_category_id = student_current_records.material_category_id AND
        mock_exams.class_id = student_current_records.class_id AND
        student_current_records.type_of_exam = 'mock' AND
        mock_exams.status = 1 AND
        mock_exams.deleted = 0
    LEFT JOIN final_exams ON
        final_exams.product_id = student_current_records.product_id AND
        final_exams.material_category_id = student_current_records.material_category_id AND
        final_exams.class_id = student_current_records.class_id AND
        student_current_records.type_of_exam = 'final' AND
        final_exams.status = 1 AND
        final_exams.deleted = 0
    WHERE student_current_records.current_level_material_purchase_status = 1;
    
");


      
        // dd($currentRecords);
        dd(auth()->user());
    }
}
