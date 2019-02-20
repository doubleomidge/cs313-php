<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Register</title>

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
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <?php include '../common/nav.php'; ?>

    <?php
        if (isset($passMessage)) {
            echo $passMessage;
        }
        ?>

    <div class="container register card">
        <form method="post" action="../index.php?action=register">
            <h1 class="bump-center">Register</h1>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstname" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastname" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                 <?php if (isset($star)) { echo $star;} ?><label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
                 <?php if (isset($star)) { echo $star;} ?><label for="password-confirm">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirm" placeholder="Confirm Password" required>
            </div>

            <button class="btn btn-primary btn-lg btn-block register-button" type="submit">Register Now</button>
        </form>
        <div class="log-in-text bump-center">
            <p>Already have an account?
                <a href="../view/signin.php">Sign In</a>
            </p>
        </div>
    </div>

    <?php include '../common/footer.php'; ?>
</body>

</html>