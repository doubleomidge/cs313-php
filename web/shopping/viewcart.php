<?php
session_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>What have we got here | View Cart</title>

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

    <body id="view">
        <?php require 'nav.php'; ?>

        <div class="container">
            <h1>Your cart</h1>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-8">
                    <h2>Product Name</h2>
                    <div class="updates">
                        <p># of product</p>
                        <a href="" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>$PRICE</h3>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <h3>Total (# items)</h3>
                    <p class="justify">$Total</p>
                    <a href="" class="btn btn-success btnCheckout">To Checkout</a>
                </div>
            </div>

            <?php print_r($_SESSION['cart']); ?>
        </div>

    </body>

    </html>