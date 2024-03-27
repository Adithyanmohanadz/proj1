<?php

namespace App\Models\admin\exam;

use App\Models\admin\Year;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use App\Models\admin\Material_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalExam extends Model
{
    protected $fillable = ['final_exam_id','product_id','material_category_id','class_id','year_id','final_exam_name','google_link','exam_start_date_time','exam_end_date_time','status'];
    protected $table = 'final_exams'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->final_exam_id = 'fexm' . (self::max('id') + 1);
        });
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','product_id');
    }

    public function level()
    {
        return $this->belongsTo(Material_category::class, 'material_category_id','material_category_id');
    }

    public function classModel()
    {
        return $this->belongsTo(Classes::class, 'class_id','class_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id','year_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0);
    }
    public function scopeEligible(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
public function finalExamList(){
    $result = FinalExam::select('final_exams.*', 'products.product_name', 'material_categories.level', 'classes.class', 'years.year')
    ->leftJoin('products', 'final_exams.product_id', '=', 'products.product_id')
    ->leftJoin('material_categories', 'final_exams.material_category_id', '=', 'material_categories.material_category_id')
    ->leftJoin('classes', 'final_exams.class_id', '=', 'classes.class_id')
    ->leftJoin('years', 'final_exams.year_id', '=', 'years.year_id')
    ->where('final_exams.deleted', 0)
    ->get();
    return $result;
}


    // end of model
}
