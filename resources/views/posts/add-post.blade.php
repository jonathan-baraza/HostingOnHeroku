@extends('master/base')
@section('title','Add New Post')
@section('content')
@if(Session::has('post_added'))
<script type="text/javascript">
	alert("{{Session::get('post_added')}}");
</script>
@endif
<br><br>
		<form  style="width:40%;margin-left: 30%;" class="p-3 border form" style="" method="POST"  action="{{route('add-post')}}">
			@csrf
			<div class="alert alert-warning">Add New Post</div>
			<x-jet-validation-errors class="mb-4 text-danger" />
			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea id="body" class="form-control" name="body"></textarea>
				
			</div>
			

			<input type="submit" name="submit" value="Submit Post" class="btn btn-success">
			
		</form>
	
@endsection