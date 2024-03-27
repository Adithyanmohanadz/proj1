<?php

namespace App\Models\coordinator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = ['shipping_address_id ','coordinator_id','name','address','landmark', 'city_id', 'state_id', 'country_id','pincode_id'];
    protected $table = 'shipping_addresses'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->shipping_address_id = 'ship' . (self::max('id') + 1);
        });
    }

    public function shippingAddressByCoordinator(){
        $query = ShippingAddress::select('shipping_addresses.*', 'c.country', 's.state', 'ci.city', 'pi.pincode')
        ->leftJoin('countries as c', 'shipping_addresses.country_id', '=', 'c.country_id')
        ->leftJoin('states as s', 'shipping_addresses.state_id', '=', 's.state_id')
        ->leftJoin('cities as ci', 'shipping_addresses.city_id', '=', 'ci.city_id')
        ->leftJoin('pincodes as pi', 'shipping_addresses.pincode_id', '=', 'pi.pincode_id')
        ->where('shipping_addresses.coordinator_id', auth()->user()->coordinator_id)
        ->where('shipping_addresses.status', 1)
        ->where('shipping_addresses.deleted', 0)
        ->get();
        return $query;
    }
    // end of model
}
