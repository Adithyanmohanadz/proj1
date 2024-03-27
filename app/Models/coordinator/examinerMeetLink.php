<?php

namespace App\Models\coordinator;

use App\Models\admin\examiner\Examiner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class examinerMeetLink extends Model
{
    protected $fillable = ['examiner_meet_link_id ','coordinator_id','examiner_id','meet_link'];
    protected $table = 'examiner_meet_links'; // Set the actual table name

    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->examiner_meet_link_id = 'emet' . (self::max('id') + 1);
        });
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('deleted',0);
    }
    public function scopeEligible(Builder $query):Builder{
        return $query->where('deleted',0)->where('status',1);
    }
    public function examiner(){
        return $this->belongsTo(Examiner::class,'examiner_id','examiner_id');
    }

    // end of model
}
