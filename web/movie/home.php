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
            <a href="assign.php" class="btn btn-light" role="button">Sign me up</a>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <span class="fas fa-user-alt"></span>
                    <h2>Add users to your family</h2>
                    <div class="card-content">
                        <p>We know that you probably share your movies with those in your family. Why purchase the same movie
                            when someone in your family already owns it?</p>
                        <p>Easily know all the movies you, and your family, owns.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <span class="fas fa-warehouse"></span>
                    <h2>Find the movie you're looking for</h2>
                    <div class="card-content">
                        <p>We know that you probably share your movies with those in your family. Why purchase the same movie
                            when someone in your family already owns it?</p>
                        <p>Easily know all the movies you, and your family, owns.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <!-- <span class="fas fa-video"></span> -->
                    <span class="fas fa-couch"></span>
                    <h2>Get movie suggestions</h2>
                    <div class="card-content">
                        <p>We know that you probably share your movies with those in your family. Why purchase the same movie
                            when someone in your family already owns it?</p>
                        <p>Easily know all the movies you, and your family, owns.
                        </p>
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
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                        it to make a type specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                        release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>