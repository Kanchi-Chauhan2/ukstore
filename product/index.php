<?php

    use function PHPSTORM_META\type;

    include '../php/db.php';
    include '../php/string_to_array.php';

    $cookie = 0;
    $cookieArray = array();
    
    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $cookie = $_COOKIE['bodycountersUser'];
        $cookieArray = json_decode($cookie,true);
    }
?>

<?php
    $cart = 0;
    if(  sizeof($cookieArray) !== 0 ){
        $id = $cookieArray['id'];
        $query = "SELECT `cart` FROM `users` WHERE id='$id'";
        $query_exec = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array($query_exec) ){
            $cart = $row['cart'];
        }

    }

?>

<?php

    $p = 0;
    $product = array();
    $detail = '';
    $images = '';
    $categoryID = '';
    $similarProducts = array();

    if( $_GET ){
        if( isset($_GET['p']) ){
            $p = $_GET['p'];
            $query = "SELECT `name`, `detail`, `categories`, `images`, `attributes`, `prices`, `sellingPrices`, `stock`, `taxid`, `actives`,`date` FROM `products` WHERE id='$p'";
            $query_exec = mysqli_query( $conn, $query );
            $name = '';
            $categoryName = '';
            $attributesID = '';
            $attributes = array();
            $prices = '';
            $sellingPrices = '';
            $stockes = '';
            $actives = '';
            $date = '';
            $taxID = '';
            $tax = '';
            $isProduct = false;

            while( $row = mysqli_fetch_array( $query_exec ) ){
               
                $name = $row['name'];

                if( strlen($name) > 0 ){
                    $isProduct = true;
                }

                $detail = $row['detail'];
                $categoryID = $row['categories'];
                $images = getArrayFromString( $row['images'],',');
                $attributesID = getArrayFromString( $row['attributes'],',');
                $prices = getArrayFromString( $row['prices'], ',' );
                $sellingPrices = getArrayFromString( $row['sellingPrices'],',' );
                $stockes = getArrayFromString( $row['stock'], ',' );
                $actives = getArrayFromString( $row['actives'] , ',' );
                $date = $row['date'];
                $taxID = $row['taxid'];
                
            }

            $query = "SELECT `name` FROM `categories` WHERE id='$categoryID'";
            $query_exec = mysqli_query( $conn, $query );

            while( $row = mysqli_fetch_array( $query_exec ) ){
                $categoryName = $row['name'];
            }

            $query = "SELECT `name`, `value` FROM `taxes` WHERE id='$taxID'";
            $query_exec = mysqli_query( $conn, $query );
            
            while( $row = mysqli_fetch_array($query_exec) ){
                $tax = array(
                    'name' => $row['name'],
                    'value' => $row['value']
                );
            }

            foreach( $attributesID as $id ){
                $query = "SELECT `id`, `displayName`, `attValues` FROM `attributes` WHERE id='$id'";
                $query_exec = mysqli_query( $conn, $query );

                while( $row = mysqli_fetch_array($query_exec) ){
                    $attributes[] = array(
                        'id' => $row['id'],
                        'name' => $row['displayName'],
                        'attValues' => getArrayFromString($row['attValues'],',')
                    );
                }

            }

            $product = array(
                'name' => $name,
                'detail' => $detail,
                'categoryID' => $categoryID,
                'categoryName' => $categoryName,
                'images' => $images,
                'attributesID' => $attributesID,
                'attributes' => $attributes,
                'prices' => $prices,
                'sellingPrices' => $sellingPrices,
                'stockes' => $stockes,
                'actives' => $actives,
                'date' => $date,
                'taxID' => $taxID,
                'tax' => $tax,
                'isProduct' => $isProduct
            );

        }else{
            echo 'Redirect to Error Page 500';
        }
    }else{
        echo 'Redirect to Error Page 500';
    }

?>

<?php
    
    if( isset($_GET['p']) ){
        
        if( $categoryID === '' ){
            
            echo 'Redirect to Error 500';
        }else{
            $query = "SELECT `products`,`totalProducts` FROM `categories` WHERE id='$categoryID'";
            $query_exec = mysqli_query( $conn, $query );
            $products = array();
            $productShowID = array();
            $totalProducts = 0;
            
            while( $row = mysqli_fetch_array( $query_exec ) ){
                $products = getArrayFromString( $row['products'],',' );
                $totalProducts = $row['totalProducts'];
            }
            
            if( $totalProducts > 4 ){
                for( $i=0 ; $i<4 ; $i++ ){
                    $rand = mt_rand(0,intval($totalProducts-1));
                    if( $rand == '' ){
                        $rand = 0;
                    }
                    $productShowID[] = $products[$rand];
                }
            }else{
                for( $i = 0 ; $i < $totalProducts ; $i++ ){
                    $productShowID[] = $products[$i];
                }
            }
            
            for( $i=0; $i< sizeof($productShowID)  ; $i++ ){
                $query = "SELECT `id`,`name`,`images`, `prices`, `sellingPrices` FROM `products` WHERE id='$productShowID[$i]'";
                $query_exec = mysqli_query( $conn, $query );
                
                while( $row = mysqli_fetch_array($query_exec) ){
                    $similarProducts[] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'prices' => getArrayFromString($row['prices'],','),
                        'sellingPrices' => getArrayFromString($row['sellingPrices'],','),
                        'images' => getArrayFromString( $row['images'],',' )
                    );
                }
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productpage</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <script>
        var productID = <?php echo json_encode($p); ?>;
        var php_product = <?php echo json_encode($product); ?>;
        var php_similarProducts = <?php echo json_encode($similarProducts); ?>;
        var cookie = <?php echo json_encode($cookie); ?>;
        if( cookie != 0 ){
            cookie = JSON.parse(cookie);
        }
        var cart = <?php echo json_encode($cart); ?>;
        if( cart != 0 ){
            cart = JSON.parse(cart);
        }
    </script>

</head>
<body>
    <!--``````````````````````````````````  CART  `````````````````````````````````````-->

    <div class="cart">
        <div class="cart__shadow"></div>
        <div class="cart__container">
            <div class="cart__close"></div>
            <p class="paragraph--3 cart__paragraph cart__container--heading">
                YOUR CART
            </p>
            <div class="cart__products">
                <!--***************************     CART PRODUCT    *******************************-->
                <!-- <div class="cart__product">
                    <p class="paragraph--5 cart__paragraph cart__product--name">PRODUCT NAME</p>
                    <div class="cart__product--grid">
                        <div class="cart__product--imagebox">
                            <img src="images/product-1-a.jpg" alt="" class="cart__product--image cart__product--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="cart__product--image cart__product--image--2">
                        </div>
                        <div class="cart__product--section">
                            <p class="paragraph--6 cart__product--price">
                                $230
                            </p>
                            <div class="cart__product--quantity">
                                <p class="cart__product--quantity__minus paragraph--3 cart__paragraph">-</p>
                                <p class="cart__product--quantity__number paragraph--6 cart__paragraph">1</p>
                                <p class="cart__product--quantity__plus paragraph--3 cart__paragraph">+</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart__product">
                    <p class="paragraph--5 cart__paragraph cart__product--name">PRODUCT NAME</p>
                    <div class="cart__product--grid">
                        <div class="cart__product--imagebox">
                            <img src="images/product-1-a.jpg" alt="" class="cart__product--image cart__product--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="cart__product--image cart__product--image--2">
                        </div>
                        <div class="cart__product--section">
                            <p class="paragraph--6 cart__product--price">
                                $230
                            </p>
                            <div class="cart__product--quantity">
                                <p class="cart__product--quantity__minus paragraph--3 cart__paragraph">-</p>
                                <p class="cart__product--quantity__number paragraph--6 cart__paragraph">1</p>
                                <p class="cart__product--quantity__plus paragraph--3 cart__paragraph">+</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>
            <!--***************************     CART FINAL    *******************************-->
            <div class="cart__final">
                <p class="paragraph--5 cart__final--heading cart__paragraph">
                    TOTAL
                </p>
                <p class="paragraph--5 cart__final--price cart__paragraph">
                    $0
                </p>
                <p class="paragraph--6 cart__paragraph">
                    Shipping & taxes calculated at checkout.
                </p>
                <a href="#" class="paragraph--6 cart__paragraph cart__final--checkout">CHECKOUT</a>
            </div>
        </div>
    </div>
    
    <!--``````````````````````````````````  HEADER  `````````````````````````````````````-->

    <header class="header">

        <!--################################    TOP    ####################################-->

        <div class="header__top">
            <svg class="header__top--cart">
                <use href='../images/sprite.svg#icon-shopping-cart'></use>
            </svg>
            <div class="header__top--logo">
                <a href="../index.php" class="header__top--logo__link">
                    <img src="../images/logo.png" alt="" class="header__top--logo__image">
                </a>
            </div>
            <div class="header__top--iconbox">
                <svg class="header__top--icon header__top--icon__search">
                    <use href='../images/sprite.svg#icon-search'></use>
                </svg>
                <a href="../account/login.php">
                    <svg class="header__top--icon header__top--icon__account">
                        <use href='../images/sprite.svg#icon-user'></use>
                    </svg>
                </a>
                <svg class="header__top--icon header__top--icon__logout" style="display: 
                <?php
                    if( isset( $_COOKIE['bodycountersUser'] ) ){
                        echo 'block';
                    }else{
                        echo 'none';
                    }
                ?>;" ><use href='../images/sprite.svg#icon-login'></use></svg>
            </div>
        </div>

        <!--################################    MENU    ####################################-->

        <div class="header__menu">
            <ul class="header__menu--list">
                <li class="header__menu--item paragraph--6">
                    <a href="../index.php" class="header__menu--link">HOME</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="#" class="header__menu--link">SHOP<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="#" class="header__menu--link">BLOG</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="#" class="header__menu--link">ABOUT</a>
                </li>
            </ul>

            <a href="#" class="header__menu--cart header__menu--link paragraph--6">CART</a>

        </div>

    </header>

    <!--``````````````````````````````````  PRODUCTpage  `````````````````````````````````````-->

    <div class="productpage">
        <div class="productpage__top">
            <p class="productpage__top--slugs">
                <a href="#" class="productpage__top--slugs__link paragraph--6 productpage__paragraph" id="productHomeLink">Home</a>
                <span class="productpage__top--slugs__slash paragraph--6 productpage__paragraph">/</span>
                <a href="#" class="paragraph--6 productpage__top--slugs__link productpage__paragraph" id="productCategoryLink">Category</a>
                <span class="productpage__top--slugs__slash paragraph--6 productpage__paragraph">/</span>
                <span class="paragraph--6 productpage__top--slugs__productpage productpage__paragraph" id="productNameHeader">Productpage Name</span>
            </p>
        </div>

        <div class="productpage__container">

            <!--+++++++++++++++++++++++++++++++++++++++     LEFT    +++++++++++++++++++++++++++++++++-->

            <div class="productpage__container--left">
                <p class="paragraph--3 productpage__paragraph productpage__name" id="productName"><!--NEW AGE MIRACLE--></p>
                <p class="paragraph--5 productpage__paragraph productpage__price" id="productPrice"><!--$120.00 --> <span class="productpage__price--delimeter paragraph--6" id="productPriceDelimeter"><!--$138.00--></span> </p>
                
                <!--*************************   ATTRIBUTE   ********************************-->

                <div class="productpage__attributeContainer" id="productAttributesContainer">
                    
                    <!-- <div class="productpage__attribute">
                        <p class="paragraph--5 productpage__paragraph productpage__attribute--title">WEIGHT</p>
                        <select class="productpage__select productpage__attribute--select">
                            <option value="100gm"> 100gm </option>
                            <option value="150gm"> 150gm </option>
                        </select>
                    </div> -->

                </div>

                <!--*************************   QUANTITY   ********************************-->

                <div class="productpage__quantityBox">
                    <div class="productpage__quantity">
                        <p class="paragraph--6 productpage__paragraph productpage__quantity--number" id="productQuantity">1</p>
                        <div class="productpage__quantity--changeBox">
                            <svg class="productpage__quantity--add" id="productQuantityAdd">
                                <use href='../images/sprite.svg#icon-chevron-small-up'></use>
                            </svg>
                            <svg class="productpage__quantity--sub" id="productQuantitySub">
                                <use href='../images/sprite.svg#icon-chevron-small-down'></use>
                            </svg>
                        </div>
                    </div>
                    <button class="productpage__button productpage__addToCart productpage__paragraph" id="productAddToCart">ADD TO CART</button>
                </div>

                <!--*************************   IMAGES   ********************************-->

                <div class="productpage__images" id="productImagesContainer">
                    <!-- <img src="../images/product-1-a.jpg" alt="" class="productpage__images--image">
                    <img src="../images/product-1-b.jpg" alt="" class="productpage__images--image"> -->
                </div>

            </div>
            <!--+++++++++++++++++++++++++++++++++++++++     CENTER    +++++++++++++++++++++++++++++++++-->
            <div class="productpage__container--center">
                <img src="<?php if(isset($_GET['p'])){echo $images[0];}else{echo '#';} ?>" alt="" class="productpage__coverImage">
            </div>
            <!--+++++++++++++++++++++++++++++++++++++++     RIGHT    +++++++++++++++++++++++++++++++++-->
            <div class="productpage__container--right">
                <p class="productpage__description paragraph--5 productpage__paragraph">
                    <?php 
                        if( $detail === '' ){
                            echo '<p>Error while Fetchnig Product Details</p>';
                        }else{
                            echo $detail;
                        }
                     ?>
                    <!-- New Age Nail Polish gives your nails a shimmery finish and a high color payoff. These nail wardrobe that is specially curated for the special day. This collection is sure to make sure your Nails look gorgeous. So you can easily grab the attention with these sexy nail shade.Nail Concern: All. Nail Type: All. Specialty: Mineral Oil Free. Finish: Shimmery Finish. Benefits: Single Stroke Application
                     -->
                </p>
            </div>
        </div>

    </div>

    <!--``````````````````````````````````  RELATED PRODUCTS  `````````````````````````````````````-->

    <div class="related">

        <p class="paragraph--5 product__paragraph related--heading">YOU MAY ALSO LIKE</p>

        <div class="related__container">
            <!-- <div class="product">
                <a href="#" class="product__imagelink">
                    <p class="paragraph--6 product__sale">SALE</p>
                    <img src="../images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                    <img src="../images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                </a>
                <p class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </p>
                <p class="product__price paragraph--6">
                    $300 <span class="product__price--delete">$360</span>
                </p>
            </div>
            <div class="product">
                <a href="#" class="product__imagelink">
                    <p class="paragraph--6 product__sale">SALE</p>
                    <img src="../images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                    <img src="../images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                </a>
                <p class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </p>
                <p class="product__price paragraph--6">
                    $300 <span class="product__price--delete">$360</span>
                </p>
            </div>
            <div class="product">
                <a href="#" class="product__imagelink">
                    <p class="paragraph--6 product__sale">SALE</p>
                    <img src="../images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                    <img src="../images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                </a>
                <p class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </p>
                <p class="product__price paragraph--6">
                    $300 <span class="product__price--delete">$360</span>
                </p>
            </div>
            <div class="product">
                <a href="#" class="product__imagelink">
                    <p class="paragraph--6 product__sale">SALE</p>
                    <img src="../images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                    <img src="../images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                </a>
                <p class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </p>
                <p class="product__price paragraph--6">
                    $300 <span class="product__price--delete">$360</span>
                </p>
            </div> -->

        </div>
    </div>

    <!--``````````````````````````````````  FOOTER  `````````````````````````````````````-->

    <footer class="footer">
        <div class="footer__store">
            <p class="paragraph--5 footer__paragraph footer__store--heading">
                STORE
            </p>
            <p class="paragraph--5 footer__paragraph footer__store--copyrights">
                Copyright © 2020, Brand2Buisnesses<br>
                Powered by Adhyay
            </p>
            <div class="footer__store--payments">
                <div class="footer__store--payments__logo footer__store--payments__logo--1"></div>
                <div class="footer__store--payments__logo footer__store--payments__logo--2"></div>
                <div class="footer__store--payments__logo footer__store--payments__logo--3"></div>
                <div class="footer__store--payments__logo footer__store--payments__logo--4"></div>
                <div class="footer__store--payments__logo footer__store--payments__logo--5"></div>
            </div>
        </div>
        <div class="footer__info">
            <p class="paragraph--5 footer__paragraph footer__info--heading">
                INFO
            </p>
            <a href="#" class="footer__info--link paragraph--5">Contact</a>
            <a href="#" class="footer__info--link paragraph--5">Shipping and Returns</a>
            <a href="#" class="footer__info--link paragraph--5">Search</a>
        </div>
        <div class="footer__subscribe">
            <p class="paragraph--5 footer__paragraph footer__subscribe--heading">
                SUBSCRIBE
            </p>
            <div class="footer__subscribe--socialBox">
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='../images/sprite.svg#icon-facebook'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='../images/sprite.svg#icon-instagram'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='../images/sprite.svg#icon-twitter'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='../images/sprite.svg#icon-pinterest'></use>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    
    <script src="js/globalVariables.js"></script>
    <script  src="js/productVariables.js"></script>
    <script src="../js/cart.js"></script>
    <script src="js/productPageSettelment.js"></script>
    <script src="js/addToCart.js"></script>


</body>
</html>