<?php
    $cookie = 0;
    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $cookie = $_COOKIE['bodycountersUser'];
        header('Location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <script>
        var cookie = <?php echo json_encode($cookie) ?>;
        cookie = JSON.parse(cookie);
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
                <svg class="header__top--icon header__top--icon__account">
                    <use href='../images/sprite.svg#icon-user'></use>
                </svg>
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


    <!--`````````````````````````````````   LOGIN   ``````````````````````````````````````-->

    <div class="login">
        <p class="paragraph--3 login__paragraph login--heading">
            <?php
                if( isset( $_GET['account'] ) ){
                    if( $_GET['account']==='created' ){
                        echo 'ACCOUNT CREATED';
                    }else{
                        echo 'ACCOUNT';
                    }
                }else{
                    echo 'ACCOUNT';
                }
            ?>
        </p>
        <div class="login__invalid" style="visibility: <?php
                if( isset( $_GET['account'] ) ){
                    if( $_GET['account']==='error' ){
                        echo 'visible';
                    }else{
                        echo 'hidden';
                    }
                }else{
                    echo 'hidden';
                }
            ?>;">
            <p class="paragraph--3 login__paragraph login__invalid--credentials">
                Invalid Credentials
            </p>
        </div>
        <form method="POST" action="php/login.php" class="login__form">
            <input name="email" required type="email" id="loginEmail" class="login__paragraph login__textbox login__form--email paragraph--5" placeholder="Your Email">
            <input name="password" required type="password" id="loginPassword" class="login__textbox login__paragraph paragraph--5 login__form--password" placeholder="Your Password">
            <p id="loginForgot" class="login__forgotPassword login__paragraph paragraph--5">
                Forgot your password?
            </p>
            <button id="signInButton" type="submit" class="paragraph--6 login__signIN">SIGN IN</button>
            <a href="create.php" class="login__createAccount login__paragraph paragraph--5">Create account</a>
        </form>
    </div>

    <!--`````````````````````````````````   FORGOT   ``````````````````````````````````````-->

    <div class="forgot">
        <p class="paragraph--3 forgot__paragraph forgot--heading">
            FORGOT PASSWORD
        </p>
        <form id="forgotForm" action="#" onsubmit="return forgotPassword();" class="forgot__form">
            <p class="paragraph--6 forgot__paragraph forgot__error">Invalid Email<br>Create New Account</p>
            <p class="paragraph--6 forgot__password forgot__form--heading">
                Your password will be sent to your registered email.
            </p>
            <input type="email" id="forgotEmail" class="paragraph--5 forgot__paragraph forgot__textbox forgot__form--email" placeholder="Your Mail">
            <button type="submit" id="forgotButton" class="forgot__button paragraph--6 forgot__paragraph">SEND PASSWORD</button>
            <p class="paragraph--6 forgot__paragraph forgot__successful">
                Successfully send the Password<br>
                Wait for 2 Seconds to redirect
            </p>
        </form>
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
    <script src="js/forgotPassword.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>