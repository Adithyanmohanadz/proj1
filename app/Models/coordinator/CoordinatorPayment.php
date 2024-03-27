<?php

namespace App\Models\coordinator;

use App\Models\admin\Coordinator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoordinatorPayment extends Model
{
    protected $fillable = ['coordinator_payment_id','coordinator_id', 'paid_date', 'particulars', 'paid_amount'];
    protected $table = 'coordinator_payments'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->coordinator_payment_id = 'cpay' . (self::max('id') + 1);
        });
    }

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class, 'coordinator_id', 'coordinator_id');
    }
    // end of model
}
