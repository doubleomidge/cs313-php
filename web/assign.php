<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Abby's Projects</title>

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <header>
        <div class="jumbotron j-assign">
            <div class="intro-assign">
                <h1 class="display-4">I've got projects!</h1>
                <p class="lead">These are just some of my projects, specifically for Web Engineering II, </p>
                <p>but if you want to look at more, which in that case
                    <em>thank you</em>, here's
                    <a href="https://abigailloosle.github.io/">my portfolio.</a>
                </p>
            </div>
        </div>
    </header>

    <div class="row main-assign">
        <div class="col project recent1">
            <div class="pro-content">
                <h2>A homepage interface</h2>
                <p>The homepage and setup for
                    <a href="https://vast-reaches-29790.herokuapp.com/hello.php">this site</a> was the first step to diving deeper into web development.</p>
                <p>The page was built using Bootstrap 4 and SASS.</p>
                <p>All changes and updates to this page were pushed to GitHub through the terminal.</p>
            </div>
        </div>

        <div class="col project recent3">
            <div class="pro-content">
                <h2>A homepage interface</h2>
                <p>The homepage and setup for
                    <a href="https://vast-reaches-29790.herokuapp.com/hello.php">this site</a> was the first step to diving deeper into web development.</p>
                <p>The page was built using Bootstrap 4 and SASS.</p>
                <p>All changes and updates to this page were pushed to GitHub through the terminal.</p>
            </div>
        </div>

        
        <div class="w-100"></div>
        <div class="col project recent4">
            <div class="pro-content">
                <h2>A homepage interface</h2>
                <p>The homepage and setup for
                    <a href="https://vast-reaches-29790.herokuapp.com/hello.php">this site</a> was the first step to diving deeper into web development.</p>
                <p>The page was built using Bootstrap 4 and SASS.</p>
                <p>All changes and updates to this page were pushed to GitHub through the terminal.</p>
            </div>
        </div>

        <div class="col project comingsoon">
            <div class="pro-extra">
                <h2>More coming soon</h2>
                <p>I never stop creating, so please keep checking back to see what is new here.</p>
                <p>If you’d like to collaborate, please email me, or fill out this contact form.</p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>