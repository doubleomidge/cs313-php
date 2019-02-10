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

<body class="add">
    <?php include 'nav.php'; ?>

    <div class="jumbotron">
        <div class="list-intro">
            <h1 class="display-4">So you got a new movie?</h1>
            <p class="lead">That's great news! We are excited to help you keep track of this new movie!</p>
            <p>Just to make sure we are all on the same page, you are [user] and you are adding this to the [family].</p>
        </div>
    </div>

    <div class="container">
        <form>
            <div class="form-group">
                <label for="movie_title">Movie Title</label>
                <input type="email" class="form-control form-control-lg" id="movie_title" placeholder="Tell me the movie name" required>
            </div>

            <div class="form-group">
                <label for="movie_desc">Movie Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="100" placeholder="Tell me a bit about the movie"></textarea>
                <p class="bump-right">
                    <span id="chars">500</span> characters remaining</p>
            </div>

            <div class="form-group">
                <label for="movie_year">Year Released</label>
                <input type="password" class="form-control" id="movie_year" placeholder="Year Released">
                <small id="movie_year" class="form-text text-muted">If this isn't as important to you, it isn't required.</small>
            </div>

            <div class="d-flex justify-space-around">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="movieCheck">
                    <label class="form-check-label" for="movieCheck">Is this a movie?</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="digital">
                    <label class="form-check-label" for="digital">Is this a digital copy?</label>
                </div>
            </div>

            <!-- drop downs -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="inputRating">Rating</label>
                    <select id="inputRating" class="form-control">
                        <option selected>Choose...</option>
                        <option>G</option>
                        <option>PG</option>
                        <option>PG-13</option>
                        <option>R</option>
                        <option>NR</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputGenre">Genre</label>
                    <select id="inputGenre" class="form-control">
                        <option selected>Choose...</option>
                        <option>Adventure</option>
                        <option>Action</option>
                        <option>Comedy</option>
                        <option>Drama</option>
                        <option>Fantasy</option>
                        <option>Horror</option>
                        <option>Musical</option>
                        <option>Mystery</option>
                        <option>Rom Com</option>
                        <option>Science Fiction</option>
                        <option>Childrens'</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputLocation">Format Type</label>
                    <select id="inputLocation" class="form-control">
                        <option selected>Choose...</option>
                        <option>Physical</option>
                        <option>iTunes / Apple TV</option>
                        <option>Amazon Prime</option>
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
    var maxLength = 100;

    $('textarea').keyup(function () {
        var length = $(this).val().length;
        var length = maxLength - length;
        $('#chars').text(length);

        if (length < 20) {
            $('.bump-right').css({ "color": "red" });
        } else {
            $('.bump-right').css({ "color": "black" });
        };
    });
</script>

</html>