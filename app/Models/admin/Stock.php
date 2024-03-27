<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    protected $fillable = ['stock_id','godown_id','product_id', 'material_category_id', 'class_id', 'material_id','stock_quantity','source','remark'];
    protected $table = 'stocks'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->stock_id = 'stoc' . (self::max('id') + 1);
        });
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','product_id');
    }
    public function materialCategory(){
        return $this->belongsTo(Material_category::class, 'material_category_id','material_category_id');
    }
    public function class(){
        return $this->belongsTo(Classes::class, 'class_id','class_id');
    }
    public function material(){
        return $this->belongsTo(Material::class,'material_id',"material_id");
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('status',1)->where('deleted',0);
    }
    public function getStocksByGodown($godown_id){
        $result = Stock::select('stocks.*', 'products.product_name', 'material_categories.level', 'classes.class', 'materials.material_name')
        ->leftJoin('products', 'stocks.product_id', '=', 'products.product_id')
        ->leftJoin('material_categories', 'stocks.material_category_id', '=', 'material_categories.material_category_id')
        ->leftJoin('classes', 'stocks.class_id', '=', 'classes.class_id')
        ->leftJoin('materials', 'stocks.material_id', '=', 'materials.material_id')
        ->where('stocks.godown_id', $godown_id)
        ->where('stocks.status',1)
        ->where('stocks.deleted',0)
        ->get();
        return $result;
    }

// end of model
}
