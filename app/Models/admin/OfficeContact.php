<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeContact extends Model
{
    protected $fillable = ['office_contact_id','office_name','mobile_number', 'email', 'address'];
    protected $table = 'office_contacts'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->office_contact_id = 'ocnt' . (self::max('id') + 1);
        });
    }
    // end of model
}
