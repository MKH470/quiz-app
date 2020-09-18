<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'quiz_id'];
    private $limit =10;
    private $order ='DESC';
    //
    //---Questions has Many Answer-----------------
    //
    public function answers(){
        return $this->hasMany(Answer::CLASS);
    }
    //
    //---Questions belongsTo Quiz-----------------
    //
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    //----------------------------STORE---------
    public function storeQuestion($data){
        $data['quiz_id'] = $data['quiz'];
        return Question::create($data);
    }
    //----------------------------GET-all--------
    public function getQuestions(){
        return Question::orderBy('created_at',$this->order)->with('quiz')->paginate($this->limit);
    }
    public function findQuestion($id){
        return Question::find($id);
    }
    //----------------------------UPDATE---------
    public function updateQuestion($id, $data){
       $question = Question::find($id);
        $question->question=$data['question'];
        $question->quiz_id=$data['quiz'];
        $question->save();
       return $question;
    }
    //----------------------------DELETE---------
    public function deleteQuestion($id)
    {
        //return Question::find($id)->delete();
        return Question::where('id',$id)->delete();

    }
    //----------------------------GET--BY--- ID---
    public function getQuestionById($id)
    {
        return Question::find($id);

    }
}
