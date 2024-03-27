<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminResource extends Model
{
    protected $fillable = ['admin_resource_id','file_name','file_details', 'file_path'];
    protected $table = 'admin_resources'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_resource_id = 'ares' . (self::max('id') + 1);
        });
    }
}
