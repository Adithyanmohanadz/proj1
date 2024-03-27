<?php

namespace App\Models\school;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMaterialEnquiry extends Model
{
    protected $fillable = ['school_material_enquiry_id','school_id', 'coordinator_id', 'product_id', 'class_id', 'material_category_id','material_id'];
    protected $table = 'school_material_enquiries'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_material_enquiry_id = 'senq' . (self::max('id') + 1);
        });
    }

    public function schoolMaterialEnquiry(){
        $result = SchoolMaterialEnquiry::select('school_material_enquiries.*', 'materials.material_name')
        ->leftJoin('materials', 'school_material_enquiries.material_id', '=', 'materials.material_id')
        ->where('school_material_enquiries.deleted', 0)
        ->where('school_id','schl2')
        ->get(); 
        return $result;
    }
    public function allSchoolMaterialEnquires(){
        $result = SchoolMaterialEnquiry::select('school_material_enquiries.*', 'schools.school_name', 'classes.class', 'products.product_name', 'material_categories.level', 'materials.material_name')
        ->leftJoin('schools', 'school_material_enquiries.school_id', '=', 'schools.school_id')
        ->leftJoin('classes', 'school_material_enquiries.class_id', '=', 'classes.class_id')
        ->leftJoin('products', 'school_material_enquiries.product_id', '=', 'products.product_id')
        ->leftJoin('material_categories', 'school_material_enquiries.material_category_id', '=', 'material_categories.material_category_id')
        ->leftJoin('materials', 'school_material_enquiries.material_id', '=', 'materials.material_id')
        ->where('school_material_enquiries.coordinator_id', '=', 'cord1')
        ->where('school_material_enquiries.status',1)
        ->get();
        return $result;
    }
// end of model 
}
