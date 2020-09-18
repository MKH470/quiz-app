@extends('layouts.app')
@section('content')
<quiz-component
:times="{{$quiz->minutes}}"
:quiz-id="{{$quiz->id}}"
:quiz-questions="{{$quizQuestions}}"
:has-user-quiz-palyed="{{$authUserHasPlayedQuiz}}"
>



</quiz-component>
<script type='text/javascript'>
    window.oncontextmenu = function () {
        console.log("Right Click Disabled");
        return false;
    }
</script>
@endsection
