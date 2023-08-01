@if (Session::has('msg'))
    <div class="alert alert-danger mess_login " id="mess_login" role="alert">
        {{ session('msg') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success mess_login " id="mess_login" role="alert">
        {{ session('success') }}
    </div>
@endif
