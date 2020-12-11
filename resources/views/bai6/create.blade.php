@extends('layout2.app')

@section('content')
<div class="container">
  <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
          
        <h1>Create post</h1>
        
        <form action="{{route('bai6.store')}}" method="POST">
            @csrf
                @if (session('status'))
                    <div class="alert alert-warning">
                        {{session('status') }}
                    </div>
                @endif
            <div class="form-group">
                <label for="slug">Slug <span class="require">*</span></label>
                <input type="text" class="form-control" name="slug" />
            </div>
            
            <div class="form-group">
                <label for="title">Title <span class="require" style="color: #666">*</span></label>
                <input type="text" class="form-control" name="title"/>
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="5" class="form-control" name="content" ></textarea>
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