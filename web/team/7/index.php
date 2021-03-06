<?php

require_once ('dbconnect.php');
require_once ('functions.php');


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'register':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

        $passcomp = strcmp($password, $password2);
        echo $passcomp;
        exit;

        if ($passcomp != 0) {
            $passMessage = "<p style='color: red; text-align: center;'> Sorry, there was an error logging you in.</p>";
            $star = "<span style='color: red;'>*</span>";
            include 'signup.php';
        } else {
            $verify = checkPassword($password);
            
            if (empty($verify)) {
                $passMessage = '<p style="color: red; text-align: center;">Please provide a valid password.</p>';
                include 'signup.php';
                exit;
            }

            $safepass = password_hash($password, PASSWORD_DEFAULT);
            $added = addUser($username, $safepass);
            include 'login.php';
        }

        break;

    case 'login':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        //$safepass = password_hash($password, PASSWORD_DEFAULT);

        $userPass = getPassword($username);
    
        $compare = password_verify($password, $userPass['password']);

        if ($compare) {
            $_SESSION['user'] = $userPass;
            $message = '<p style="color: red; text-align: center;">Login successful' . $SESSION['user'] . '.</p>';
            include 'welcome.php';
        } else {
            $message = "Invalid credentials";
            header('Location: login.php');
        }

        break;

    default:
        include 'welcome.php';
}