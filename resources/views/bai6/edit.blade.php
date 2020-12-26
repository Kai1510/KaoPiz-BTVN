@extends('layout2.app')

@section('content')
<div class="container">
  <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
          
        <h1>Edit post</h1>
        
        <form action="{{route('bai6.update', $p->id)}}" method="POST">
            @csrf
            @method('PUT')
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
                <label for="slug">Author <span class="require">*</span></label>
                <select class="form-control" name="user_id">
                    @if($p->user)
                    <option value="{{$p->user->id}}">{{$p->user->name}}</option>
                    @endif
                @foreach($us as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="slug">Slug <span class="require">*</span></label>
                <input type="text" class="form-control" name="slug" value="{{$p->slug}}" />
            </div>
            
            <div class="form-group">
                <label for="title">Title <span class="require" style="color: #666">*</span></label>
                <input type="text" class="form-control" name="title" value="{{$p->title}}"/>
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="5" class="form-control" name="content" >{{$p->content}}</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Edit
                </button>
            </div>
            
        </form>
    </div>
    
  </div>
</div>
@endsection