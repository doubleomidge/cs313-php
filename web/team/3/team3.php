<html>
<?php

$countries = array(
	"NA" => "North America",
	"SA" => "South America",
	"EU" => "Europe",
	"AI" => "Asia",
	"AU" => "Australia",
	"AF" => "Africa",
	"AN" => "Antartica"
);

?>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>
    <title>Team Week 3 Form</title>
</head>

<body>

<div class="container" style="margin-top:2em;">
	<form method="post" action="results.php">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="nameinput">Name: </label>
				<input type="text" name="name" id="nameinput">
			</div>

			<div class="form-group col-md-6">
				<label for="emailinput">Email Address: </label>
				<input type="text" name="email" id="emailinput">
			</div>
		</div>

		<p>Major: </p>
		<?php 
		$majors = ['CS Computer Science', 'WDD Web Design and Development', 'CIT Computer Information Technology', 'CE Computer Engineering'];

		foreach($majors as $major) {
			echo '<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="major" id="inlineRadio1" value=" ' . $major . ' ">
			<label class="form-check-label" for="inlineRadio1"> ' . $major . ' </label>
			</div>';
		}

		?>

		<p style="margin-top:1em;">Where have you visited? Check all that apply.</p>
		<?php
		foreach($countries as $key=>$country) {
			echo '<div class="form-check form-check-inline">
  			<input class="form-check-input" type="checkbox" name="travel[]" id=" ' . $country . ' " value=" ' . $key . ' ">
  			<label class="form-check-label" for="inlineCheckbox1"> ' . $country . ' </label>
			</div>';
		}

		?>

		<div class="form-group" style="margin-top:1em;">
			<label for="commentinput">Comments: </label>
			<textarea class="form-control" id="commentinput" name="comment" rows="3"></textarea>
		</div>

		<input type="submit">

	</form>
</div>

</body>

</html>