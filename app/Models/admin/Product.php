<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table = 'products'; // Set the actual table name
    protected $fillable = ['product_id ','product_name','id','classes','level1','level2','level3','level4','level5','level6','level7','level8','level9','level10','level11','level12','level13','level14','level15','status','deleted'];

    use HasFactory;
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->product_id = 'prod' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
     // Define a relationship with the Classes model
     public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
}
