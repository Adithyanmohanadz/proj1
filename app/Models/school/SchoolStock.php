<?php

namespace App\Models\school;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolStock extends Model
{
    protected $fillable = ['school_stock_id','school_id', 'product_id', 'class_id', 'material_category_id','material_id','stock_quantity'];
    protected $table = 'school_stocks'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_stock_id = 'sstk' . (self::max('id') + 1);
        });
    }
// end of model
}
