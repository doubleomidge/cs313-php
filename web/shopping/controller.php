<?php 

// Create or access a Session
session_start();

// make array of items
$items = array(
    array('itemId'=>1, 'itemName'=>'Hula Duck', 'image'=>'img/hula-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('itemId'=>2, 'itemName'=>'Glow Duck', 'image'=>'img/glow-duck.jpeg', 'price'=>4.50, 'cart'=>False),
    array('itemId'=>3, 'itemName'=>'St. Patty Duck', 'image'=>'img/patty-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('itemId'=>4, 'itemName'=>'Pirate Duck', 'image'=>'img/pirate-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('itemId'=>5, 'itemName'=>'Sailor Duck', 'image'=>'img/sail-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('itemId'=>6, 'itemName'=>'Spa Duck', 'image'=>'img/spa-duck.jpeg', 'price'=>4.25, 'cart'=>False),
);

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
            } else { 
                array_push($_SESSION['cart'], $itemId);
            }
        }


        // post message to page saying item has been added
        include 'home.php';
        break;
    
    default:
        include 'home.php';
}