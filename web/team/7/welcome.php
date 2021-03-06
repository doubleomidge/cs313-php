<?php
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Team7 || Sign up</title>

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
    <?php include 'nav.php'; ?>

    <div class="jumbotron centering">
        <h1>Welcome
            <?php if(isset($_SESSION['user'])) {
                echo $_SESSION['user']['username'];
            } ?>
        </h1>

        <div class="row">
            <a href="signup.php" class="btn btn-primary">Sign Up</a>
            <a href="login.php" class="btn btn-primary btn-bump">Login</a>
        </div>
    </div>

    </div>
</body>

</html>