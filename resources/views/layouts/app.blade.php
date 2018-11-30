<!DOCTYPE html>
<html>
<head>
	<title>Silver DC @yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<span class="navbar-brand mb-0 h1" style="margin-top: 0px">Silver DC</span>
	  <form class="form-inline">
	    <a href="/planeacions" class="btn btn-sm btn-outline-secondary" style="width: 100px">Planeaciones</a>
	  </form>
	</nav>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>