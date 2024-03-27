<?php

namespace App\Models\admin\location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['country','country_id'];
    protected $table = 'countries'; // Set the actual table name
    // protected $primaryKey = 'class_id'; // Set the actual primary key if it's not 'id'
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->country_id = 'cont' . (self::max('id') + 1);
        });
    }
    public function states()
    {
        return $this->hasMany(State::class, 'country_id', 'country_id');
    }
    // end of model
}
