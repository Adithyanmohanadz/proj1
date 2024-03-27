<?php

namespace App\Models\coordinator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['result_id ','student_id','school_id','coordinator_id', 'product_id', 'class_id', 'material_category_id','year_id','exam_type','exam_id','exam_score','exam_status'];
    protected $table = 'results'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->result_id = 'rslt' . (self::max('id') + 1);
        });
    }
    // end of model
}
