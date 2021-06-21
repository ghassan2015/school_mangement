<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasTranslations;
    public $translatable = ['name','description'];
    protected $fillable=['name','Grade_id','description'];

    protected $table = 'courses';
    public $timestamps = true;
    public function Grades(){
    return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'course_teacher');
    }
    public function Exam(){
        return $this->hasMany(Exam::class,'course_id');
    }

}
