<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material_category extends Model
{
    protected $fillable = ['material_category_name','material_category_id','id','product_id','level'];
    protected $table = 'material_categories'; // Set the actual table name
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->material_category_id = 'mcat' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query ):Builder{
        return $query->where('status',1)->where('deleted',0);
    }

}
