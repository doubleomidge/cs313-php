<?php 

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