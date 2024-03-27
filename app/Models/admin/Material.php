<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    protected $fillable = ['material_name', 'material_price', 'material_category_id', 'product_id', 'class_id', 'material_resource'];
    protected $table = 'materials'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->material_id = 'mate' . (self::max('id') + 1);
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
    public function scopeActive(Builder $query):Builder{
        return $query->where('status',1)->where('deleted',0);
    }
    public function allMaterialsById($product_id, $material_category_id)
    {
        $query = Material::select('materials.*', 'products.product_name', 'material_categories.level', 'classes.class')
            ->join('products', 'materials.product_id', '=', 'products.product_id')
            ->join('material_categories', 'materials.material_category_id', '=', 'material_categories.material_category_id')
            ->join('classes', 'materials.class_id', '=', 'classes.class_id')
            ->where('materials.product_id', $product_id)
            ->where('materials.material_category_id', $material_category_id)
            ->get();
            return $query;
    }



    // end of model
}
