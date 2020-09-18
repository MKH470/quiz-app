<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Support\Facades\Auth;
use App\Question;
use Illuminate\Http\Request;
use App\Quiz;
use App\Result;
use DB;

class ExamController extends Controller
{
    public function create(){
        return view('backend.exam.assign');
}
    public function assignExam(Request $request){
     $quizId=$request->quiz_id;
      $quiz=Quiz::find($quizId);
      $userId=$request->user_id;
      $quiz->users()->syncWithoutDetaching($userId);

   return redirect()->back()->with(['success'=>'Exam assigned to user  successfully!']);

}
public function userExam(){
    $quizzes=Quiz::get();
    return view('backend.exam.index',compact('quizzes'));
}
public function userExamView($id){
    $quizzes=Quiz::find($id);
    $users=$quizzes->users;
   return view('backend.exam.user_exam' ,compact('quizzes','users'));
}
public function removeExam(Request $request){
    $quizId=$request->get('quiz_id');
    $userId=$request->get('user_id');
    $quiz=Quiz::with('users')->find($quizId);
    $result=Result::where('quiz_id',$quizId)->where('user_id',$userId)->exists();
    if($result){
        return redirect()->back()->with('error','This quiz is played by user so it cannot be removed');
    }else{
        $quiz->users()->detach($userId);
        return redirect()->back()->with('success','Exam is now not assigned for ');
    }
}

public function getQuizQuestions(Request $request , $quizId){
    $authUser=auth()->user()->id;
    //check if user has exam
    $userId=DB::table('quiz_user')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
    if(!in_array($quizId,$userId)){
      return redirect()->to('/home');
    }

    $quiz= Quiz::find($quizId);
    $time=$quiz->minutes;//Quiz::where('id',$quizId)->value('minutes');
    $quizQuestions=Question::where('quiz_id',$quizId)->with('answers')->get();
    $authUserHasPlayedQuiz=Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();

//has user played quiz
    $quizCompleted=Result::where('user_id',$authUser)->whereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
    if(in_array($quizId,$quizCompleted)){
        return redirect()->to('/home')->with(['error'=>'You already completed this exam ']);
    }
   return  view('quiz',compact('quiz','time','quizQuestions','authUserHasPlayedQuiz'));
 }
 public function postQuiz(Request $request){
    $answerId= $request['answerId'];
    $questionId=$request['questionId'];
    $quizId=$request['quizId'];
    $userId = auth()->user()->id;
    return $userQuestionAnswer= Result::updateOrCreate(
        ['user_id' => $userId ,'quiz_id' => $quizId ,'question_id' => $questionId],
        ['answer_id'=>$answerId]
    );

    }
    public function viewResult($userId ,$quizId ){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        $numQuestion=DB::table('questions')->where('quiz_id',$quizId);
        $quiz=Quiz::where('id', $quizId)->first();
        return view('result-detail',compact('results','numQuestion','quiz'));


    }
    public function resultExam(){
        $quizzes=Quiz::get();
    return view('backend.result.index',compact('quizzes'));
    }
    public function  viewResultExam( $userId, $quizId ){
            $results=Result::where('user_id' ,$userId)->where('quiz_id',$quizId)->get();
            $totalQuestions=Question::where('quiz_id',$quizId)->count();
            $attemptQuestion=Result::where('user_id' ,$userId)->where('quiz_id',$quizId)->count();
            $quiz=Quiz::where('id',$quizId)->get();
            $ans=[];
           foreach ($results as $answer) {
               array_push($ans,$answer->answer_id);
           }
            $userCorrectAnswer=Answer::whereIn('id',$ans)->where('is_correct',1)->count();
            $userWrongAnswers=$totalQuestions-$userCorrectAnswer;
            if($attemptQuestion){
                $percentage=($userCorrectAnswer/ $totalQuestions)*100;
            }else{
                $percentage=0;
            }

            return view('backend.result.result',compact('results','totalQuestions','attemptQuestion','userCorrectAnswer','userWrongAnswers','percentage','quiz'));


    }
 }

