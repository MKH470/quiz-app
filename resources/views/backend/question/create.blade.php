@extends('backend.layouts.master')
@section('title','question- create question')
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
    <form action="{{route('question.store')}}" method="POST">@csrf

        <div class="module">
            <div class="module-head">
                <h3>Create Question</h3>
            </div>
            <div class="module-body">
                <div class="control-group">
                    <label class="control-lable" for="quiz">Choose Quiz</label>
                    <div class="controls">
                        <select name="quiz" class="span8 @error('quiz') is-invalid @enderror">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach(App\Quiz::all() as $quiz)
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
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
                    <label class="control-lable" for="question">Question name</label>
                    <div class="controls">
                        <input type="text" name="question" class="span8 @error('question') is-invalid @enderror" placeholder="what the question" value=" {{old('questioin')}}   " >

                    </div>
                    @error('question')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>

                <div class="control-group">
                    <label class="control-lable" for="options">Options</label>
                    <div class="controls">
                        @for($i=0;$i<4;$i++)
                            <input type="text" name="options[]" class="span7 @error('options[]') is-invalid @enderror" placeholder=" options {{$i+1}}" >

                            <input type="radio" name="correct_answer" value="{{$i}}" class="@error('correct_answer') is-invalid @enderror" ><span>Is correct answer</span>
                        @endfor
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

