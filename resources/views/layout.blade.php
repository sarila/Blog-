<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Blog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
