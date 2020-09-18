@extends('backend.layouts.master')
@section('title','quiz- all users')
@section('content')
    <div class="module">
        <div class="module-head">

        <h3>{{$quizzes->name}}</h3>
<br/>
<a href="{{ route('quiz.show',[$quizzes-> id]) }}" class="btn btn-inverse">view questions</a>
<a href="{{ route('exam.assign') }}" class="btn btn-success">add new subscriber</a>
            </div>


        </div>
        <div class="module-body">
            <p>
                <!--<strong>Default</strong>-->

                <small>here you can see all users who have signed up for the {{$quizzes->name}}</small>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($users)>0)
                @foreach($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>


                </tr>
               @endforeach
                @else
                <td>No users to display
                    <div>
                        <br>
                <a href="{{route('quiz.create')}}" class="btn btn-info">Create Quiz</a>
                    </div>
                </td>
                    @endif
                </tbody>
            </table>

            <br />
            <!-- <hr /> -->

        </div>
    </div>
@endsection
