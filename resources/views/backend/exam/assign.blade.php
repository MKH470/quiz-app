@extends('backend.layouts.master')
@section('title','exam- assign exam')
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
    <form action="{{route('exam.assign')}}" method="POST">@csrf

        <div class="module">
            <div class="module-head">
                <h3>Assign Exam For Users</h3>
                <br/>
                <a href="{{ route('view.exam')}}" class="btn btn-inverse">view users who have signed up for Exams</a>
            </div>
            <div class="module-body">
                <div class="control-group">
                    <label class="control-lable" for="quiz_id">Choose Quiz</label>
                    <div class="controls">
                        <select name="quiz_id" class="span8 @error('quiz_id') is-invalid @enderror">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach(App\Quiz::get() as $quiz)
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('quiz_id')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <div class="control-group">
                    <label class="control-lable" for="user_id">Choose User</label>
                    <div class="controls">
                        <select name="user_id" class="span8 @error('user_id') is-invalid @enderror">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach(App\User::where('is_admin','0')->get() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>



                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>

                </div>


            </div>
        </div>

    </form>


        </div><!--/.content-->
    </div><!--/.span9-->
@endsection

