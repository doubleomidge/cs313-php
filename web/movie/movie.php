<?php

require 'dbconnect.php';

if(!isset($_GET['action'])) {
    $moviejoin = "SELECT *
                FROM Movies m
                JOIN Rating r ON m.movie_rating_id = r.rating_id
                JOIN Genre_movie gm ON m.movie_id = gm.movie_id
                JOIN Genre g ON gm.genre_id = g.genre_id
                JOIN Format f on m.format_id = f.format_id";
} else {
    $column = $_GET['action'];

    $moviejoin = "SELECT *
                FROM Movies m
                JOIN Rating r ON m.movie_rating_id = r.rating_id
                JOIN Genre_movie gm ON m.movie_id = gm.movie_id
                JOIN Genre g ON gm.genre_id = g.genre_id
                JOIN Format f on m.format_id = f.format_id
                ORDER BY $column ASC";
}

// if(!isset($_GET['action'])) {
//     $moviejoin = "SELECT m.movie_title, r.rating_type, array_to_string(array_agg(g.genre_name), ','), f.format_type
//                 FROM Movies m
//                 JOIN Rating r ON m.movie_rating_id = r.rating_id
//                 JOIN Genre_movie gm ON m.movie_id = gm.movie_id
//                 JOIN Genre g ON gm.genre_id = g.genre_id
//                 JOIN Format f on m.format_id = f.format_id
//                 GROUP BY m.movie_title, r.rating_type, f.format_type";
// } else {
//     $column = $_GET['action'];

//     $moviejoin = "SELECT m.movie_title, r.rating_type, array_to_string(array_agg(g.genre_name), ','), f.format_type
//                 FROM Movies m
//                 JOIN Rating r ON m.movie_rating_id = r.rating_id
//                 JOIN Genre_movie gm ON m.movie_id = gm.movie_id
//                 JOIN Genre g ON gm.genre_id = g.genre_id
//                 JOIN Format f on m.format_id = f.format_id
//                 GROUP BY m.movie_title, r.rating_type, f.format_type
//                 ORDER BY $column ASC";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Your Movies</title>

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

    <div class="jumbotron">
        <div class="list-intro">
            <h1 class="display-4">Your movies</h1>
            <p class="lead">This is all the movies that your family has added so far. It doesn't end here, you can add more movies, update
                movies, or get a suggestion on what to watch next.
            </p>
            <?php

            if ($_SESSION['user']) { ?>

            <div class="row">
                <div class="col-md-6">
                    <a href="index.php?action=add" class="btn btn-primary">Add more movies</a>
                </div>
                <div class="col-md-6">
                    <a href="next.php" class="btn btn-primary">What to watch</a>
                </div>
            </div>
            
            <?php } ?>

        </div>
    </div>

    <div class="container">
        <!-- <div class="input-group md-form form-sm form-1 pl-0">
            <div class="input-group-prepend">
                <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
                    aria-hidden="true"></i></span>
            </div>
            <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
        </div> -->

        <table class="table table-hover">
           <thead>
            <tr>
                <th scrope="col"><a href="movie.php?action=m.movie_title">Movie Title</a></th>
                <th scrope="col"><a href="movie.php?action=r.rating_type">Movie Rating</a></th>
                <th scrope="col">Genre</th>
                <th scrope="col"><a href="movie.php?action=f.format_type">Movie Format</a></th>
                <th colspan="2"></th>
            </tr>
           </thead>
           <tbody>

        <?php if ($_SESSION['user']) {
            foreach($db->query($moviejoin) as $row) {
                    echo "<tr><td scope='row'><a href='/movie/index.php?action=detail&id=$row[movie_id]'>" . $row['movie_title'] . "</a></td>";
                    echo '<td>' . $row['rating_type'] . '</td>';
                    echo '<td>' . $row['genre_name'] . '</td>';
                    echo '<td>' . $row['format_type'] . '</td>';
                    echo "<td><a href='/movie/index.php?action=modify&id=$row[movie_id]' title='Click to modify'>Modify</a></td>";
                    echo "<td><a href='/movie/index.php?action=delete&id=$row[movie_id]' title='Click to delete'>Delete</a></td>";
                    echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else { ?>
            </tbody>
            </table>

            <div class="container-fluid movie-blank">
                <p class="ii">You could see all your movies here, if you
                    either <a href="signin.php">login</a> or <a href="register.php">signup</a>.</p>
            </div>
        <?php } ?>

    </div>

    <?php include './common/footer.php'; ?>
</body>

</html>