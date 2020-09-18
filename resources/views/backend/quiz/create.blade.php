@extends('backend.layouts.master')
@section('title','quiz- create quiz')
@section('content')

            <div class="module">
                <div class="module-head">
                    <h3>Create new quiz</h3>
                </div>
                <div class="module-body">

                    <form action="{{route('quiz.store')}}" class="form-vertical row-fluid" method="post">
                        @csrf
                        <div class="control-group">
                           <label class="control-label" for="basicinput">QUIZ  Name</label>
                            <div class="controls">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Enter quiz name" class="span8">
                            </div>
                            <div class="controls">
                                @error("name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Description</label>
                            <div class="controls">
                                <textarea  name="description" value="{{old('description')}}" placeholder="Enter description about quiz" class="span8">{{old('description')}}</textarea>
                                </div>
                            <div class="controls">
                                @error("description")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Minutes</label>
                            <div class="controls">
                                <input type="text" name="minutes" value="{{old('minutes')}}" placeholder="Enter quiz time" class="span8">
                            </div>
                            <div class="controls">
                                @error("minutes")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div><!--/.content-->
    </div><!--/.span9-->
@endsection

