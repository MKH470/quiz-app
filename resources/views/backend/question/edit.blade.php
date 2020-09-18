@extends('backend.layouts.master')
@section('title','question- edit question')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('question.update',$question->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="module">
            <div class="module-head">
                <h3>Edit Question</h3>
            </div>
            <div class="module-body">
                <div class="control-group">
                    <label class="control-lable" for="quiz">Choose Quiz</label>
                    <div class="controls">
                        <select name="quiz" class="span8 ">
                            @foreach(App\Quiz::all() as $quiz)
                                <option value="{{$quiz->id}}" @if($quiz->id == $question->quiz_id)
                                selected @endif>{{$quiz->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('quiz')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror
                </div>

                <div class="control-group">
                    <label class="control-label" for="question">Quistion</label>
                    <div class="controls">
                        <input type="text" name="question" value="{{$question->question}}" placeholder="Edit the question" class="span8">
                    </div>

                    @error("question")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>

                <div class="control-group">
                    <label class="control-lable" for="options">Options</label>
                    <div class="controls">
                        @foreach($answers as $key=>$answer)
                            <input type="text" name="options[]" class="span7 " value="{{$answer->answer}}" >

                            <input type="radio" name="correct_answer" value="{{$key}}" @if($answer->is_correct == true)
                            checked @endif ><span>Is correct answer</span>
                        @endforeach
                    </div>
                    @error('options')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </div>


            </div>
        </div>

    </form>


    </div><!--/.content-->
    </div><!--/.span9-->
@endsection


