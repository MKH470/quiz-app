<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=(new Quiz)->allQuiz();
        return view('backend.quiz.all',compact('quizzes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateBeforeStore($request);
      $quiz =(new Quiz)->storeQuiz($data);
      return redirect()->back()->with(['success'=>'quiz created successefully']);
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $quizzes=Quiz::with('questions')->where('id',$id)->paginate(5);
     return view('backend.quiz.show',compact('quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $quiz=(new Quiz)->getQuizById($id);
       return view('backend.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateBeforeStore($request);
        (new Quiz)->updateQuiz($data , $id);
   return redirect()->route('quiz.index')->with(['success'=>'quiz updated successefully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      (new Quiz)->deleteQuiz($id);
        return redirect()->back()->with(['success'=>'quiz deleted successefully']);
    }

    public function validateBeforeStore($request)
    {
        return $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|min:3|max:500',
            'minutes' => 'required|integer',
        ]);
    }


}
