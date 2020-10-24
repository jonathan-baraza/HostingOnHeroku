@extends('master/base')
@section('title','Blog App')
@section('content')
<center><br>
	<div class="alert alert-success">Here are the King's blog authors.</div>
</center>

<div class="row" style="width: 90%;margin-left: 5%;">
	@foreach($users as $user)
		<div class="col-sm-3" style="margin-top: 4%;">
			<div class="card" style="cursor: pointer;background-color: #e0e0e0;box-shadow: 2px 2px 4px #dadada;">
				<div class="card-header">
					<center><h6 class="text-primary">{{$user->name}}</h6></center>
				</div>
				<div class="card-body"><center>
					
					<small><span>Email</span><p>{{$user->email}}</p></small>
					<small><span>About me</span><p class="text-success">{{$user->profile->about_me}}</p></small></center>
				</div>
			</div>
		</div>
	@endforeach
</div>
@endsection