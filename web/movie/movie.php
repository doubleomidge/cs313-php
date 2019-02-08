<?php

require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Home</title>

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

    <div class="jumbotron">
        <div class="list-intro">
            <h1 class="display-4">Your movies</h1>
            <p class="lead">This is all the movies that your family has added so far. It doesn't end here, you can add more movies, update
                movies, or get a suggestion on what to watch next.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <a href="add.html" class="btn btn-primary">Add more movies</a>
                </div>
                <div class="col-md-6">
                    <a href="next.html" class="btn btn-primary">What to watch</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="product-table">
           <thead>
            <tr><th>Your Movies</th><td>&nbsp;</td><td>&nbsp;</td></tr>
           </thead>
           <tbody>

        <?php
        foreach($db->query('SELECT * FROM Movies') as $row) {
                echo '<tr><td>' . $row['movie_title' . ']</td>'
            }
        ?>
            </tbody>
        </table>

    </div>

    <?php include 'footer.php'; ?>
</body>

</html>