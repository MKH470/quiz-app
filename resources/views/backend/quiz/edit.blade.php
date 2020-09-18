@extends('backend.layouts.master')
@section('title','quiz- create quiz')
@section('content')

    <div class="module">
        <div class="module-head">
            <h3>Create new quiz</h3>
        </div>
        <div class="module-body">

            <form action="{{url('admin/quiz/ '.$quiz->id)}}" class="form-vertical row-fluid" method="post">
                @csrf
                @method('PUT')
                <div class="control-group">
                    <label class="control-label" for="basicinput">QUIZ  Name</label>
                    <div class="controls">
                        <input type="text" name="name" value="{{$quiz->name}}" placeholder="Enter quiz name" class="span8">
                    </div>

                        @error("name")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Description</label>
                    <div class="controls">
                        <textarea  name="description" value="" placeholder="Enter description about quiz" class="span8">{{ $quiz->description }}</textarea>
                    </div>

                        @error("description")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div>
                <div class="control-group">
                    <label class="control-label" for="basicinput">Minutes</label>
                    <div class="controls">
                        <input type="text" name="minutes" value="{{$quiz->minutes}}" placeholder="Enter quiz time" class="span8">
                    </div>

                        @error("minutes")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Save quiz</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    </div><!--/.content-->
    </div><!--/.span9-->
@endsection

