<?php
require 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Modify Account Info</title>

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
    <?php include './common/nav.php'; ?>

    <?php
        if (isset($passMessage)) {
            echo $passMessage;
        }
    ?>

    <div class="container changes">
        <h1><?php
        if (isset($_SESSION['user'])) {
            echo "Modify <span>" . $_SESSION['user']['user_firstname'] . "<span>";
        }
        ?></h1>
        <form action="index.php?action=userInfo" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-lg" id="username" type="text" value="<?php
                    if (isset($_SESSION['user'])) {
                        echo "" . $_SESSION[user][username] . "";
                    }
                    ?>" name="username" required>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="first">First name</label>
                        <input type="text" class="form-control form-control-lg" id="first" type="text" value="<?php
                            if (isset($_SESSION['user'])) {
                                echo "" . $_SESSION[user][user_firstname] . "";
                            }
                            ?>" name="first" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="last">Last name</label>
                        <input type="text" class="form-control form-control-lg" id="last" type="text" value="<?php
                            if (isset($_SESSION['user'])) {
                                echo "" . $_SESSION[user][user_lastname] . "";
                            }
                            ?>" name="last" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control form-control-lg" id="email" type="text" value="<?php
                    if (isset($_SESSION['user'])) {
                        echo "" . $_SESSION[user][email] . "";
                    }
                    ?>" name="email" required>
            </div>

            <input hidden value="<?php echo "" . $_SESSION[user][user_id] . ""; ?>" name="user_id">
            <button type="submit" class="btn btn-primary">Update Info</button>
        </form>
    </div>

    <?php include './common/footer.php'; ?>
</body>
</html>