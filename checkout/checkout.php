<?php
    include '../php/db.php';
?>

<?php
    $cookie = 0;
    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $cookie = json_decode($_COOKIE['bodycountersUser']);
    }else{
        header('Location: ../index.php');
    }
?>

<?php
    $cart = '';
    $userID = $cookie->id;
    $products = array();
    $query = "SELECT `cart` FROM `users` where id='$userID'";
    $query_exec = mysqli_query($conn,$query);
    $p = '';

    while( $row = mysqli_fetch_array($query_exec) ){
        $products = json_decode( $row['cart'],true );
        $p = $row['cart'];
    }

    if( $p == '' ){
        header('Location: ../index.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <script>
        var cookie = <?php echo json_encode($cookie) ?>;
        var products = <?php echo json_encode($products) ?>;
    </script>

</head>
<body>
    
    <div class="order">
        <div class="order__left">
            <img src="../images/logo.png" alt="" class="order__logo">
            <form id="orderForm" action="#" class="order__form">
                <p class="paragraph--4 order__heading">Contact Information</p>
                <div class="order__inputbox">
                    <input type="number" class="order__text paragraph--6 order__number" id="phone" placeholder="Enter Phone Number">
                    <p class="order__inputlabel">Enter Phone Number</p>
                </div>
                
                <p class="paragraph--4 order__heading">Shipping Address</p>
                <div class="order__inputbox">
                    <input type="text" id="name" class="order__text paragraph--6 order__name" placeholder="Enter Name">
                    <p class="order__inputlabel">Enter Name</p>
                </div>
                <div class="order__inputbox">
                    <input type="text" id="address" class="paragraph--6 order__text order__address" placeholder="Address">
                    <p class="order__inputlabel">Address</p>
                </div>
                <div class="order__inputbox">
                    <input type="text" id="landmark" class="order__text paragraph--6 order__landmark" placeholder="Landmark(Optional)">
                    <p class="order__inputlabel">Landmark(Optional)</p>
                </div>
                <div class="order__inputbox">
                    <input type="text" id="city" class="order__text paragraph--6 order__city" placeholder="City">
                    <p class="order__inputlabel">City</p>
                </div>

                <div class="order__selectbox">
                    <div class="order__selection">
                        <label for="country" class="order__label order__label--country">Select Country</label>
                        <select id="country" class="order__select">
                            
                        </select>
                    </div>
                    <div class="order__selection">
                        <label for="state" class="order__label order__label--state">Select State</label>
                        <select id="state" class="order__select">
                            
                        </select>
                    </div>
                    <div class="order__inputbox">
                        <input type="text" id="pin" class="order__text paragraph--6 order__pin" placeholder="Pincode">
                        <p class="order__inputlabel">Pincode</p>
                    </div>
                    
                </div>

                <div class="order__buttonbox">
                    <a href="index.php" class="order__link paragraph--6 order__return">< Return to Cart</a>
                    <div class="paragraph--6" id="payment-button"></div>
                    <!-- <button type="submit" class="order__submit paragraph--6" id="submit">Continue to Payment</button> -->
                </div>
                
            </form>
            
        </div>
        <div class="order__right">
            <div class="order__products">
                <!-- <div class="order__product">
                    <div class="order__imagebox">
                        <img src="../images/23.jpg" alt="" class="order__image">
                        <p class="paragraph--6 order__quantity order__paragraph">1</p>
                    </div>
                    <div class="order__productDetails">
                        <div class="order__productDetails--left">
                            <p class="paragraph--6 order__paragraph order__product--name">Masa Lotion</p>
                            <p class="paragraph--6 order__details">100 gm / Coconut / Moisturizing</p>
                        </div>
                        <div class="order__productDetails--right">
                            <p class="paragraph--6 order__product--price order__paragraph">$0</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="order__calculation">
                <p class="order__details paragraph--6 order__calculate">Subtotal: <span id="subtotal">$0</span></p>
                <p class="order__details paragraph--6 order__calculate">Shipping: <span id="shipping">Undefined</span></p>
            </div>
            <p class="order__details paragraph--3 order__calculate">Total: <span id="total">$0</span></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/globalVariables.js"></script>
    <script src="js/products.js"></script>
    <script src="js/shipping.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=ARP6TSrzD_0PmTQeIFv_KcjvK9pf9fsqMl_BIPHA36sSK1JWPgxwNgY1WFbK4ftb0fb-ubgSUNJclpql" data-sdk-integration-source="button-factory"></script>
    <script src="js/pay_me.js"></script>
    <script src="js/checkingInputs.js"></script>
    <script src="js/order.js"></script>

</body>


</html>


