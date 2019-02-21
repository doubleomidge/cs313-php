<?php

require_once ('dbconnect.php');
require_once ('functions.php');

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'modify':
        $movieId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $movieInfo = getMovieById($movieId);

        $ratings;
        $titles;
        $formats;

        if(isset($_POST['inputRating'])) {
            $rating = $_POST['inputRating'];

            $stmt = $db->prepare('SELECT * FROM Rating r
                                JOIN Movies m on r.rating_id = m.rating_id
                            WHERE r.rating_id=:id');

            $stmt->bindValue(':id', $rating, PDO::PARAM_INT);
            $stmt->execute();
            $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($_POST['inputGenre'])) {
            $genre = $_POST['inputGenre'];

            $stmt = $db->prepare('SELECT * FROM Genre g
                                JOIN Movies m on g.genre_id = m.genre_id
                            WHERE g.genre_id=:id');

            $stmt->bindValue(':id', $genre, PDO::PARAM_INT);
            $stmt->execute();
            $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($_POST['inputFormat'])) {
            $format = $_POST['inputFormat'];

            $stmt = $db->prepare('SELECT * FROM Format f
                                JOIN Movies m on f.format_id = m.format_id
                            WHERE l.format_id=:id');

            $stmt->bindValue(':id', $format, PDO::PARAM_INT);
            $stmt->execute();
            $formats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        include 'changes.php';
        exit;
        break;

    case 'delete':
        $movieId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $delOutcome = deleteMovie($movieId);

        include 'movies.php';
        break;

    case 'add':
        $ratings;
        $titles;
        $formats;

        if(isset($_POST['inputRating'])) {
            $rating = $_POST['inputRating'];

            $stmt = $db->prepare('SELECT * FROM Rating r
                                JOIN Movies m on r.rating_id = m.rating_id
                            WHERE r.rating_id=:id');

            $stmt->bindValue(':id', $rating, PDO::PARAM_INT);
            $stmt->execute();
            $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($_POST['inputGenre'])) {
            $genre = $_POST['inputGenre'];

            $stmt = $db->prepare('SELECT * FROM Genre g
                                JOIN Movies m on g.genre_id = m.genre_id
                            WHERE g.genre_id=:id');

            $stmt->bindValue(':id', $genre, PDO::PARAM_INT);
            $stmt->execute();
            $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($_POST['inputFormat'])) {
            $format = $_POST['inputFormat'];

            $stmt = $db->prepare('SELECT * FROM Format f
                                JOIN Movies m on f.format_id = m.format_id
                            WHERE l.format_id=:id');

            $stmt->bindValue(':id', $format, PDO::PARAM_INT);
            $stmt->execute();
            $formats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        include 'add.php';
        break;

    case 'addToData':
        $title = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
        //truncate at 30 char

        $desc = filter_input(INPUT_POST, 'movie_desc', FILTER_SANITIZE_STRING);
        $year = filter_input(INPUT_POST, 'movie_year', FILTER_SANITIZE_NUMBER_INT);
        $run = filter_input(INPUT_POST, 'movie_run', FILTER_SANITIZE_NUMBER_INT);
        $movieb = $_POST['movie_bool'];
            // check if the box is checked and change it to something the database can interpret
            if($movieb == 'on'){
                $movieb = TRUE;
            } else {
                $movieb = FALSE;
            }
        $digitalb = $_POST['digital_bool'];
            if($digitalb == 'on'){
                $digitalb = TRUE;
            } else {
                $digitalb = FALSE;
            }
        $rate = filter_input(INPUT_POST, 'movie_rate', FILTER_SANITIZE_STRING);
        $gen = filter_input(INPUT_POST, 'movie_gen', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_POST, 'movie_type', FILTER_SANITIZE_STRING);

        // check to see if any requireds are empty
        if (empty($title) || empty($desc) || empty($year) || empty($run) || empty($rate) || empty($gen) || empty($type)) {
            $message = '<p class="notice">Please provide information for all empty form fields.</p>';
            include 'add.php';
            exit;
        }

        // echo "Show me the money $title, $desc, $year, $run, $movieb, $digitalb, $rate, $gen, $type";
        $addOutcome = addMovie($title, $desc, $year, $movieb, $digitalb, $run, $rate, $gen, $type);

        if ($addOutcome === 1) {
            $message = '<p class="container-fluid success">Thanks for adding ' . $title . '.</p>';
            include 'add.php';
            exit;
        } else {
            $message = '<p class="container-fluid notice">Sorry, but ' . $title . ' was not added. Please try again, check all fields.</p>';
            include 'add.php';
            exit;
        }
        break;

    case 'modifyData':
        $movieId = filter_input(INPUT_POST, 'movie_id', FILTER_SANITIZE_NUMBER_INT);
        $title = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
        $desc = filter_input(INPUT_POST, 'movie_desc', FILTER_SANITIZE_STRING);
        $year = filter_input(INPUT_POST, 'movie_year', FILTER_SANITIZE_NUMBER_INT);
        $run = filter_input(INPUT_POST, 'movie_run', FILTER_SANITIZE_NUMBER_INT);
        $movieb = $_POST['movie_bool'];
            // check if the box is checked and change it to something the database can interpret
            if($movieb == 'on'){
                $movieb = TRUE;
            } else {
                $movieb = FALSE;
            }
        $digitalb = $_POST['digital_bool'];
            if($digitalb == 'on'){
                $digitalb = TRUE;
            } else {
                $digitalb = FALSE;
            }
        $rate = filter_input(INPUT_POST, 'movie_rate', FILTER_SANITIZE_STRING);
        $gen = filter_input(INPUT_POST, 'movie_gen', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_POST, 'movie_type', FILTER_SANITIZE_STRING);

        // echo "Results: $movieId, $title, $desc, $year, $movieb, $digitalb, $run, $rate, $gen, $type";
        // exit;

        // check to see if any requireds are empty
        if (empty($title) || empty($desc) || empty($year) || empty($run) || empty($rate) || empty($gen) || empty($type)) {
            $message = '<p class="notice">Please provide information for all empty form fields.</p>';
            include 'changes.php';
            exit;
        }

        $modOutcome = updateMovie($movieId, $title, $desc, $year, $movieb, $digitalb, $run, $rate, $gen, $type);

        if ($modOutcome === 1) {
            $message = '<p class="container-fluid success">' . $title . ' has been updated.</p>';
            include 'changes.php';
            exit;
        } else {
            $message = '<p class="container-fluid notice">Sorry, but ' . $title . ' was not updated. Please try again, check all fields.</p>';
            include 'changes.php';
            exit;
        }
        break;

    case 'register':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        // $username = htmlspecialchars($username);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

        $passcomp = strcmp($password, $password2);

        if ($passcomp != 0) {
            $passMessage = "<p style='color: red; text-align: center;'> Sorry, there was an error logging you in.</p>";
            $star = "<span style='color: red;'>*</span>";
            include 'signup.php';
        } else {
            $verify = checkPassword($password);
            
            if (empty($verify)) {
                $passMessage = '<p style="color: red; text-align: center;">Please provide a valid password.</p>';
                include 'register.php';
                exit;
            }

            $safepass = password_hash($password, PASSWORD_DEFAULT);
            $added = addUser($username, $firstname, $lastname, $email, $safepass);

            if ($added == 0) {
                $passMessage = "<p style='color: red; text-align: center;'> Sorry, there was an error adding.</p>";
                exit;
            } else {
                include 'signin.php';
            }

            exit;
        }
    
        break;

    case 'login':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // $safepass = password_hash($password, PASSWORD_DEFAULT);

        $userPass = getPassword($username);
    
        $compare = password_verify($password, $userPass['user_password']);

        if ($compare) {
            $_SESSION['user'] = $userPass;
            $message = '<p style="color: red; text-align: center;">Login successful' . $SESSION['user'] . '.</p>';
            include 'home.php';
        } else {
            $message = "Invalid credentials";
            include 'signin.php';
        }

        break;

    case 'logout':
        //end the session
        unset($_SESSION['username']);

        header('Location: home.php');
        break;

    case 'detail':
        $movieId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $movieInfo = getAllMovieById($movieId);
        $rating = getallMovie($movieId);

        include 'detail.php';
        break;
    
    default: 
    include '/home.php';

}

?>