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
<main style="width:60%;margin-left: 20%">
	@foreach($posts as $post)
	<div class="d-flex m-5 border rounded">
		<div style="padding:1%;">
			<a href="{{route('post_by_user',['id'=>$post->user->id])}}"><img class="rounded-circle" style="height: 100px;width:100px;" src="/storage/{{$post->user->profile->image ?? 'avatar.png'}}"></a>
			<br>
			<center><p class="text-success">{{$post->user->username}}</p></center>
		</div>
		<div class="card" style="width:100%;">
			<div class="card-header">
				<h4><a href="{{route('edit-post',['id'=>$post->id])}}">{{$post->title}}</a></h4>
			</div>
			<div class="card-body">
				<p>{{$post->body}}</p>
			</div>
			
		</div>
	</div>
	@endforeach
	<div style="width:100%;" class="d-flex justify-center">
		
			<div style="width: 50%;margin-left: 25%;display: flex;justify-content: center;">{{$posts->links("pagination::bootstrap-4")}}</div>
		
	</div>
	

</main>
@endsection