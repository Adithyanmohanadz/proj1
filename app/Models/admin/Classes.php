<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    protected $fillable = ['class','class_id','id'];
    protected $table = 'classes'; // Set the actual table name
    // protected $primaryKey = 'class_id'; // Set the actual primary key if it's not 'id'

    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->class_id = 'class' . (self::max('id') + 1);

        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
}
