<!DOCTYPE html>
<html>
<head>
	<x-links/>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		@media (max-width: 500px){
			.card-header-content{
				display: block !important;
			}
			.post-header{
				font-size: 20px;
			}
			.post-author{
				font-size: 15px;
			}
			.time-break{
				display: block !important;
			}
			.form{
				width:80% !important;
				margin-left: 10% !important;
			}
			.bordersss{
				border:none !important;
			}
			.borderssss{
				border:none !important;
				margin-left: 1% !important;
			}
		}
	</style>
</head>
<body>
<nav style="width:100%;" id="nav-big" class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">King's Blog</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto mr-5">

    	@auth
	      <li class="nav-item">
	        <a class="nav-link" href="{{route('homepage')}}">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{route('authors')}}">Authors</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="{{route('add-post')}}">Add New Post</a>
	      </li>

	     <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        {{auth()->user()->username}}
	      </a>

	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="{{route('user_profile',['id'=>auth()->user()->id])}}">My Profile</a>
	        <a class="dropdown-item" href="{{route('logouts')}}">Logout</a>
	      </div>

	    	</li>
	    @else
	    <li class="nav-item">
	        <a class="nav-link" href="{{route('homepage')}}">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{route('authors')}}">Authors</a>
	      </li>

	     <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	       Join us today
	      </a>

	      <div class="dropdown-menu">
	        <a class="dropdown-item" href="{{route('login')}}">Login</a>
	        <a class="dropdown-item" href="{{route('register')}}">Register</a>
	      </div>

	    	</li>
	    @endif

    </ul>
  </div>
</nav>





<div class="mb-5">
	@yield('content')
</div>
<br><br><br>
<footer style="width: 100%" class="fixed-bottom p-3 bg-dark text-light mt-5">
	<center>
		<p>King's Blog &copy;2020</p>
	</center>
	
</footer>
</body>
</html>