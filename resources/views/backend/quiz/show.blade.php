@extends('backend.layouts.master')

	@section('title','quiz- view with questions')

	@section('content')

				<div class="span9">
                    <div class="content">
                    	   @if(Session::has('message'))

                                <div class="alert alert-success">{{Session::get('message')}}
                                </div>
                             @endif
                        <div class="module">
                            <div class="module-head">

                            </div>
                            @foreach($quizzes as $quiz)
                            <div class="module-body">
                            <p><h3  class="heading">{{$quiz->name}}</h3></p>
                                <p>{{$quiz->description}}</p>
                                <p><strong>The quiz time is {{$quiz->minutes}} minutes.</strong></p>
                                <div class="module-body table">
                                    @foreach($quiz->questions as $key=>$question)
                                    <table class="table table-message">

                                        <tbody>


                                            <tr class="read">
                                                <h5>{{$question->question}}</h5>
                                                <td class="cell-author hidden-phone hidden-tablet">

                                                    @foreach($question->answers as $answer)
                                                     <p>{{$answer->answer}}
                                                        @if($answer->is_correct)
                                                            <span class="badge badge-success pull-right" >correct</span>
                                                         @else
                                                             <span class="badge badge-light pull-right text-danger" >xxxxxx</span>
                                                        @endif
                                                     </p>
                                                    @endforeach
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                              <div class="modal-foot">
                                  <td>
                                      <a href="{{route('quiz.index')}}">
                                          <button class="btn btn-inverse pull-center">Back</button>
                                      </a>
                                  </td>
                              </div>
                   		</div>

                		</div>

           			</div>
        		</div>

            </div>
            </div>


@endsection
