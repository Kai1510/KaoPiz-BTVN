@extends('layout2.app')
@section('content')
<form action="{{route('login.auth')}}" method="POST">
  @csrf
  <hr><hr><hr>
    @if (session('status'))
                    <div class="alert alert-warning">
                        {{session('status') }}
                    </div>
                @endif
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection