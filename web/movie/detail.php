<?php
require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || <?php echo $movieInfo['movie_title']; ?> Movie</title>

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

    <div class="container detail">
        <h1> <?php echo $movieInfo['movie_title']; ?> </h1>

        <p> <?php echo $movieInfo['movie_year']; ?> </p>
        <p> <?php echo $movieInfo['movie_runtime']; ?> minutes</p>
        <p> <?php echo $movieInfo['movie_rating']; ?> </p>

        <p> <?php echo $movieInfo['genre_name']; ?> </p>

        <p> <?php echo $movieInfo['rating_name']; ?> </p>
        <p>Added by: <?php echo $movieInfo['user_firstname']; ?> </p>
        <p> <?php echo $movieInfo['format_type']; ?> </p>

        <ul>
            <?php
            foreach($db->query($similarG) as $row) {
                echo "<li><a href='/movie/index.php?action=detail&id=$row[movie_id]'>" . $row['movie_title'] . "</a></li>";
            }
            ?>
        </ul>
    </div>
    
    <?php include './common/footer.php'; ?>
</body>

</html>