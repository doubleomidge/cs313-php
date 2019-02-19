<?php

require_once ('dbconnect.php');
require_once ('functions.php');


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'register':
        $username = filter_input($POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input($POST, 'password', FILTER_SANITIZE_STRING);

        $safepass = password_hash($password, PASSWORD_DEFAULT);

        $added = addUser($username, $safepass);

        include ('login.php');

        break;

    default:
        include ('welcome.php');
}