@extends('layouts.app')
@section('content')
   <div class='container'>
    <div class="col col-md-12">
        <hr/>
            <h2 class="text-center p-3">Welcome! {{ auth()->user()->name }}</h2>
    </div>
    <br/>
    <hr/>
       <div class="row">
           <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success"  role="alert">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>success! </strong> {{Session::get('success')}}
            </div>
          @endif
           @if(Session::has('error'))
           <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>! </strong>{{Session::get('error')}}
           </div>
           @endif
               <div class="card">
                   <div class="card-header ">
                   <h4>My Exams</h4>
                   <p>Here you can see your quizzes   </p>
                   </div>
                   @if($isExamAssigned)
                   @foreach($quizzes as $key => $quiz)
                   <div class="card-body">
                   <p><h3>{{$quiz->name}}</h3></p>
                       <p>About Quiz: {{$quiz->description}}</p>
                       <p>Time Allocated: {{$quiz->minutes}} minutes</p>
                       <p>Number Questions: {{$quiz->questions->count()}}</p>
                       <p>
                           @if(!in_array($quiz->id , $wasQuizCompleted))
                            <a href="quiz/{{$quiz->id}}">
                               <button class="btn btn-dark">Start Quiz</button>
                            </a>
                           @else
                        <span><a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}" class="btn btn-dark">view result details</a>
                           <samp class="float-right">Quiz is Completed</samp>
                           @endif
                        </p>
                   </div>
                   @endforeach
                @else
                <p> You have not any exam !!
                @endif
               </div>
           </div>
           <div class="col col-md-4">
            <div class="card">
                <div class="card-header">
                   <h4 class="p-2">My Profile</h4>
                   <br/>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{auth()->user()->name}}</p>
                    <p><strong>Occupation:</strong> {{auth()->user()->occupation}}</p>
                    <p><strong>Email:</strong> {{auth()->user()->email}}</p>
                    <p><strong>Phone:</strong> {{auth()->user()->phone}}</p>
                    <p><strong>Address:</strong> {{auth()->user()->address}}</p>
                    <a href="#" class="btn btn-dark ">Edit</a>
                </div>
            </div>
           </div>
       </div>
   </div>

@endsection
