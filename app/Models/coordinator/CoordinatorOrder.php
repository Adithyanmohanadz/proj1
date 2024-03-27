<?php

namespace App\Models\coordinator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoordinatorOrder extends Model
{
    protected $fillable = ['coordinator_order_id ', 'coordinator_id', 'product_id', 'class_id', 'material_category_id', 'material_id', 'quantity', 'amount', 'total_amount'];
    protected $table = 'coordinator_orders'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->coordinator_order_id = 'ordr' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1)->where('deleted', 0);
    }
    public function insertedOrderById()
    {
        $query = $this->select('coordinator_orders.*', 'materials.material_name', 'products.product_name', 'material_categories.level', 'classes.class')
            ->join('products', 'coordinator_orders.product_id', '=', 'products.product_id')
            ->join('material_categories', 'coordinator_orders.material_category_id', '=', 'material_categories.material_category_id')
            ->join('classes', 'coordinator_orders.class_id', '=', 'classes.class_id')
            ->join('materials', 'coordinator_orders.material_id', '=', 'materials.material_id')
            ->where('coordinator_orders.coordinator_id', auth()->user()->coordinator_id)
            ->where('coordinator_orders.status', 1)
            ->where('coordinator_orders.processed', 0)
            ->where('coordinator_orders.deleted', 0)
            ->orderBy('id', 'asc')
            ->get();
        return $query;
    }

    public function orderByOrderId($order_id)
    {
        $query = $this->select('coordinator_orders.*', 'materials.material_name', 'products.product_name', 'material_categories.level', 'classes.class')
            ->join('products', 'coordinator_orders.product_id', '=', 'products.product_id')
            ->join('material_categories', 'coordinator_orders.material_category_id', '=', 'material_categories.material_category_id')
            ->join('classes', 'coordinator_orders.class_id', '=', 'classes.class_id')
            ->join('materials', 'coordinator_orders.material_id', '=', 'materials.material_id')
            ->where('coordinator_orders.order_id', $order_id)
            ->where('coordinator_orders.status', 1)
            ->where('coordinator_orders.deleted', 0)
            ->orderBy('id', 'asc')
            ->get();
        return $query;
    }

    // end of model
}
