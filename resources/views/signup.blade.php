@extends('layout2.app')

@section('content')
<div class="container">
  <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
          
        <h1>Sign up</h1>
        
        <form action="{{route('creuser')}}" method="POST" enctype="multipart/form-data">
            @csrf
                @if (session('status'))
                    <div class="alert alert-warning">
                        {{session('status') }}
                    </div>
                @endif
            <div class="form-group">
                <label for="name">Name <span class="require">*</span></label>
                <input type="text" class="form-control" name="name" value=""/>
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email <span class="require">*</span></label>
                <input type="text" class="form-control" name="email" value=""/>
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Password<span class="require" style="color: #666">*</span></label>
                <input type="text" class="form-control" name="title" value="" />
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </div>
            
        </form>
    </div>
    
  </div>
</div>
@endsection