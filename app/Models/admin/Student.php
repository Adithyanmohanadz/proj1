<?php

namespace App\Models\admin;

use App\Models\admin\school\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Student extends Model implements AuthenticatableContract
{
    protected $fillable = ['student_id','school_id','product_id','material_category_id','class_id','student_name','student_username','mobile','email','password','address','parent_name','parent_email','parent_mobile','parent_occupation','year_id'];
    protected $table = 'students'; // Set the actual table name
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->student_id = 'stud' . (self::max('id') + 1);
        });
    }
    public function studentCurrentRecord(){
        return $this->hasOne(StudentCurrentRecord::class,'student_id','student_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','product_id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id','class_id');
    }
    public function school(){
        return $this->belongsTo(School::class,'school_id','school_id');
    }
    public function scopeActive(Builder $query):Builder{
        return $query->where('status',1)->where('deleted',0);
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
    public function getAllStudents(){
        return $this->select(
            'schools.school_name',
            'products.product_name',
            'material_categories.level',
            'classes.class',
            'students.*'
        )
        ->from('students')
        ->leftJoin('schools', 'students.school_id', '=', 'schools.school_id')
        ->leftJoin('products', 'students.product_id', '=', 'products.product_id')
        ->leftJoin('material_categories', 'students.material_category_id', '=', 'material_categories.material_category_id')
        ->leftJoin('classes', 'students.class_id', '=', 'classes.class_id')
        ->where('students.deleted', 0)
        ->get();
    }

// end of model
}
