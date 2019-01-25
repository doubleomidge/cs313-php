<?php 

// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

function showProducts(){
    for($i = 0 ; $i < count($_SESSION['cart']); $i++){
    
    $id = $_SESSION['cart'][$i];

    $product = $items[$id];
    
    $name = $product['itemName'];
    $image = $product['image'];
    $price = $product['price'];
    $total += $price;

    $showProduct .= "<div class='row'>";
    $showProduct .= "<div class='col-md-8'>";
    $showProduct .= "<h2>$name</h2>";
    $showProduct .= "<div class='updates'>";
    $showProduct .= "<a href='index.php?action=delete&itemId=$i' class='btn btn-danger'>Delete</a>";
    $showProduct .= "</div>";
    $showProduct .= "</div>";
    $showProduct .= "<div class='col-md-4'>";
    $showProduct .= "<h3>$$price</h3>";
    $showProduct .= "</div>";
    $showProduct .= "</div>";
    $showProduct .= "<hr class='mb-4'>";
}

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

        case 'view':
        
            showProducts();
            include 'viewcart.php';
        break;

    case 'delete':
        $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);

        array_splice($_SESSION['cart'], $itemId, 1);

        include 'viewcart.php';
        break;

    case 'checkout';

        include 'checkout.php';
        break;
    
    default:
        include 'home.php';
}