<?php

namespace App\Http\Controllers\student;

use App\Models\admin\Coordinator;
use App\Models\admin\school\School_registration;
use Illuminate\Http\Request;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Student;
use App\Models\admin\Material;
use App\Http\Controllers\Controller;
use App\Models\admin\Material_category;
use App\Models\admin\school\School;
use App\Models\admin\StudentCurrentRecord;

class StudentDashboardController extends Controller
{
    public function dashboard_view()
    {
        $page_title = 'Dashboard';
        $active = 'dashboard';
        $currentLevel = StudentCurrentRecord::where('student_id', auth()->user()->student_id)
            ->join('material_categories', 'student_current_records.material_category_id', '=', 'material_categories.material_category_id')
            ->value('material_categories.level');
        $studentPurchaseStatus = StudentCurrentRecord::where('student_id', auth()->user()->student_id)->value('current_level_material_purchase_status');
        return view('student.dashboard.student_dashboard', compact('page_title', 'active', 'studentPurchaseStatus', 'currentLevel'));
    }

    public function studentNextLevelRegistration()
    {
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('student.dashboard.student_next_level_registration', compact('page_title', 'active'));
    }

    public function onlineRegistration()
    {
        $page_title = 'Dashboard';
        $active = 'dashboard';
        // $studentDetails = Student::where('student_id', auth()->user()->student_id)->first();
        // $schoolName = School::where('school_id', $studentDetails->school_id)->value('school_name');
        // $coordinator = School_registration::select('school_registrations.*', 'coordinators.coordinator_name')
        //     ->leftJoin('coordinators', 'school_registrations.coordinator_id', '=', 'coordinators.coordinator_id')
        //     ->where('school_registrations.school_id', $studentDetails->school_id)
        //     ->first();
        // $productName = Product::where('product_id', $studentDetails->product_id)->value('product_name');
        // $className = Classes::where('class_id', $studentDetails->class_id)->value('class');
        // $levelName = Material_category::where('material_category_id', $studentDetails->material_category_id)->value('level');
        // $materialData = Material::where('class_id', $studentDetails->class_id)->where('product_id', $studentDetails->product_id)->where('material_category_id', $studentDetails->material_category_id)->first();

        $studentData = Student::with('studentCurrentRecord','studentCurrentRecord.product','studentCurrentRecord.class','school','school.schoolRegistration.coordinator')->where('student_id',auth()->user()->student_id)->first();
        $currentData = StudentCurrentRecord::with('mc','product','class')->where('student_id',auth()->user()->student_id)->first();
        $materialData = Material::where('class_id', $currentData->class_id)->where('product_id', $currentData->product_id)->where('material_category_id', $currentData->material_category_id)->first();
        return view('student.dashboard.student_online_registration', compact('page_title', 'active', 'studentData','currentData','materialData'));
    }
}
