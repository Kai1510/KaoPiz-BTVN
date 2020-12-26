<h1>Bạn cần xác thực tài khoản</h1>
@if(Auth::user())
<a href="{{route('logout')}}">Logout</a>
@endif