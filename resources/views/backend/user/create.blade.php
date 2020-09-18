@extends('backend.layouts.master')
@section('title','user- create user')
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
    <form action="{{route('user.store')}}" method="POST">
        @csrf

        <div class="module">
            <div class="module-head">
                <h3>Create User</h3>
            </div>
            <div class="module-body">



                <div class="control-group">
                    <label class="control-lable" for="name">Full Name</label>
                    <div class="controls">
                        <input type="text" name="name" class="span8 @error('name') is-invalid @enderror" placeholder="Enter full name" value=" {{old('name')}}   " >

                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <div class="control-group">
                    <label class="control-lable" for="email">Email</label>
                    <div class="controls">
                        <input type="text" name="email" class="span8 @error('email') is-invalid @enderror" placeholder="Enter email address" value=" {{old('email')}}   " >

                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <div class="control-group">
                    <label class="control-lable" for="password">Password</label>
                    <div class="controls">
                        <input type="password" name="password" class="span8 @error('password') is-invalid @enderror" placeholder="Enter password" >

                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <div class="control-group">
                    <label class="control-lable" for="occupation">Occupation</label>
                    <div class="controls">
                        <input type="text" name="occupation" class="span8 @error('occupation') is-invalid @enderror" placeholder="Enter occupation" value=" {{old('occupation')}}   " >

                    </div>
                    @error('occupation')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <div class="control-group">
                    <label class="control-lable" for="address">Address</label>
                    <div class="controls">
                        <input type="text" name="address" class="span8 @error('address') is-invalid @enderror" placeholder="Enter address" value=" {{old('address')}}   " >

                    </div>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </div>
                <di class="control-group">
                    <label class="control-lable" for="phone">Phone</label>
                    <div class="controls">
                        <input type="text" name="phone" class="span8 @error('phone') is-invalid @enderror" placeholder="Enter phone" value=" {{old('phone')}}   " >

                    </div>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
                    @enderror

                </di>
                <div class="control-group">
                    <label class="control-lable" for="is_admin">Role</label>
                    <div class="controls">
                        <select name="is_admin" class="span8 @error('is_admin') is-invalid @enderror">
                            <option value="0" selected>user</option>
                            <option value="1">admin</option>

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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </div>


            </div>
        </div>

    </form>


        </div><!--/.content-->
    </div><!--/.span9-->
@endsection

