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
        Here you can see the user's exam results
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quiz</th>

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
                       <a href="{{route('view.exam.result',[$user->id,$quiz-> id])}}" class="btn btn-primary">view result</a>
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
