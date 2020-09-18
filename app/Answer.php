<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'answer','is_correct'];
    protected $casts = [
        'is_correct' => 'boolean',
    ];
    //
    //---Answer belongsTo Question-----------------
    //
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
//----------------------------STORE---------
    public function storeAnswer($data , $question){
        foreach( $data['options'] as $key=>$option ){
            $is_correct =false;
            if($key==$data['correct_answer']){
                $is_correct=true;
            }
            Answer::create([
                'question_id'=> $question->id,
                'answer'=>$option,
                'is_correct'=>$is_correct
            ]);

        }
    }
//----------------------------UPDATE---------
    public function updateAnswer($data,$question){
        $this->deleteAnswer($question->id);
        $this->storeAnswer($data,$question);
    }
//----------------------------DELETE---------
    public function deleteAnswer($questionId){
        Answer::where('question_id',$questionId)->delete();
    }
}
