<?php

namespace App\Models\admin\examiner;

use App\Models\admin\Coordinator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolExaminer extends Model
{
    protected $table = 'school_examiners'; // Set the actual table name
    protected $fillable = ['school_examiner_id ','coordinator_id','school_id','examiner_id'];

    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->school_examiner_id   = 'senr' . (self::max('id') + 1);
        });
    }
    public function examiner(){
        return $this->belongsTo(Examiner::class,'examiner_id','examiner_id');
    }
    public function coordinator(){
        return $this->belongsTo(Coordinator::class,'coordinator_id','coordinator_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }}
