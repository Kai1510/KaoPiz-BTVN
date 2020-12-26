<h1>Home</h1>
@if (session('status'))
    <div class="alert alert-warning">
        {{session('status') }}
    </div>
@endif
@if(Auth::user())
<a href="{{route('logout')}}">Logout</a>
@endif