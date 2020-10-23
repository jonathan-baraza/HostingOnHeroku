@extends('master/base')
@section('title',"{$post->title}")
@section('content')
@if(Session::has('post_updated'))
<script type="text/javascript">
	alert("{{Session::get('post_updated')}}");
</script>
@endif
<main style="width:70%;margin-left: 15%">
	<div id="post" class="d-flex m-5 border rounded">
		<div id="img" style="padding:1%;">
			<img class="rounded-circle" style="height: 100px;width:100px;" src="/storage/{{$post->user->profile->image ?? 'avatar.png'}}">
			<br><center><p class="text-success">{{$post->user->username}}</p></center>
		</div>
		<div class="card" style="width:100%;">
			<div class="card-header">
				<h4><a href="">{{$post->title}}</a></h4>
				@if(auth()->user()->id==$post->user_id)
					<div class="d-flex">
						<button id="update-btn" class="btn btn-warning mr-5">Update</button>
						<a href="{{route('post-confirm-delete',['id'=>$post->id])}}" class="btn btn-danger">Delete</a>
					</div>
				@endif
			</div>
			<div class="card-body">
				<p>{{$post->body}}</p>
			</div>
			
		</div>
	</div>
	<div >
			<form id="edit-form" style="width:500px;margin-left: 30%;display: ;" class="p-3 border" style="" method="POST"  action="{{route('edit-post',['id'=>$post->id])}}">
			@csrf
			<div class="alert alert-warning">Edit <i>'{{$post->title}}'</i></div>
			<x-jet-validation-errors class="mb-4 text-danger" />
			<input type="hidden" name="id" id="id" class="form-control" value="{{$post->id}}">
			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" type="text" name="title" class="form-control" value="{{$post->title}}">
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea id="body" class="form-control" name="body">{{$post->body}}</textarea>
				
			</div>
			

			<input id="submit" type="submit" name="submit" value="Submit Post" class="btn btn-success">
			
		</form>
	</div>
	
	
</main>
<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('#update-btn').click(function(){
		// 		$('#img,.card').hide();
		// 		$('#edit-form').show();
		// 	});
			
		// });
	</script>
@endsection