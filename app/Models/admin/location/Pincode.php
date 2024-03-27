<?php

namespace App\Models\admin\location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    protected $fillable = ['pincode','pincode_id'];
    protected $table = 'pincodes'; // Set the actual table name
    // protected $primaryKey = 'class_id'; // Set the actual primary key if it's not 'id'
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->pincode_id = 'pcode' . (self::max('id') + 1);
        });
    }
    // end of model
}
