<?php 

// Create or access a Session
session_start();

// make array of items
$items = array(
    array('id'=>1, 'name'=>'Hula Duck', 'image'=>'img/hula-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>2, 'name'=>'Glow Duck', 'image'=>'img/glow-duck.jpeg', 'price'=>4.50, 'cart'=>False),
    array('id'=>3, 'name'=>'St. Patty Duck', 'image'=>'img/patty-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>4, 'name'=>'Pirate Duck', 'image'=>'img/pirate-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>5, 'name'=>'Sailor Duck', 'image'=>'img/sail-duck.jpeg', 'price'=>4.25, 'cart'=>False),
    array('id'=>6, 'name'=>'Snorkle Duck', 'image'=>'img/swim-duck.jpeg', 'price'=>4.25, 'cart'=>False),
);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'addToCart':
        $itemId = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_STRING);

        // post message to page saying item has been added
        include 'home.php';
        break;
    
    default:
        include 'home.php';
}