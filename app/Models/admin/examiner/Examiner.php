<?php

namespace App\Models\admin\examiner;

use App\Models\admin\location\City;
use App\Models\admin\location\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Logging\TeamCity\TeamCityLogger;

class Examiner extends Model
{
    protected $table = 'examiners'; // Set the actual table name
    protected $fillable = ['examiner_id','examiner_name','mobile','email','address','state_id','city_id'];

    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->examiner_id  = 'exnr' . (self::max('id') + 1);
        });
    }
    public function examinerMeetLinks()
    {
        return $this->hasMany(SchoolExaminer::class);
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0);
    }
    public function scopeEligible(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    public function  state(){
        return $this->belongsTo(State::class,'state_id','state_id');
    }
    public function city (){
        return $this->belongsTo(City::class,'city_id','city_id');
    }
    // end of model
}
