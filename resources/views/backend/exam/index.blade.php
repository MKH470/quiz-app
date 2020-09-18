@extends('backend.layouts.master')
@section('title','quiz- all users')
@section('content')
    <div class="module">
        <div class="module-head">

            <h3>All users who have signed up for exams</h3>
            <br/>

        </div>
    </div>
    <div class="module-body">
        <p>
        <!--<strong>Default</strong>-->
        here you can see all users who have signed up for exams
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quiz</th>

                    <th></th>
                </tr>
            </thead>
             <tbody>
                @if(count($quizzes)>0)
                @foreach($quizzes as $quiz)
                @foreach($quiz->users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$quiz->name}}</td>

                    <td>
                        <a href="{{ route('quiz.show',[$quiz-> id]) }}" class="btn btn-inverse">view questions</a>
                    </td>
                    <td>
                        <form action="{{ route('exam.remove') }}" method="POST">
                            {{ csrf_field() }}
                        <input type="hidden" name='quiz_id' value="{{$quiz->id}}">
                        <input type="hidden" name='user_id' value="{{$user->id}}">
                        <button type="submit" class="btn btn-danger">Remove user</button>
                        </form>
                    </td>

                </tr>
               @endforeach
               @endforeach
                @else
                    <td>No user assign to display
                        <div>
                             <br>
                             <a href="{{route('quiz.create')}}" class="btn btn-info">Create Quiz</a>
                        </div>
                    </td>
                @endif
                </tbody>

            </table>
            <hr />
            <br />
            <a href="{{ route('exam.assign')}}" class="btn btn-inverse">Go Back</a>
            <br />
            <!-- <hr /> -->

        </div>
    </div>
@endsection
