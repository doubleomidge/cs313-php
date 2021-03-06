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
        <h1>[user] Account Info</h1>

        <div class="container">

            <div class="fam" style="width: 500px; text-align: left;">
                <h3>Add a specific family format</h3>
                <p class="ii">We may not have every format ready for you, and your family, to use, if there is a format you'd like, enter it here!</p>

                <p>Here's a reminder of the types we already have:</p>
                <ul>
                    <?php
                        foreach($db->query('SELECT format_type FROM Format') as $row) {
                            echo "<li>". $row[format_type] . "</li>";
                        }
                    ?>
                </ul>

                <form action="index.php?action=formatAdd" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" id="newFormat" placeholder="Enter custom format here" name="newFormat" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit New Format</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include './common/footer.php'; ?>
</body>

</html>