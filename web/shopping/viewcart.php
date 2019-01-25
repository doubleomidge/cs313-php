<?php
session_start();

// make array of items
$items = array(
    1=>array('itemName'=>'Hula Duck', 'image'=>'img/hula-duck.jpeg', 'price'=>4.25),
    2=>array('itemName'=>'Glow Duck', 'image'=>'img/glow-duck.jpeg', 'price'=>4.50),
    3=>array('itemName'=>'St. Patty Duck', 'image'=>'img/patty-duck.jpeg', 'price'=>4.25),
    4=>array('itemName'=>'Pirate Duck', 'image'=>'img/pirate-duck.jpeg', 'price'=>4.25),
    5=>array('itemName'=>'Sailor Duck', 'image'=>'img/sail-duck.jpeg', 'price'=>4.25),
    6=>array('itemName'=>'Spa Duck', 'image'=>'img/spa-duck.jpeg', 'price'=>4.25,),
);

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

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>What have we got here | View Cart</title>

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous">

        <!-- my compiled css -->
        <link rel="stylesheet" href="main.css">
    </head>

    <body id="view">
        <?php require 'nav.php'; ?>

        <div class="container">
            <h1>Your cart</h1>
            <hr class="mb-4">
                <?php echo $showProduct ;?>

            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <h3>Total <?php echo count($_SESSION['cart']) ?></h3>
                    <p class="justify"><?php echo $total; ?></p>
                    <a href="index.php?action=checkout" class="btn btn-success btnCheckout">To Checkout</a>
                </div>
            </div>

            <?php print_r($_SESSION['cart']); ?>
        </div>

    </body>

    </html>