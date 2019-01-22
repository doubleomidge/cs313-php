<?php
$userName = filter_input(INPUT_POST, 'name');
$userEmail = filter_input(INPUT_POST, 'email');
$userMajor = filter_input(INPUT_POST, 'major');
$userComments = filter_input(INPUT_POST, 'comment');
$userTravel = $_POST['travel'];

?>

<html lang="en">
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
    <title>User Results</title>
</head>

<body>
    <div class="container" style="margin-top: 1em;">
        <h1>Hi <?php echo $userName ?></h1>
        <p>This is your email link: <a href="mailto:<?php echo $userEmail ?>"><?php echo $userEmail ?></a></p>
        <p>Your major is: <?php echo $userMajor ?></p>
        <p>You've been to: <?php foreach($userTravel as $places){echo $places . ", ";} ?> wow that's impressive!</p>
        <p>You said: <?php echo $userComments ?></p>
    </div>
</body>
</html>