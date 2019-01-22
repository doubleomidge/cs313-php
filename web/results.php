<?php
$userName = filter_input(INPUT_POST, 'name');
$userEmail = filter_input(INPUT_POST, 'email');
$userMajor = filter_input(INPUT_POST, 'major');
$userComments = filter_input(INPUT_POST, 'comment');
$userTravel = filter_input(INPUT_POST, 'travel');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Results</title>
</head>
<body>
    <div class="container">
        <h1>Hi <?php echo $userName ?></h1>
        <p>This is your email link: <a href="mailto:<?php echo $userEmail ?>"><?php echo $userEmail ?></a></p>
        <p>Your major is: <?php echo $userMajor ?></p>
        <p>You said: <?php echo $userComments ?></p>
        <p>You've been to: <?php echo $userTravel ?></p>
    </div>
</body>
</html>