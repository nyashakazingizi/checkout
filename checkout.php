<?php
session_start();

include('checkoutFunction.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="placeOrder.php" method="POST">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Sarah Smith" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="Sarah@gmail.com" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="50 Paul et Virginie Street" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Port-louis" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="Port-louis" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Payment Methods</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-paypal" style="color:blue;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="Sarah Smith" required>
                            <label for="ccnum">Card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2027" required>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Continue to checkout" class="btn" name="placeOrderBtn">
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <h5>Order Items</h5>
                <hr>
                <?php
                    $items = getCartItems();
                    $totalPrice = 0;
                    foreach($items as citem){
                         
                    ?>
                    <div class="col-md-5">
                        <label> <?= $citem['ProductName'] ?> </label>
                    </div>
                    <div class="col-md-3">
                        <label> <?= $citem['Price'] ?> </label>
                    </div>
                    <div class="col-md-2">
                        <label> <?= $citem['Quantity'] ?> </label>
                    </div>

                <?php
                $totalPrice += $citem['Price'] * $citem['Quantity'];
                }
                ?>
                <h6>Total Price: <span class="float-end"> <? $totalPrice ?> </span></h6>
            </div>
        </div>
    </div>

</body>

</html>