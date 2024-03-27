<?php

namespace App\Models\admin\ledger;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoordinatorOutstanding extends Model
{
    protected $fillable = ['coordinator_outstanding_id ','coordinator_id','total_in','total_out','total_outstanding'];
    protected $table = 'coordinator_outstandings'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->coordinator_outstanding_id  = 'cout' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    // end of model
}
