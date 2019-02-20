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

    <div class="container-fluid hero">
        <div class="container hero-info">
            <h1>Movie-o-file</h1>
            <p>All your movies</p>
            <p>in one place</p>
            <a href="register.php" class="btn btn-light" role="button">Sign me up</a>
        </div>
    </div>

    <div class="container" id="about">
        <div class="row d-flex justify-content-between align-items-stretch">
            <div class="col-md-4">
                <div class="card">
                    <span class="fas fa-user-alt"></span>
                    <h2>Add users to your family</h2>
                    <div class="card-content">
                        <p>We know that you probably share your movies with those in your family.</p>
                        <p>Easily know all the movies you, and your family, owns.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <span class="fas fa-video"></span>
                    <h2>Find the movie you're looking for</h2>
                    <div class="card-content">
                        <p>With digital movie libraries, and DVD collections, as well as multiple viewing devices, it's hard to keep track
                        of your movies. But with this, you can have no more viewing confusion.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <span class="fas fa-couch"></span>
                    <h2>Get movie suggestions</h2>
                    <div class="card-content">
                        <p>You can have all your movies, at your fingertips, and easily look up all the movies you own by genre, release date, year, and more!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-5">
                <img src="img/dog-family.png" alt="" style="width: 500px;">
            </div>
            <div class="col-7">
                <h3>Movies made easier to share</h3>
                <div class="share-content">
                    <!-- <p>Just like you, I enjoy settling in for a movie night with my family. Selecting the movie has never been easy.
                    We usually start by opening up our Apple TV and going through movies we own there, then looking at our DVDs, then going
                    back to our devices to see what other digital movies we own.</p>
                    <p>At that point, it's already been an hour and I am getting tired. So I figured why not start a database, for my family,
                    and others, to be able to see all their movies at once.</p> -->
                    <p>With Movie-o-file, you can add members to your family, find all your movies, add new movies, look for suggestions, and more!
                    It's never been easier to pick a movie.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>