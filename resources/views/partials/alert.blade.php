@if(count($errors)>0)
<div class="alert alert-danger mt-3 ">
    <ul class="pl-0 mb-0">
        @foreach($errors->all() as $error)
        <li style="list-style: none;">{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
@if(Session::has('err_message'))
<div class="alert alert-danger">{{Session::get('err_message')}}</div>
@endif