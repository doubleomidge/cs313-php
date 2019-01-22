<html>

<head>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
	<form method="post" action="results.php">
		<div class="form-group">
			<label for="nameinput">Name: </label>
			<input type="text" name="name" id="nameinput">
		</div>

		<div class="form-group">
			<label for="emailinput">Email Address: </label>
			<input type="text" name="email" id="emailinput">
		</div>

		<p>Major: </p>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="major" id="inlineRadio1" value="Computer Science">
			<label class="form-check-label" for="inlineRadio1">Computer Science</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="major" id="inlineRadio2" value="Web Design and Development">
			<label class="form-check-label" for="inlineRadio2">Web Design and Development</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="major" id="inlineRadio3" value="Computer Information Technology">
			<label class="form-check-label" for="inlineRadio3">Computer Information Technology</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="major" id="inlineRadio3" value="Computer Engineering">
			<label class="form-check-label" for="inlineRadio3">Computer Engineering</label>
		</div>

		<div class="form-group">
			<label for="commentinput">Comments: </label>
			<textarea class="form-control" id="commentinput" name="comment" rows="3"></textarea>
		</div>

		<input type="submit">

	</form>
</div>

</body>

</html>