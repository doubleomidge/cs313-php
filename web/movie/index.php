<?php

require_once ('functions.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'modify':
        $movieId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $movieInfo = getMovieById($movieId);
        
        include 'changes.php';
        exit;
        break;

    default: 
    include 'home.php';

}

?>