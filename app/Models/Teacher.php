<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'Specialization_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }
    public function Courses()
    {
        return $this->belongsToMany(Course::class,'course_teacher');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id','');
    }

}
