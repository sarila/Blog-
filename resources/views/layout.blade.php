<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Blog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- csrf token mismatched -->
	<meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
<body>

	<div class="container">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>	
			<li class="nav-item">
				<a class="nav-link" href="post">Post</a>
			</li>	
			<li class="nav-item">
				<a class="nav-link" href="aboutus">About Us</a>
			</li>	
			<li class="nav-item">
				<a class="nav-link" href="contactus">Contact Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="hi">Hello</a>
			</li>	

		</ul>
	</div>
	<div class="container">
		@yield('content')
	</div>





</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
