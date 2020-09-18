@if(Session::has('warning'))
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Warning!</strong> {{Session::get('warning')}}
    </div>
@endif
