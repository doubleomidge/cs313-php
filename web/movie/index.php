<?php

require_once ('dbconnect.php');
require_once ('functions.php');


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'modify':
        $movieId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $movieInfo = getMovieById($movieId);

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
        
        include 'changes.php';
        exit;
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

    default: 
    include 'home.php';

}

?>