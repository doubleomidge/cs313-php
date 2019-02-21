<?php

require 'dbconnect.php';

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

        <div class="container d-flex" style="margin: 0 auto;">

            <div class="fam" style="width: auto; margin-right: 30px; width: 800px;">
                <h2>Join / Set up a family</h2>
                <form method="post" action="index.php?action=family">
                    <div class="form-group">
                        <label for="family">Family name</label>
                        <input type="text" class="form-control" id="family" placeholder="Look for a family">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Request to Join</button>
                    <small class="form-text text-muted">This will send the main user an email to review.</small>
                </form>
            </div>


            <div class="fam" style="width: 500px; text-align: left;">
                <h3>Add a specific family format</h3>
                <p style="font-style: italic;">We may not have every format ready for you, and your family, to use, if there is a format you'd like, enter it here!</p>

                <p>Here's a reminder of the types we already have:</p>
                <ul>
                    <li></li>
                </ul>

                <form method="post" action="index.php?action=format">
                    <div class="form-group">
                        <label for="newFormat">Name of new format</label>
                        <input type="text" class="form-control" id="newFormat" name="newFormat" placeholder="Enter desired name here">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Add Format</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include './common/footer.php'; ?>
</body>

</html>