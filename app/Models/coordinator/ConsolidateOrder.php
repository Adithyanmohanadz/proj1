<?php

namespace App\Models\coordinator;

use App\Models\admin\Coordinator;
use App\Models\admin\Godown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsolidateOrder extends Model
{
    protected $fillable = ['consolidate_order_id ', 'coordinator_id', 'order_id', 'order_date', 'shipping_address_id', 'godown_id', 'executive_name', 'executed_date', 'courier_date', 'tracking_id','method_of_delivery','remark'];
    protected $table = 'consolidate_orders'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->consolidate_order_id = 'cons' . (self::max('id') + 1);
        });
    }
// ConsolidateOrder.php
    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class, 'coordinator_id', 'coordinator_id');
    }
    public function godown()
    {
        return $this->belongsTo(Godown::class, 'godown_id', 'godown_id');
    }

    public function fetchConsolidateOrderById($consolidate_order_id){
        $query =  $this->select(
            'consolidate_orders.*',
            'shipping_addresses.address',
            'shipping_addresses.landmark',
            'countries.country',
            'states.state',
            'cities.city',
            'pincodes.pincode',
            'coordinators.coordinator_name',
            'coordinators.username',
            'coordinators.mobile',
            'coordinators.email',
            'coordinators.address',
            'godowns.godown_name'
        )
            ->leftJoin('coordinators', 'consolidate_orders.coordinator_id', '=', 'coordinators.coordinator_id')
            ->leftJoin('shipping_addresses', 'consolidate_orders.shipping_address_id', '=', 'shipping_addresses.shipping_address_id')
            ->leftJoin('countries', 'countries.country_id', '=', 'shipping_addresses.country_id')
            ->leftJoin('states', 'states.state_id', '=', 'shipping_addresses.state_id')
            ->leftJoin('cities', 'cities.city_id', '=', 'shipping_addresses.city_id')
            ->leftJoin('pincodes', 'pincodes.pincode_id', '=', 'shipping_addresses.pincode_id')
            ->leftJoin('godowns', 'godowns.godown_id', '=', 'consolidate_orders.godown_id')
            ->where('consolidate_orders.consolidate_order_id', $consolidate_order_id)
            ->first();
            return $query;
    }
    // end of model
}
