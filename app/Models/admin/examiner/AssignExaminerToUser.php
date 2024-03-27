<?php

namespace App\Models\admin\examiner;

use App\Models\admin\Coordinator;
use App\Models\admin\school\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignExaminerToUser extends Model
{
    protected $table = 'assign_examiner_to_users'; // Set the actual table name
    protected $fillable = ['assign_examiner_to_user_id ','user_type','user_id','examiner_id'];

    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->assign_examiner_to_user_id   = 'aexn' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    public function coordinator(){
        return $this->belongsTo(Coordinator::class,'user_id','coordinator_id');
    }
    public function school(){
        return $this->belongsTo(School::class,'user_id','school_id');
    }
    // end of model
}
