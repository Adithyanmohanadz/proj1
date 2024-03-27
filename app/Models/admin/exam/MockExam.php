<?php

namespace App\Models\admin\exam;

use App\Models\admin\Year;
use App\Models\admin\Classes;
use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Models\admin\Material_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MockExam extends Model
{
    protected $fillable = ['mock_exam_id','product_id','material_category_id','class_id','year_id','mock_exam_name','google_link','exam_start_date_time','exam_end_date_time','status'];
    protected $table = 'mock_exams'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->mock_exam_id = 'mexm' . (self::max('id') + 1);
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
public function mockExamList(){
    $result = MockExam::select('mock_exams.*', 'products.product_name', 'material_categories.level', 'classes.class', 'years.year')
    ->leftJoin('products', 'mock_exams.product_id', '=', 'products.product_id')
    ->leftJoin('material_categories', 'mock_exams.material_category_id', '=', 'material_categories.material_category_id')
    ->leftJoin('classes', 'mock_exams.class_id', '=', 'classes.class_id')
    ->leftJoin('years', 'mock_exams.year_id', '=', 'years.year_id')
    ->where('mock_exams.deleted', 0)
    ->get();
    return $result;
}


    // end of model
}
