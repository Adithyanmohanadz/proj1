<?php

namespace App\Models\admin\location;

use App\Models\admin\Godown;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\NationalCoordinator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    protected $fillable = ['state','state_id','country_id'];
    protected $table = 'states'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->state_id = 'stat' . (self::max('id') + 1);
        });
    }
    public function nationalCoordinator() {
        return $this->hasOne(NationalCoordinator::class,'state_id','state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'state_id');
    }

    public function godown()
    {
        return $this->hasMany(Godown::class, 'state_id', 'state_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    // end of model
}
