<?php

require 'dbconnect.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Account Info</title>

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

    <div class="container">
        <h1><?php echo "" . $_SESSION['user']['user_firstname'] . ""?> Account Info</h1>

        <div class="container d-flex">

            <div class="fam">
                <h2>Your family</h2>
                <ul>
                    <?php
                        foreach($db->query('SELECT user_firstname, user_lastname FROM Users WHERE family_id = 1') as $row) {
                            echo "<li>". $row[user_firstname] . " " . $row[user_lastname] . "</li>";
                        }
                    ?>
                </ul>
            </div>

            <div class="buttonRow">
                <!-- <div class="update">
                    <a href="index.php?action=format" class="btn btn-outline-success">Add a Custom Format</a>
                </div> -->
        
                <div class="update">
                    <a href="index.php?action=updateUser&id=$_SESSION['user']['user_id']" class="btn btn-outline-success">Update Account Info</a>
                </div>
            </div>

        </div>
    </div>
    
    <?php include './common/footer.php'; ?>
</body>

</html>