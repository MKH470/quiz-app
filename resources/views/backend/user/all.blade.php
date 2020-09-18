@extends('backend.layouts.master')
@section('title','user- all users')
@section('content')
    <div class="col col-md-12">
    <div class="module">
        <div class="module-head">
                    <h3>Users Table</h3>
<br/>
<a href="{{route('user.create')}}" class="btn btn-success menu-icon icon-plus"> Add User</a>
            </div>
        </div>
        <div class="module-body">
            <p>
                <!--<strong>Default</strong>-->
                <small>here you can see all users</small>
            </p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Registration date</th>
                    <th>Profile</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @if(App\User::count()>0)
                @foreach($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->occupation}}</td>
                    <td>{{$user->phone}}</td>



                    <td>{{$user->address}}</td>
                    <td>  {{$user->is_admin?'Admin' :'User'  }}</td>
                    <td>{{date('F d,Y',strtotime($user->created_at))}}</td>
                    <td>
                        <a href="#" class="btn btn-info">View</a>
                    </td>
                    <td>
                        <a href="{{route('user.edit',[$user->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                    <form method="POST" action="{{route('user.destroy', [$user->id]) }}" id="delete-form{{$user->id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE') }}
                        </form>
                        <a href="#" onclick="if(confirm('Do you want to delete this question ?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$user->id}}').submit()
                        }else{
                            event.preventDefault();
                            }
                            "><input type="submit" value="Delete" class="btn btn-danger"></a>

                    </td>

                </tr>
               @endforeach
                @else
                <td>No users to display
                    <div>
                        <br>
                <a href="{{route('user.create')}}" class="btn btn-info">Create User</a>
                    </div>
                </td>
                    @endif
                </tbody>
            </table>

            <br />
            <!-- <hr /> -->
<div class="pagination pagination-centered">
    {{$users->links()}}
</div>
        </div>
    </div>
    </div>
@endsection
