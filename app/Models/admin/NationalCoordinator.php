<?php

namespace App\Models\admin;

use App\Models\admin\location\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalCoordinator extends Model
{
    protected $fillable = ['coordinator_id','national_coordinator_id','state_id'];
    protected $table = 'national_coordinators'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->national_coordinator_id = 'ncrd' . (self::max('id') + 1);
        });
    }

    // Define relationship with Coordinator
    public function coordinator() {
        return $this->belongsTo(Coordinator::class,'coordinator_id','coordinator_id');
    }

    // Define relationship with State
    public function state() {
        return $this->belongsTo(State::class,'state_id','state_id');
    }
    // end of model
}
