<?php

namespace App\Models\coordinator;

use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinatorStock extends Model
{
    protected $fillable = ['coordinator_stock_id ','coordinator_id', 'product_id', 'class_id', 'material_category_id','material_id','stock_quantity'];
    protected $table = 'coordinator_stocks'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->coordinator_stock_id = 'cstk' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query ):Builder{
        return $query->where('status',1)->where('deleted',0);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
// end of model
}
