<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Abby is great @ Web2</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
	 crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- my compiled css -->
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div class="container-fluid hero">
		<div class="container hero-info">
			<h1>Hello world!</h1>
			<p>Welcome to the Vast Reaches</p>
			<p class="space">I’ve got a bit
				<a href="#about">about me</a>, and a little more about what I’m working on.</p>
			<a href="assign.html" class="btn btn-light" role="button">To the projects</a>
		</div>
	</div>
	<?php include 'nav.php'; ?>


	<div class="container">
		<div class="row mb-3 socials">
			<div class="col-md-4">
				<a href="https://github.com/doubleomidge/cs313-php" target="_blank">Github</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.instagram.com/abee_loosle/" target="_blank">Instagram</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.linkedin.com/in/abigail-loosle" target="_blank">LinkedIn</a>
			</div>
		</div>
	</div>

	<div class="container" id="about">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-4 col-sm-8 about-info">
				<h2>I'm Abby</h2>
				<p class="emp-text">web developer / designer</p>

				<p>I enjoy building responsive stuff for the web, making people smile, baking cookies, and SASS.</p>
			</div>
			<div class="col-lg-4 col-sm-4">
				<img src="img/code.gif" alt="I love to code">
			</div>
			<div class="col-lg-2"></div>
		</div>

	</div>

	<div class="container about-icon">
		<div class="row">
			<div class="col">
				<div class="info">
					<span class="fas fa-plane-departure"></span>
					<p>I love to travel</p>
				</div>

			</div>
			<div class="col center-block">
				<span class="fas fa-film"></span>
				<p>I watch lots of movies</p>
			</div>
			<div class="col center-block">
				<span class="fas fa-grin-beam"></span>
				<p>I am a happy person</p>
			</div>
			<div class="col center-block">
				<span class="fas fa-umbrella-beach"></span>
				<p>I like the beach</p>
			</div>
		</div>
	</div>

	<!-- <div class="container work">
		<h2>How I work</h2>
		<div class="row">
			<div class="col-4 work-container">
				<h3>Mock up Design</h3>
				<span class="fas fa-drafting-compass"></span>
				<span class="fas fa-draw-polygon"></span>
				<p></p>
			</div>

			<div class="col-4 work-container">
				<h3>Code</h3>
				<span class="fas fa-code"></span>
				<p></p>
			</div>

			<div class="col-4 work-container">
				<h3>Mock up Design</h3>
				<span class="fas fa-drafting-compass"></span>
				<p></p>
			</div>
		</div>
	</div> -->

	<div class="container check-out">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-8 public">
					<h2>Check me out on my portfolio site</h2>
					<p>I've got a lot of my experience and my work up there</p>
				</div>
				<div class="col-6 col-lg-4">
					<img src="img/logo.png" alt="My logo">
				</div>
			</div>

		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

</html>