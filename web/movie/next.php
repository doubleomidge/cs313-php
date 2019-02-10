<?php

require 'dbconnect.php';

$titles;

if(isset($_POST['genre'])) {
    $genre = $_POST['genre'];

    $stmt = $db->prepare('SELECT * FROM Genre g
                        JOIN Movies m on g.genre_id = m.genre_id
                    WHERE g.genre_id=:id');

    $stmt->bindValue(':id', $genre, PDO::PARAM_INT);
    $stmt->execute();
    $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$moviejoin = 'SELECT * FROM Movies m
                JOIN Rating r ON m.movie_rating_id = r.rating_id
                JOIN Genre g ON m.genre_id = g.genre_id
                JOIN Format f on m.format_id = f.format_id';


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

    <div class="container-fluid movie-hero">
        <div class="container search">
            <h1>Let's find a movie</h1>
            <div class="input-group">
                <form action="#" method="post">
                    <select class="form-control form-control-lg" name="genre">
                    <?php
                    foreach($db->query('SELECT * FROM Genre g') as $row) {
                        echo "<option value=" . $row[genre_id] . ">". $row[genre_name] . "</option>";
                    }
                    ?>
                    </select>
                    
                    <span class="input-group-btn">
                        <button class="btn btn-primary movie-search" type="submit">Find!</button>
                    </span>
                </form>
            </div>

            <div class="container" style="background-color: white;">
                <?php
                    foreach($titles as $title) {
                        echo "<p>" . $title['movie_title'] . "</p>";
                    }

                    foreach($db->query($moviejoin) as $row) {
                echo '<tr><td scope="row">' . $row['movie_title'] . '</td>';
                echo '<td>' . $row['rating_type'] . '</td>';
                echo '<td>' . $row['genre_name'] . '</td>';
                echo '<td>' . $row['format_type'] . '</td>';
                echo "<td><a href='/movie/index.php?action=mod&id=$row[movie_id]' title='Click to modify'>Modify</a></td>";
                //echo '<td><a href="index.php?action=modify">Modify</a></td>';
                // echo '<td><a href="index.php?action=delete">Delete</a></td>';
                echo '</tr>';
            }
                ?>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>
</body>

</html>