<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['user_id', 'question_id', 'quiz_id','answer_id'];
    //
    //---Result belongsTo Question-----------------
    //
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
    //
    //---Result belongsTo Answer----------------
    //
    public function answer()
    {
        return $this->belongsTo(Answer::class ,'answer_id');
    }
}
