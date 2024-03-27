<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialPurchase extends Model
{
    protected $fillable = ['material_purchase_id','school_id','coordinator_id', 'student_id', 'product_id', 'class_id', 'material_category_id','material_id'];
    protected $table = 'material_purchases'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->material_purchase_id = 'mpur' . (self::max('id') + 1);
        });
    }}
