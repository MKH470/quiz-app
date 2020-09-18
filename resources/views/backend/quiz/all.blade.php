@extends('backend.layouts.master')
@section('title','quiz- all quizzes')
@section('content')
    <div class="module">
        <div class="module-head">

                    <h3>Quizzes Table</h3>
<br/>


<a href="{{route('quiz.create')}}" class="btn btn-success menu-icon icon-plus"> Add Quiz </a>

            </div>


        </div>
        <div class="module-body">
            <p>
                <!--<strong>Default</strong>-->

                <small>here you can see all quizzes</small>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Minutes</th>
                    <th>Questions</th>
                    <th>Subscribers</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @if(count($quizzes)>0)
                @foreach($quizzes as $key=>$quiz)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$quiz->name}}</td>
                    <td>{{$quiz->description}}</td>
                    <td>{{$quiz->minutes}} minutes</td>
                    <td>
                        <a href="{{ route('quiz.show',[$quiz-> id]) }}" class="btn btn-inverse">view questions</a>
                    </td>
                    <td>
                        <a href="{{ route('view.exam.user',[$quiz-> id]) }}" class="btn btn-success">view subscribers</a>
                    </td>
                    <td>
                        <a href="{{ route('quiz.edit',[$quiz-> id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('quiz.destroy', [$quiz->id]) }}" id="delete-form{{$quiz->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="#" onclick="if(confirm('Do you want to delete {{ $quiz->name }} quiz ?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$quiz->id}}').submit()
                        }else{
                            event.preventDefault();
                            }
                            "><input type="submit" value="Delete" class="btn btn-danger"></a>

                    </td>

                </tr>
               @endforeach
                @else
                <td>No quizzes to display
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
