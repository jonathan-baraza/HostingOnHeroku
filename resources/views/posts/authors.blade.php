@extends('master/base')
@section('title','Blog App')
@section('content')
<center><br>
	<div class="alert alert-success">Here are the King's blog authors.</div>
</center>

<div class="row" style="width: 90%;margin-left: 5%;">
	@foreach($users as $user)
		<div class="" style="width: 250px; height: 250px;margin:20px;">
			<div class="card" style="cursor: pointer;background-color: #e0e0e0;">
				<div class="card-header">
					<center><img style="height: 70px;width:70px;border-radius: 35px;" src="/storage/{{$user->profile->image ?? 'avatar.png'}}"></center>
				</div>
				<div class="card-body"><center>
					<small><span>Name</span><p class="text-primary">{{$user->name}}</p></small>
					<small><span>Email</span><p>{{$user->email}}</p></small>
					<small><span>About me</span><p class="text-success">{{$user->profile->about_me}}</p></small></center>
				</div>
			</div>
		</div>
	@endforeach
</div>
@endsection