<?php

namespace App\Models\school;

use App\Models\admin\school\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolUploadOrder extends Model
{
    protected $fillable = ['school_upload_order_id','school_id','file_name','file_details', 'file_path'];
    protected $table = 'school_upload_orders'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_upload_order_id = 'suld' . (self::max('id') + 1);
        });
    }
    public function school(){
        return $this->belongsTo(School::class,'school_id','school_id');
    }
    // end of model
}
