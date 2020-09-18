@if(Session::has('error'))
    <div class="alert alert-danger" role="alert"">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Oh snap!</strong>{{Session::get('error')}}
    </div>
@endif
