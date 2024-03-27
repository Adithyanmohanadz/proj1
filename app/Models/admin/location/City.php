<?php

namespace App\Models\admin\location;

use App\Models\admin\school\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    protected $fillable = ['city','state_id','city_id'];
    protected $table = 'cities'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->city_id = 'city' . (self::max('id') + 1);
        });
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'state_id');
    }
    public function schools()
    {
        return $this->hasMany(School::class, 'city', 'city_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }

    // end of model
}
