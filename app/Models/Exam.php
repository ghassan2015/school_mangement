<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $guarded=[];

    public function ExamType(){
       return $this->belongsTo(ExamType::class,'exam_types_id');
    }
    public function Course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
