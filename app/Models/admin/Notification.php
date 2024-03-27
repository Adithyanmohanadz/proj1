<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    protected $fillable = ['notification_id','product_id','level_id', 'class_id', 'title','file_path','school','coordinator','student'];
    protected $table = 'notifications'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->notification_id = 'noti' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    // end of model
}
