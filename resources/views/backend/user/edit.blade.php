@extends('backend.layouts.master')
@section('title','user- edit user')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('user/ '.$user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="module">
            <div class="module-head">
                <h3>Edit User</h3>
            </div>
            <div class="module-body">


                <div class="control-group">
                    <label class="control-label" for="name">Full Name</label>
                    <div class="controls">
                        <input type="text" name="name" value="{{$user->name}}"  class="span8">
                    </div>

                    @error("name")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" name="email" value="{{$user->email}}"  class="span8">
                    </div>

                    @error("email")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>

                <div class="control-group">
                    <label class="control-label" for="visible_password">password</label>
                    <div class="controls">
                        <input type="password" name="password" value="{{old('password')}}"  class="span8">
                    </div>

                    @error("password")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="control-group">
                    <label class="control-label" for="occupation">Occupation</label>
                    <div class="controls">
                        <input type="text" name="occupation" value="{{$user->occupation}}"  class="span8">
                    </div>

                    @error("occupation")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="control-group">
                    <label class="control-label" for="phone">Phone Number</label>
                    <div class="controls">
                        <input type="text" name="phone" value="{{$user->phone}}"  class="span8">
                    </div>

                    @error("phone")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls">
                        <input type="text" name="address" value="{{$user->address}}"  class="span8">
                    </div>

                    @error("address")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="control-group">
                    <label class="control-lable" for="phone">Phone Nmber</label>
                    <div class="controls">
                        <select name="is_admin" class="span8 ">

                                <option value="0" >User</option>
                                <option value="1" @if($user->is_admin)
                                selected @endif >Admin</option>



                        </select>
                    </div>
                    @error('is_admin')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </div>


            </div>
        </div>

    </form>


    </div><!--/.content-->
    </div><!--/.span9-->
@endsection


