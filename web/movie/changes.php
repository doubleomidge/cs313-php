<?php
require 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Movieofile || Modify Movie</title>

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

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <div class="container changes">
            <h1><?php
            if (isset($movieInfo['movie_title'])) {
                echo "Modify <span>$movieInfo[movie_title]<span>";
            }
            ?></h1>
        <form action="index.php?action=addToData" method="post">
            <div class="form-group">
                <label for="movie_title"> Movie Title </label>
                <input type="text" class="form-control form-control-lg" id="movie_title" type="text"
                    <?php
                    if (isset($movieInfo['movie_title'])) {
                        echo "value='$movieInfo[movie_title]'";
                    }
                    ?> required>
            </div>

            <div class="form-group">
                <label for="movie_desc"> Movie Description </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="500" required><?php
                    if (isset($movieInfo['movie_desc'])) {
                        echo "$movieInfo[movie_desc]";
                    }?></textarea>
                <p class="bump-right">
                    <span id="chars">500</span> characters remaining</p>
            </div>

            <div class="form-group">
                <label for="movie_year">Year Released</label>
                <input class="form-control" id="movie_year" type="number"
                    <?php
                    if (isset($movieInfo['movie_year'])) {
                        echo "value='$movieInfo[movie_year]'";
                    }
                    ?> required>
                <small id="movie_year" class="form-text text-muted">If this isn't as important to you, it isn't required.</small>
            </div>

            <div class="d-flex justify-space-around">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="movieCheck" 
                        <?php
                        if (isset($movieInfo['movie_yn'])) {
                            echo checked;
                        }
                        ?> >
                    <label class="form-check-label" for="movieCheck">Is this a movie?</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="digital"
                        <?php
                        if (isset($movieInfo['movie_digital'])) {
                            echo checked;
                        }
                        ?> >
                    <label class="form-check-label" for="digital">Is this a digital copy?</label>
                </div>
            </div>

            <!-- drop downs -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="inputRating">Rating</label>
                    <select id="inputRating" class="form-control">
                        <option>Choose...</option>
                        <!-- generate list -->
                        <?php
                        foreach($db->query('SELECT * FROM Rating g') as $row) {
                            if($movieInfo['movie_rating_id'] == $row[rating_id]) {
                                    echo "<option value=" . $row[rating_id] . " selected>". $row[rating_type] . "</option>";
                                } else {
                                    echo "<option value=" . $row[rating_id] . ">". $row[rating_type] . "</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputGenre">Genre</label>
                    <select id="inputGenre" class="form-control">
                        <option>Choose...</option>
                        <?php
                        foreach($db->query('SELECT * FROM Genre g') as $row) {
                            echo "<option value=" . $row[genre_id] . ">". $row[genre_name] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputLocation">Format Type</label>
                    <select id="inputLocation" class="form-control">
                        <option>Choose...</option>
                        <?php
                        foreach($db->query('SELECT * FROM Format f') as $row) {
                            echo "<option value=" . $row[format_id] . ">". $row[format_type] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Send the family an email saying this movie was added?</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>

<script>
    var maxLength = 500;

    $('textarea').ready(function () {
        var length = $(this).val().length;
        var length = maxLength - length;
        $('#chars').text(length);

        if (length < 20) {
            $('.bump-right').css({ "color": "red" });
        } else {
            $('.bump-right').css({ "color": "black" });
        };
    });

    $("h1 span").prepend("&quot;");
</script>

</html>