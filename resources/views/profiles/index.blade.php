@extends('master/base')
@section('title',"{$user->username}")
@section('content')
@if(Session::has('updated'))
<script type="text/javascript">
	alert("{{Session::get('updated')}}");
</script>
@endif
<center>
	<div class="alert alert-success">Hello {{$user->username}}, Welcome to your profile.</div>
</center>

<div class="row borderssss" style="border-top:2px solid #dadada;width:90%;margin-top: 1%;">
	<div class="col-md-6 pl-5 bordersss" style="border-right: 2px solid #dadada;">

		<table class="table table-striped table-bordered text-center">
			<thead>
				<tr class="bg-success">
					<td colspan="2" class="text-light text-center">Your Details</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-success">Name</td>
					<td>{{$user->name}}</td>
				</tr>
				<tr>
					<td class="text-success">Email</td>
					<td>{{$user->email}}</td>
				</tr>
				<tr>
					<td class="text-success">About Me</td>
					<td class="text-primary">{{$user->profile->about_me}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<form class="p-3 border form" style="" method="POST" enctype="multipart/form-data" action="{{route('profile_update')}}">
			@csrf
			<div class="alert alert-warning">Update Form</div>
			<x-jet-validation-errors class="mb-4 text-danger" />
			<input type="hidden" name="id" id="id" value="{{$user->id}}" class="form-control">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" type="text" name="name" value="{{$user->name}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input id="username" type="text" name="username" value="{{$user->username}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input id="email" type="text" name="email" value="{{$user->email}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="about_me">About me</label>
				<input id="about_me" type="text" name="about_me" value="{{$user->profile->about_me}}" class="form-control">
			</div>
			

			<input type="submit" name="submit" value="Update" class="btn btn-primary">
			
		</form>
	</div>
	
</div>
@endsection