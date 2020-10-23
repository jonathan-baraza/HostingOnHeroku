@extends('master/base')
@section('title',"{$post->title}")
@section('content')
<br>
<center>
	<br>
	<span style="font-size: 20px;">Are you sure you want to delete <b style="font-size: 25px;">"{{$post->title}}"</b>?</span>
	<br><br><br>
	<form style="width: 50%;margin-left: 25px;display: flex;justify-content: center;" method="POST" action="{{route('post-delete',['id'=>$post->id])}}">
		@csrf
	<div class="d-flex">
		<a href="{{route('edit-post',['id'=>$post->id])}}" class="btn btn-outline-info mr-5">Cancel</a>
		<input type="submit" name="submit" value="Yes, Delete!" class="btn btn-danger">
	</div>
</center>
@endsection