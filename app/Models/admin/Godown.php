<?php

namespace App\Models\admin;

use App\Models\admin\location\State;
use Illuminate\Database\Eloquent\Model;
use App\Models\coordinator\ConsolidateOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Godown extends Model
{
    protected $fillable = ['godown_id','godown_name','state_id', 'address', 'mobile', 'email'];
    protected $table = 'godowns'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->godown_id = 'godn' . (self::max('id') + 1);
        });
    }
    public function consolidateOrders()
    {
        return $this->hasMany(ConsolidateOrder::class, 'godown_id','godown_id');
    }
    public function godownState()
    {
        return $this->belongsTo(State::class, 'state_id', 'state_id');
    }




}
