<?php
session_start();

for($i = 0 ; $i < count($_SESSION['cart']); $i++){
    
    $id = $_SESSION['cart'][$i];

    $product = $items[$id];
    
    $name = $product['itemName'];
    $price = $product['price'];
    $total += $price;
    
    echo $name;

    $showList .= "<li class='list-group-item d-flex justify-content-between'>";
    $showList .= "<p>$name</p>";
    $showList .= "<span>$price</span>";
    $showList .= "</li>";
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ready to buy! | Checkout</title>

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

    <body id="checkout">
        <?php require 'nav.php'; ?>

        <div class="container">
            <h1>Checkout</h1>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <div class="your-cart">
                        <strong>Your Cart</strong>
                        <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['cart']) ?></span>
                    </div>

                    <ul class="list-group mb-3">
                        <?php echo $showList ?>
                        <li class="list-group-item d-flex justify-content-between bg-light ship-free">
                            <p>Free Shipping</p>
                            <span>FREE</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <p>Total</p>
                            <strong><?php echo $total ?></strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <strong>Shipping Address</strong>
                    <form action="address">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2</label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or Suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select id="country" class="form-control">
                                    <option value>Choose ...</option>
                                    <option>United States</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <br>
                                <select id="state" class="form-control">
                                    <option value>Choose ...</option>
                                    <option>California</option>
                                    <option>Idaho</option>
                                    <option>Utah</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip">
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </div>

        <?php require 'footer.php'; ?>

    </body>

    </html>