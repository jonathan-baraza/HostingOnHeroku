@extends('master/base')
@section('title','Blog App')
@section('content')
@if(Session::has('post_added'))
<script type="text/javascript">
	alert("{{Session::get('post_added')}}");
</script>
@endif
@if(Session::has('post_deleted'))
<script type="text/javascript">
	alert("{{Session::get('post_deleted')}}");
</script>
@endif
<center>
	<div class="alert alert-success">Welcome to the Home Page.</div>
</center>

<main>
	<div class="row" style="width:80%;margin-left: 10%;">
	@foreach($posts as $post)
	<br><br>
	<div class="card" style="width:100%;margin-top: 3%;">
		<div class="card-header">
			<div class="card-header-content d-flex align-items-baseline">
			<a href="{{route('edit-post',['id'=>$post->id])}}" class="mr-2"><h3 class="post-header">{{$post->title}}</h3></a> 
			<small>by</small> <span style="font-weight: bolder;" class="ml-2 text-success post-author">
				<i><a class="text-success" href="{{route('post_by_user',['id'=>$post->user->id])}}">{{$post->user->name}}</a></i></span><br style="display: none" class="time-break">
			<small class="ml-auto post-time" style="color:gray;font-weight: bold;"><span>Created at {{$post->created_at}}</span></small>
			</div>
		</div>
		<div class="card-body">
			<p class="post-content" style="">{{$post->body}}</p>
		</div>
	</div>
	@endforeach
	</div>
</div>
	<div style="width:100%;" class="d-flex justify-center">
		
			<div style="width: 50%;margin-left: 25%;display: flex;justify-content: center;">{{$posts->links("pagination::bootstrap-4")}}</div>
		
	</div>
	

</main>
@endsection