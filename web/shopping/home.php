<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Let's shop!</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <!-- my compiled css -->
    <link rel="stylesheet" href="main.css">
</head>

<body id="browse">
<?php require 'nav.php'; ?>

    <div class="container-fluid">
        <h1>This is a shopping page.</h1>

        <div class="container products">
            <div class="row">
                <div class="col-sm br-product">
                    <img src="img/hula-duck.jpeg" alt="Hula duck with flower lei">
                    <h2>Hula Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=1" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
                <div class="col-sm br-product">
                    <img src="img/glow-duck.jpeg" alt="Green glow in the dark duck">
                    <h2>Glow Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=2" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
                <div class="col-sm br-product">
                    <img src="img/patty-duck.jpeg" alt="Leprechan duck in honor of St Patricks Day">
                    <h2>St. Patty's Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=3" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm br-product">
                    <img src="img/pirate-duck.jpeg" alt="Pirate duck with a pirate hat and eyepatch">
                    <h2>Pirate Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=4" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
                <div class="col-sm br-product">
                    <img src="img/sail-duck.jpeg" alt="Sailor duck">
                    <h2>Sailor Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=5" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
                <div class="col-sm br-product">
                    <img src="img/spa-duck.jpeg" alt="Spa duck with towel">
                    <h2>Spa Duck</h2>
                    <a href="controller.php?action=addToCart&itemId=6" class="btn btn-outline-primary addToCart">Add to Cart</a>
                </div>
            </div>
        </div>


    </div>


    <footer>
        <p>Thanks to
            <a href="https://duckycity.com">Duck City</a> for the images.</p>
    </footer>
</body>

</html>