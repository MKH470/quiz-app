@extends('layouts.app')
@section('content')
   <div class='container'>
       <div class="row justify-content-center">
           <div class="col-md-8">
            <p class="text-center">Hi! {{ auth()->user()->name }} </p>
            <h2 class="text-center"> your {{$quiz->name }} details </h2>



            <p>Quiz Time: {{ $quiz->minutes }}</p>
            <p>Question Number: {{$numQuestion->count()}}</p>

            @foreach($results as $key => $result)
            @if(!empty($result->question))
               <div class="card">
                   <div class="card-header ">
                           <p>
                              <h5>{{$key+1}} _ {{ $result->question->question}}</h5>
                           </p>

                   </div>
                   <div class="card-body">
                        <ol style="list-style-type: upper-alpha" >
                            @php
                            $answers=DB::table('answers')->where('question_id', $result->question_id)->get();
                            @endphp

                            @foreach($answers as $answer)
                            <li>
                                {{ $answer->answer }}

                            </li>
                            @endforeach

                       </ol>
                       <hr/>
                       <p><strong>Your Answer: </strong><span class={{ empty($result->answer)? 'text-danger':''}}> {{ !empty( $result->answer) ? $result->answer->answer :'You  did not give any answer !!'}}</span>  </p>
                       @php
                       $correctAnswers=DB::table('answers')->where('question_id', $result->question_id)->where('is_correct',1)->get();
                       @endphp
                        @foreach($correctAnswers as $answer)
                       <p><strong>
                           Correct Answer:
                        </strong>{{$answer->answer}} </p>
                        @endforeach
                       <p>

                             @if( !empty($result->answer ) && $result->answer->is_correct === 1 )
                             <span class="badge badge-success"> Result: Correct</span>
                            @else
                            <span class="badge badge-danger"> Result: Uncorrect</span>

                            @endif



                       </p>
                   </div>
               </div>
@else
<p></p>
@endif

               @endforeach
           </div>
       </div>
@endsection
