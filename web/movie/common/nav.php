<?php

session_start();

?>

<nav class="navbar navbar-default navbar-expand-lg">
        <a class="navbar-brand" href="home.php" class="headerfont">
            <span class="fas fa-film logo"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movie.php">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="next.php">Watch next</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <?php
                    if (isset($_SESSION['user']['user_firstname'])) {
                        echo '<li class="nav-item nav-bump">  <a href="index.php?action=account">Welcome '. $_SESSION['user']['user_firstname'] . '</a>  </li>';
                    } else {
                    echo ''; 
                    }
                ?>

                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a href="index.php?action=logout">Log Out</a>';
                    } else {
                        echo '<li class="nav-item">  <a class="nav-link" href="register.php">Sign up</a>  </li>';
                        echo '<li class="nav-item">  <a class="nav-link" href="signin.php">Log in</a>  </li>';
                    }
                ?>
            </ul>
        </div>
    </nav>

    