<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $questions=Question::paginate(10);
    $questions=(new Question)->getQuestions();
       return view('backend.question.all' , compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
           'quiz'=>'required',
           'question'=>'required',
           'options'=>'bail|required|array',
           'options.*'=>'bail|required|string|distinct',
           'correct_answer'=>'required',
       ]);
        $question = (new Question)->storeQuestion($data);
        (new Answer)->storeAnswer($data,$question);
        return redirect()->back()->with(['success'=>'Question and answers created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $question=(new Question)->findQuestion($id);
       return view('backend.question.show' ,compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $question=(new Question)->findQuestion($id);
       $answers= $question->answers;
       return view('backend.question.edit' ,compact('question','answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'quiz'=>'required',
            'question'=>'required',
            'options'=>'bail|required|array',
            'options.*'=>'bail|required|string|distinct',
            'correct_answer'=>'required',
        ]);
       $question= (new Question)->updateQuestion($id,$request);
       $answer= (new Answer)->updateAnswer($request, $question);
        return redirect()->route('question.show',$id)->with(['success'=>'Question updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Answer)->deleteAnswer($id);
        (new Question)->deleteQuestion($id);
        return redirect()->route('question.index')->with('success','Question deleted successfully!');

    }
/*    public function validateQuestionRequest($request)
    {
       return $this->validate($request,[
           'quiz'=>'required',
           'question'=>'required|min:3',
           'options'=>'bail|required|array|min:3',
           'options.*'=>'bail|required|string|distinct',
           'correct_answer'=>'required',
       ]);

    }
*/
}
