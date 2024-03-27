<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialEnquiry extends Model
{
    protected $fillable = ['material_enquiry_id','school_id','student_id', 'product_id', 'class_id', 'material_category_id','material_id'];
    protected $table = 'material_enquiries'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->material_enquiry_id = 'menq' . (self::max('id') + 1);
        });
    }
    public function studentMaterialEnquiry(){
        $result = MaterialEnquiry::select('material_enquiries.*', 'materials.material_name')
        ->leftJoin('materials', 'material_enquiries.material_id', '=', 'materials.material_id')
        ->where('material_enquiries.deleted', 0)
        ->where('student_id','stud6')
        ->get(); 
        return $result;
    }
    public function allStudentMaterialEnquires(){
        $result = MaterialEnquiry::select('material_enquiries.*', 'students.student_name', 'classes.class', 'products.product_name', 'material_categories.level', 'materials.material_name')
        ->leftJoin('students', 'material_enquiries.student_id', '=', 'students.student_id')
        ->leftJoin('classes', 'material_enquiries.class_id', '=', 'classes.class_id')
        ->leftJoin('products', 'material_enquiries.product_id', '=', 'products.product_id')
        ->leftJoin('material_categories', 'material_enquiries.material_category_id', '=', 'material_categories.material_category_id')
        ->leftJoin('materials', 'material_enquiries.material_id', '=', 'materials.material_id')
        ->where('material_enquiries.school_id', '=', 'schl2')
        ->where('material_enquiries.status',1)
        ->get();
        return $result;
    }
    // end of model
}
