<?php
session_start();

$userFirstName = filter_input(INPUT_POST, 'firstname');
$userLastName = filter_input(INPUT_POST, 'lastname');
$userEmail = filter_input(INPUT_POST, 'email');
$userAddress = filter_input(INPUT_POST, 'address');
$userAddress2 = filter_input(INPUT_POST, 'address2');
$userCountry = filter_input(INPUT_POST, 'country');
$userState = filter_input(INPUT_POST, 'state');


$items = array(
    1=>array('itemName'=>'Hula Duck', 'image'=>'img/hula-duck.jpeg', 'price'=>2.50),
    2=>array('itemName'=>'Glow Duck', 'image'=>'img/glow-duck.jpeg', 'price'=>3.00),
    3=>array('itemName'=>'St. Patty Duck', 'image'=>'img/patty-duck.jpeg', 'price'=>2.50),
    4=>array('itemName'=>'Pirate Duck', 'image'=>'img/pirate-duck.jpeg', 'price'=>2.75),
    5=>array('itemName'=>'Sailor Duck', 'image'=>'img/sail-duck.jpeg', 'price'=>2.25),
    6=>array('itemName'=>'Spa Duck', 'image'=>'img/spa-duck.jpeg', 'price'=>2.50),
);

for($i = 0 ; $i < count($_SESSION['cart']); $i++){
    
    $id = $_SESSION['cart'][$i];

    $product = $items[$id];
    
    $name = $product['itemName'];
    $image = $product['image'];
    $number = $product['price'];
    $tot += $number;
    $price = number_format($number, 2, ".",",");
    $total = number_format($tot, 2, ".",",");

    $showProduct .= "<div class='row'>";
    $showProduct .= "<div class='col-md-2'>";
    $showProduct .= "<img src='$image' class='img-list'>";
    $showProduct .= "</div>";
    $showProduct .= "<div class='col-md-6'>";
    $showProduct .= "<h2>$name</h2>";
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
    <title>Thanks for purchasing | Confirmation</title>

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

<body>
    <?php require 'nav.php'; ?>

    <div class="container">
        <h1><?php echo $userFirstName ?> <?php echo $userLastName ?>, Thanks for ordering.</h1>

        <p>We will send a confirmation email to: <?php echo $userEmail ?> .</p>

        <p>The following is being shipped to <?php echo $userAddress ?>, <?php echo $userAddress2 ?>, <?php echo $userState ?>, <?php echo $userCountry ?>.</p>

        <hr class="mb-4">
        <?php echo $showProduct ;?>

    </div>

    <?php require 'footer.php'; ?>
</body>

</html>