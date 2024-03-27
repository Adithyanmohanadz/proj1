<?php

namespace App\Models\admin;

use App\Models\admin\examiner\SchoolExaminer;
use App\Models\admin\ledger\CoordinatorOutstanding;
use App\Models\admin\location\City;
use App\Models\admin\location\Country;
use App\Models\admin\location\Pincode;
use App\Models\admin\location\State;
use App\Models\admin\school\School;
use App\Models\admin\school\School_registration;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\coordinator\ConsolidateOrder;
use App\Models\coordinator\CoordinatorPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Builder;
class Coordinator extends Model implements AuthenticatableContract
{
    protected $fillable = ['coordinator_id','coordinator_name','username', 'mobile', 'email','opening_balance','prefix_number', 'password','city_id','state_id','country_id','pincode_id','address'];
    protected $table = 'coordinators'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->coordinator_id = 'cord' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('status',1)->where('deleted',0);
    }

    public function schoolRegistrations(){
        return $this->hasMany(School_registration::class, 'coordinator_id', 'coordinator_id');   
     }
     public function schools()
     {
         return $this->hasManyThrough(School::class, School_registration::class);
     }
    public function consolidateOrders()
    {
        return $this->hasMany(ConsolidateOrder::class, 'coordinator_id','coordinator_id');
    }
    public function nationalCoordinators() {
        return $this->hasMany(NationalCoordinator::class,'coordinator_id', 'coordinator_id');
    }
    public function coordinatorOutstanding(){
        return $this->hasOne(CoordinatorOutstanding::class,'coordinator_id','coordinator_id');
    }

    // Define relationship with City
    public function city() {
        return $this->belongsTo(City::class, 'city_id','city_id');
    }

    // Define relationship with State
    public function state() {
        return $this->belongsTo(State::class, 'state_id','state_id');
    }

    // Define relationship with Country
    public function country() {
        return $this->belongsTo(Country::class, 'country_id','country_id');
    }

    // Define relationship with Pincode
    public function pincode() {
        return $this->belongsTo(Pincode::class, 'pincode_id','pincode_id');
    }
    public function schoolExaminers()
    {
        return $this->hasMany(SchoolExaminer::class);
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
    // end of model
}
