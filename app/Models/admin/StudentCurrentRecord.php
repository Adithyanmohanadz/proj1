<?php

namespace App\Models\admin;

use App\Models\admin\exam\FinalExam;
use App\Models\admin\exam\MockExam;
use App\Models\admin\school\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentCurrentRecord extends Model
{
    protected $fillable = ['student_current_record_id', 'student_id', 'product_id', 'material_category_id', 'class_id','year_id', 'current_level_material_purchase_status', 'current_level_exam_attended_status', 'current_level_exam_result_status', 'final_status','status'];
    protected $table = 'student_current_records'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->student_current_record_id = 'stcr' . (self::max('id') + 1);
        });
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','product_id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id','class_id');
    }
    public function mc()
    {
        return $this->belongsTo(Material_category::class, 'material_category_id', 'material_category_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','student_id');
    }
 
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id','year_id');
    }
    public function mockExam()
    {
        return $this->belongsTo(MockExam::class, 'mock_exam_id','mock_exam_id');
    }
    public function finalExam()
    {
        return $this->belongsTo(FinalExam::class, 'final_exam_id','final_exam_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('status',1)->where('deleted',0);
    }

    public function allEligibleStudentsForExam()
    {
        $currentRecords = DB::table('student_current_records')
            ->join('students', 'students.student_id', '=', 'student_current_records.student_id')
            ->leftJoin('schools', 'schools.school_id', '=', 'students.school_id')
            ->join('products', 'products.product_id', '=', 'student_current_records.product_id')
            ->join('material_categories', 'material_categories.material_category_id', '=', 'student_current_records.material_category_id')
            ->join('classes', 'classes.class_id', '=', 'student_current_records.class_id')
            ->leftJoin('mock_exams', function ($join) {
                $join->on('mock_exams.product_id', '=', 'student_current_records.product_id')
                    ->on('mock_exams.material_category_id', '=', 'student_current_records.material_category_id')
                    ->on('mock_exams.class_id', '=', 'student_current_records.class_id')
                    ->where('student_current_records.type_of_exam', '=', 'mock')
                    ->where('mock_exams.deleted', '=', 0);
            })
            ->leftJoin('final_exams', function ($join) {
                $join->on('final_exams.product_id', '=', 'student_current_records.product_id')
                    ->on('final_exams.material_category_id', '=', 'student_current_records.material_category_id')
                    ->on('final_exams.class_id', '=', 'student_current_records.class_id')
                    ->where('student_current_records.type_of_exam', '=', 'final')
                    ->where('final_exams.deleted', '=', 0);
            })
            ->select(
                'schools.school_name as school_name',
                'students.student_name as student_name',
                'products.product_name as product_name',
                'material_categories.level as level',
                'classes.class as class',
                'student_current_records.type_of_exam',
                'student_current_records.student_id as student_id',
                'schools.school_id',
                'products.product_id',
                'material_categories.material_category_id',
                'classes.class_id',
                DB::raw('
            CASE
                WHEN student_current_records.type_of_exam = "mock" THEN mock_exams.mock_exam_name
                WHEN student_current_records.type_of_exam = "final" THEN final_exams.final_exam_name
                ELSE NULL
            END AS exam_name
        '),
                DB::raw('
            CASE
                WHEN student_current_records.type_of_exam = "mock" THEN mock_exams.exam_start_date_time
                WHEN student_current_records.type_of_exam = "final" THEN final_exams.exam_start_date_time
                ELSE NULL
            END AS exam_date
        '),
                DB::raw('
            CASE
                WHEN student_current_records.type_of_exam = "mock" THEN mock_exams.mock_exam_id
                WHEN student_current_records.type_of_exam = "final" THEN final_exams.final_exam_id
                ELSE NULL
            END AS exam_id
        '),
                DB::raw('
                CASE
                    WHEN student_current_records.type_of_exam = "mock" THEN mock_exams.year_id
                    WHEN student_current_records.type_of_exam = "final" THEN final_exams.year_id
                    ELSE NULL
                END AS year_id
            '),
            )
            ->where('student_current_records.current_level_material_purchase_status', 1)
            ->get();
        return $currentRecords;
    }
    // end of model
}
