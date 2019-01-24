<?php 

// Create or access a Session
session_start();

// make array of items
$items = array(
    array('id'=>1, 'itemName'=>'Hula Duck', 'image'=>'img/hula-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>2, 'itemName'=>'Glow Duck', 'image'=>'img/glow-duck.jpeg', 'price'=>4.50, 'cart'=>False),
    array('id'=>3, 'itemName'=>'St. Patty Duck', 'image'=>'img/patty-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>4, 'itemName'=>'Pirate Duck', 'image'=>'img/pirate-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>5, 'itemName'=>'Sailor Duck', 'image'=>'img/sail-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>6, 'itemName'=>'Spa Duck', 'image'=>'img/spa-duck.jpeg', 'price'=>4.25, 'cart'=>False),
);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'addToCart':
        $itemName = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_STRING);


        // post message to page saying item has been added
        include 'home.php';
        break;
    
    default:
        include 'home.php';
}