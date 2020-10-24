@extends('master/base')
@section('title',"{$post->title}")
@section('content')
@if(Session::has('post_updated'))
<script type="text/javascript">
	alert("{{Session::get('post_updated')}}");
</script>
@endif
<div class="row" style="width:80%;margin-left: 10%;">
<div class="card" style="width:100%;margin-top: 3%;">
		<div class="card-header">
			<div class="card-header-content d-flex align-items-baseline">
			<a href="{{route('edit-post',['id'=>$post->id])}}" class="mr-2"><h3 class="post-header">{{$post->title}}</h3></a> 
			<small>by</small> <span style="font-weight: bolder;" class="ml-2 text-success post-author"><i><a href="{{route('post_by_user',['id'=>$post->user->id])}}" class="text-success">{{$post->user->name}}</a></i></span><br style="display: none" class="time-break">
			<small class="ml-auto post-time" style="color:gray;font-weight: bold;"><span>Created at {{$post->created_at}}</span></small>
			</div>
		</div>
		@if(auth()->user()->id==$post->user_id)
					<div class="d-flex p-3">
						<button id="update-btn" class="btn btn-warning mr-5">Update</button>
						<a href="{{route('post-confirm-delete',['id'=>$post->id])}}" class="btn btn-danger">Delete</a>
					</div>
		@endif
		<div class="card-body">
			<p class="post-content" style="">{{$post->body}}</p>
		</div>
	</div>



	@if(auth()->user()->id==$post->user_id)
			<form id="edit-form" style="width:500px;margin-left: 30%;display: ;" class="mt-3 form p-3 border" style="" method="POST"  action="{{route('edit-post',['id'=>$post->id])}}">
			@csrf
			<div class="alert alert-primary" style="font-weight: bolder;">Edit <i>'{{$post->title}}'</i></div>
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
	@endif
<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('#update-btn').click(function(){
		// 		$('#img,.card').hide();
		// 		$('#edit-form').show();
		// 	});
			
		// });
	</script>
</div>
@endsection