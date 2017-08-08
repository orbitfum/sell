@if(Session::has('success'))
    <div class="alert-success notification" id="notification">
        {{Session::get('success')}}
    </div>
@endif


