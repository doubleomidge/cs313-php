<?php 

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'addToCart':
        $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);

        if($itemId != "") {
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array($itemId);
                print_r($_SESSION['cart']);
            } else { 
                array_push($_SESSION['cart'], $itemId);                              
            }
        }

        include 'home.php';
        break;

    case 'delete':
        $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);

        unset($_SESSION['cart'][$itemId]);

        include 'viewcart.php';
        break;
    
    default:
        include 'home.php';
}