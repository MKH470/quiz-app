@extends('backend.layouts.master')
@section('title','exam- result')
@section('content')
    <div class="module">
        <div class="module-head">

            <h3>Result</h3>
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
                    <th >#</th>
                    <th>Quiz</th>
                    <th>Total Questions</th>
                    <th>Attempt Question</th>
                    <th>Correct Answer</th>
                    <th>Wrong Answers</th>
                    <th>Percentage</th>
                    <th>Result</th>
                </tr>
            </thead>
             <tbody>
                @if(!empty($results) && !empty($quiz))
                @foreach($quiz as $q)
                <tr>
                    <td>1</td>
                    <td >{{$q->name}}</td>
                    <td>{{$totalQuestions}}</td>
                    <td>{{$attemptQuestion}}</td>
                    <td>{{$userCorrectAnswer}}</td>
                    <td >{{$userWrongAnswers}}</td>
                    <td class={{(round($percentage,2)) >= 60 ?'bg-success':'bg-danger'}}>
                        {{round($percentage,2) }}
                    </td>
                    <td >
                        @if(round($percentage,2) >= 60)
                        successful
                        @else
                        <span class='bg-danger'><strong>Precipitate</strong></span>
                        @endif
                    </td>
                </tr>
               @endforeach
                @endif
                </tbody>

            </table>
            <br/>

            <hr />
            <br />
            <a href="{{ route('result.index')}}" class="btn btn-inverse">Go Back</a>
            <br />
            <!-- <hr /> -->

        </div>
    </div>
@endsection
