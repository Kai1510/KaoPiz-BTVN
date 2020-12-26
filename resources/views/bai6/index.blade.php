@extends('layout2.app')
@section('content')
@if (session('status'))
    <div class="alert alert-warning">
        {{session('status') }}
    </div>
@endif
<div class="text-center">
	<button type="button" class="btn btn-primary">
		<a href="{{route('bai6.create')}}">Add</a>
	</button>
</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Author</th>
				<th>Category</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $p)
			<tr>
				<td>{{$p->id}}</td>
				<td>{{$p->title}}</td>
				<td>{{$p->content}}</td>
				<td>@if($p->user)
					{{$p->user->name}}
					@endif
				</td>
				<td>
					@if($p->categories)
					@foreach($p->categories as $a)
					{{$a->name}}
					@endforeach
					@endif
				</td>
				<td>
					<img width="100px" height="100px" src="{{$p->image}}"/>
				</td>
				<td>
					<a class="btn btn-warning" href="{{route('bai6.edit', $p->id)}}">Sửa</a>
					<button type="button" class="btn btn-danger delete-button" data-id="{{$p->id}}">Xóa</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="d-flex justify-content-end">
		<a class="btn btn-primary" href="{{$posts->nextPageUrl()}}">Trang tiếp</a>
	</div>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', evt=> {
			$('.delete-button').click(function (e) {
				if(confirm('Xóa?')) {
					$.ajax({
						url: '/bai6/'+$(this).data('id'),
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						type: 'DELETE',
						success: function(result) {
							location.reload();
						}
					});
				}
			});
		})
	</script>
@endsection