@extends('layout2.app')

@section('content')
<div class="container">
  <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
          
        <h1>Create post</h1>
        
        <form action="{{route('bai6.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                @if (session('status'))
                    <div class="alert alert-warning">
                        {{session('status') }}
                    </div>
                @endif
            <div class="form-group">
                <label for="categories">Category <span class="require">*</span></label>
                    <select class="custom-select" name="categories[]" multiple>
                    @foreach($cs as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    </select>
                    @error('categories')
                    <span class="text-danger">{{$message}}</span>
                    @enderror  
            </div>
            <div class="form-group">
                <label for="author">Author <span class="require">*</span></label>
                <select class="form-control" name="user_id">
                @foreach($us as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="slug">Slug <span class="require">*</span></label>
                <input type="text" class="form-control" name="slug" value="{{old('slug')}}"/>
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="title">Title <span class="require" style="color: #666">*</span></label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" />
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="5" class="form-control" name="content" ></textarea>
                @error('content')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Add image</label>
                <input type="file" class="form-control-file" name="image">
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