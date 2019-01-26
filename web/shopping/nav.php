<?php
session_start();
?>

<nav class="navbar navbar-default navbar-expand-lg">
        <a class="navbar-brand" href="#" class="headerfont">shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Browse</a>
                </li>
                <li class="nav-item nav-cart navbar-text">
                    <a class="nav-link" href="viewcart.php">View Cart</a>
                    <span class="badge badge-secondary badge-pill nav-pill"><?php echo count($_SESSION['cart']) ?></span>
                </li>
            </ul>
        </div>
    </nav>