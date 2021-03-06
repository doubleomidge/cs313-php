<?php

require 'dbconnect.php';


$titles;

if(isset($_POST['genre'])) {

    $genre = $_POST['genre'];

    $stmt = $db->prepare('SELECT * FROM Genre g
                        JOIN Genre_Movie gm ON g.genre_id = gm.genre_id
                        JOIN Movies m ON gm.movie_id = m.movie_id
                    WHERE g.genre_id=:id');

    $stmt->bindValue(':id', $genre, PDO::PARAM_INT);
    $stmt->execute();
    $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Movie Suggestion</title>

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

<body class="suggestion">
    <?php include './common/nav.php'; ?>

    <div class="container-fluid movie-hero">
        <div class="container search">
            <h1>Let's find a movie</h1>
            <!-- <div class="input-group"> -->
                <form action="#" method="post">
                    <div class="form-row align-items-center">
                        <select class="col-sm-6 col-form-label nextform" name="genre">
                        <?php
                        foreach($db->query('SELECT * FROM Genre g') as $row) {
                            if($_POST['genre'] == $row[genre_id]) {
                                echo "<option value=" . $row[genre_id] . " selected>". $row[genre_name] . "</option>";
                            } else {
                                echo "<option value=" . $row[genre_id] . ">". $row[genre_name] . "</option>";
                            }
                        }
                        ?>
                        </select>
                        
                        <div class="col-auto">
                            <button class="btn btn-primary movie-search" type="submit">Find!</button>
                        </div>
                    </div>
                </form>
            <!-- </div> -->

            <div class="container movie-holder" style="background-color: white;">
                <?php
                    if ($_SESSION['user']) {
                        foreach($titles as $title) {
                        echo "<a href='/movie/index.php?action=detail&id=$title[movie_id]'>" . $title['movie_title'] . "</a>";
                        } 
                    } else {
                        echo "<p class='ii'>You could see suggestions here, if you either <a href='signin.php'>login</a> or <a href='register.php'>signup</a>.</p>";
                    }
                ?>
            </div>
        </div>

    </div>

    <?php include './common/footer.php'; ?>
</body>

</html>