<?php

namespace App\Models\admin\school;

use App\Models\admin\Coordinator;
use App\Models\admin\location\City;
use App\Models\admin\location\Pincode;
use App\Models\admin\location\State;
use App\Models\admin\location\Country;
use App\Models\admin\Student;
use Illuminate\Database\Eloquent\Model;
use App\Models\school\SchoolUploadOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    protected $fillable = ['school_id', 'school_name', 'email', 'mobile', 'address', 'country', 'state', 'city', 'pincode', 'id'];
    protected $table = 'schools'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_id = 'schl' . (self::max('id') + 1);
        });
    }

    public function schoolRegistration()
    {
        return $this->hasOne(School_registration::class, 'school_id', 'school_id');
    }

    public function schoolCity(){
        return $this->belongsTo(City::class, 'city', 'city_id');
    }
    public function schoolState(){
        return $this->belongsTo(State::class, 'state', 'state_id');
    }
    public function schoolCountry(){
        return $this->belongsTo(Country::class, 'country', 'country_id');
    }
    public function schoolPincode(){
        return $this->belongsTo(Pincode::class, 'pincode', 'pincode_id');
    }

    public function coordinator()
    {
        return $this->hasOneThrough(Coordinator::class, School_registration::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function registration()
    {
        return $this->hasOne(School_registration::class);
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0);
    }
    public function scopeEligible(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    public function getAllRegisteredSchools()
    {
        return $this->select(
            's.school_name',
            'co.coordinator_name',
            'st.state',
            'ci.city',
            'sr.*'
        )
            ->from('school_registrations as sr')
            ->leftJoin('schools as s', 'sr.school_id', '=', 's.school_id')
            ->leftJoin('coordinators as co', 'co.coordinator_id', '=', 'sr.coordinator_id')
            ->leftJoin('states as st', 's.state', '=', 'st.state_id')
            ->leftJoin('cities as ci', 's.city', '=', 'ci.city_id')
            ->where('sr.deleted', 0)
            ->get();
    }

    public function schoolUploadOrders()
    {
        return $this->hasMany(SchoolUploadOrder::class, "school_id", "school_id");
    }

    // end of model
}
