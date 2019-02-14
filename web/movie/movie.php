<?php

require 'dbconnect.php';

$moviejoin = 'SELECT * FROM Movies m
                JOIN Rating r ON m.movie_rating_id = r.rating_id
                JOIN Genre g ON m.genre_id = g.genre_id
                JOIN Format f on m.format_id = f.format_id';

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
    <?php include 'nav.php'; ?>

    <div class="jumbotron">
        <div class="list-intro">
            <h1 class="display-4">Your movies</h1>
            <p class="lead">This is all the movies that your family has added so far. It doesn't end here, you can add more movies, update
                movies, or get a suggestion on what to watch next.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <a href="index.php?action=add" class="btn btn-primary">Add more movies</a>
                </div>
                <div class="col-md-6">
                    <a href="next.php" class="btn btn-primary">What to watch</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover">
           <thead>
            <tr>
                <th scrope="col">Movie Title</th>
                <th scrope="col">Movie Rating</th>
                <th scrope="col">Genre</th>
                <th scrope="col">Movie Format</th>
                <th colspan="2"></th>
            </tr>
           </thead>
           <tbody>

        <?php

        foreach($db->query($moviejoin) as $row) {
                echo '<tr><td scope="row">' . $row['movie_title'] . '</td>';
                echo '<td>' . $row['rating_type'] . '</td>';
                echo '<td>' . $row['genre_name'] . '</td>';
                echo '<td>' . $row['format_type'] . '</td>';
                echo "<td><a href='/movie/index.php?action=modify&id=$row[movie_id]' title='Click to modify'>Modify</a></td>";
                echo '<td><a onclick="$(\'#myModal\').modal(\'show\')" class="cursor-link" title="Click to delete">Delete</a></td>';
                echo '</tr>';
            }
        ?>
            </tbody>
        </table>

    </div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>This will delete the movie from the database. Are you sure you want to delete [title]?</p>
      </div>
      <div class="modal-footer">
        <a href='/movie/index.php?action=delete&id=$row[movie_id]' class="btn btn-default">Delete</a>
        <a href='/movie/index.php?action=delete&id=$row[movie_id]' class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>

  </div>
        </div>

    <?php include 'footer.php'; ?>
</body>

</html>