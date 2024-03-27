<?php

namespace App\Models\admin\school;

use App\Models\admin\Coordinator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class School_registration extends Model implements AuthenticatableContract
{
    protected $fillable = ['school_registration_id', 'coordinator_id', 'school_id', 'product_id', 'class_id', 'school_principal_name', 'username', 'password', 'school_file', 'id','status'];
    protected $table = 'school_registrations'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_registration_id = 'sreg' . (self::max('id') + 1);
        });
    }
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id','school_id');
    }
    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class, 'coordinator_id', 'coordinator_id');
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
    public function getAllRegisteredSchoolsByCoordinator()
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
            ->where('sr.coordinator_id', auth()->user()->coordinator_id)
            ->get();
    }

    public function coordinatorSchools()
    {
        $query = School_registration::leftJoin('schools as sc', 'school_registrations.school_id', '=', 'sc.school_id')
            ->where('school_registrations.coordinator_id', auth()->user()->coordinator_id)
            ->select('sc.*')
            ->get();
        return $query;
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming the identifier column is named 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    // end of model}
}
