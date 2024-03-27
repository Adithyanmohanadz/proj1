<?php

namespace App\Models\admin\ledger;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminLedger extends Model
{
    protected $fillable = ['admin_ledger_id','coordinator_id','consolidate_order_id','order_id','date','number','particulars','out','in','affected_date','narration','balance','opening_balance'];
    protected $table = 'admin_ledgers'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_ledger_id = 'aled' . (self::max('id') + 1);
        });
    }

    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    // end of model
}
