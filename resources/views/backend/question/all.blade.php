@extends('backend.layouts.master')
@section('title','question- all questions')
@section('content')
    <div class="col col-md-12">
    <div class="module">
        <div class="module-head">
                    <h3>Questions Table</h3>
<br/>
<a href="{{route('question.create')}}" class="btn btn-success menu-icon icon-plus"> Add Question </a>
            </div>
        </div>
        <div class="module-body">
            <p>
                <!--<strong>Default</strong>-->
                <small>here you can see all question</small>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quiz</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @if(App\Question::count()>0)
                @foreach($questions as $key=>$question)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$question->question}}</td>
                    <td>{{$question->quiz->name}}</td>
                    <td>{{date('F d,Y',strtotime($question->created_at))}}</td>
                    <td>
                        <a href="{{route('question.show',[$question->id]) }}" class="btn btn-info">View</a>
                    </td>
                    <td>
                        <a href="{{route('question.edit',[$question->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                    <form method="POST" action="{{route('question.destroy', [$question->id]) }}" id="delete-form{{$question->id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE') }}
                        </form>
                        <a href="#" onclick="if(confirm('Do you want to delete this question ?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$question->id}}').submit()
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
                <a href="{{route('question.create')}}" class="btn btn-info">Create Question</a>
                    </div>
                </td>
                    @endif
                </tbody>
            </table>

            <br />
            <!-- <hr /> -->
<div class="pagination pagination-centered">
    {{$questions->links()}}
</div>
        </div>
    </div>
    </div>
@endsection
