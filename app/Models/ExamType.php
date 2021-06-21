<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ExamType extends Model
{
    use HasTranslations;

    protected $fillable=['name','description'];
    public $translatable = ['name','description'];
    public function Exam(){
        return $this->hasMany(Exam::class,'exam_types_id');
    }

}
