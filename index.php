<?php
    $cookie = 0;
    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $cookie = $_COOKIE['bodycountersUser'];
    }
?>


<?php
    include 'php/db.php';
    include 'php/string_to_array.php';

    $newProducts = array();
    $blockbusterProducts = array();

    $query = "SELECT `id`, `name`,`images`,`prices`, `sellingPrices` FROM `products`  ORDER BY `products`.`id` DESC LIMIT 8";
    $query_exec = mysqli_query( $conn, $query );
    
    while( $row = mysqli_fetch_array($query_exec) ){
        $newProducts[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'images' => getArrayFromString( $row['images'],',' ),
            'prices' => getArrayFromString( $row['prices'],',' ),
            'sellingPrices' => getArrayFromString(  $row['sellingPrices'] , ',' )
        );
    }

    $query = "SELECT `id`, `name`,`images`,`prices`, `sellingPrices` FROM `products` LIMIT 8";
    $query_exec = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_array($query_exec) ){
        $blockbusterProducts[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'images' => getArrayFromString( $row['images'],',' ),
            'prices' => getArrayFromString( $row['prices'],',' ),
            'sellingPrices' => getArrayFromString(  $row['sellingPrices'] , ',' )
        );
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <script>
        var newProducts = <?php echo json_encode($newProducts) ?>;
        var blockbusterProducts = <?php echo json_encode($blockbusterProducts) ?>;
        var cookie = <?php echo json_encode($cookie) ?>;
        cookie = JSON.parse(cookie);
    </script>


</head>
<body>
     <!--````````````````````````````````POP UP`````````````````````````````````````````-->

     <div class="pop-up-container">
        <div class="pop-up-window">
            <div class="flex-container">
                <div  class="flex">
                <img src="images/popup-image.jpg" alt="" class="popup__image">
                </div>
                <div  class="flex">
                    <div class="flex1-container">
                    <h1 class="heading-1">JOIN THE WILD PALM FAN CLUB</h1>
                    <input type="email" class="ContactFormEmailpopup" name="contact[email]" placeholder="Email" value>
                    <div class="subscribeup">
                    <a href="#" style="color:white;">SUBSCRIBE</a>
                    </div>
                    <div class="socialBox">
                <a href="#" class="subscribe__link">
                    <svg class="subscribe__icon">
                        <use href='images/sprite.svg#icon-facebook'></use>
                    </svg>
                </a>
                <a href="#" class="subscribe__link">
                    <svg class="subscribe__icon">
                        <use href='images/sprite.svg#icon-instagram'></use>
                    </svg>
                </a>
                <a href="#" class="subscribe__link">
                    <svg class="subscribe__icon">
                        <use href='images/sprite.svg#icon-twitter'></use>
                    </svg>
                </a>
                <a href="#" class="subscribe__link">
                    <svg class="subscribe__icon">
                        <use href='images/sprite.svg#icon-pinterest'></use>
                    </svg>
                </a>
            </div>
                    </div>
                    <div class="closee">&times;</div>
                    
                </div>
                
            </div>
            
        </div>
    </div>



    <!--``````````````````````````````````  CART  `````````````````````````````````````-->

    <div class="cart">
        <div class="cart__shadow"></div>
        <div class="cart__container">
            <div class="cart__close">&times;</div>
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
    <div class="header__mobilemenu">
        <div class="header__mobilemenu--line1"></div>
        <div class="header__mobilemenu--line2"></div>
        <div class="header__mobilemenu--line3"></div>
        </div>
        <!--################################    TOP    ####################################-->

        <div class="header__top">
            <svg class="header__top--cart">
                <use href='images/sprite.svg#icon-shopping-cart'></use>
            </svg>
            <div class="header__top--logo">
                <a href="#" class="header__top--logo__link">
                    <img src="images/logo.png" alt="" class="header__top--logo__image">
                </a>
            </div>
            <div class="header__top--iconbox">
                <svg class="header__top--icon header__top--icon__search">
                    <use href='images/sprite.svg#icon-search'></use>
                </svg>
                <a href="account/login.php">
                    <svg class="header__top--icon header__top--icon__account">
                        <use href='images/sprite.svg#icon-user'></use>
                    </svg>
                </a>
                <a href="php/logout.php">
                    <svg class="header__top--icon header__top--icon__logout" style="display: 
                    <?php
                        if( isset( $_COOKIE['bodycountersUser'] ) ){
                            echo 'block';
                        }else{
                            echo 'none';
                        }
                    ?>;" ><use href='images/sprite.svg#icon-login'></use></svg>
                </a>
            </div>
        </div>
        <!--################################    MENU    ####################################-->

        <div class="header__menu">
            <ul class="header__menu--list">
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="dropdown()" onmouseleave="removedropdown()">
                    <a href="#" class="header__menu--link">CATEGORY<svg class="header__menu--dropdown"> <use href='images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6"  onmouseover="shopdropdown()" onmouseleave="removeshopdropdown()">
                    <a href="#" class="header__menu--link">SHOP<svg class="header__menu--dropdown"> <use href='images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="productsdropdown()" onmouseleave="removeproductsdropdown()">
                    <a href="#" class="header__menu--link">PRODUCTS<svg class="header__menu--dropdown"> <use href='images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="categories/?c=22" class="header__menu--link">DISCOUNT SET</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="#" class="header__menu--link">Before/After Photos</a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="tvdropdown()" onmouseleave="removetvdropdown()">
                    <a href="#" class="header__menu--link">TV/AD<svg class="header__menu--dropdown"> <use href='images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="linksdropdown()" onmouseleave="removelinksdropdown()" >
                    <a href="#" class="header__menu--link">LINKS<svg class="header__menu--dropdown"> <use href='images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="Blogs/AboutUs.php" class="header__menu--link">ABOUT US</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="Blogs/ContactUs.php" class="header__menu--link">CONTACT</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="Blogs/Testimonial.php" class="header__menu--link">TESTIMONIAL</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="Blogs/blogpage.php" class="header__menu--link">BLOG</a>
                </li>
            </ul>
            <a href="#" class="header__menu--cart header__menu--link paragraph--6">CART</a>
        </div>
    </header>

                        
    <!-- `````````````````````````````````  DROPDOWN    ````````````````````````````````````  -->
    <div class="dropdown">
        <div class="dropdown__column">
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=22">UPTO 60% OFF</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=21">ALL PRODUCTS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=22">DISCOUNT SET</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=1">BRIGHTENING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=2">FACIAL CLEANSERS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=3">TEN YEARS YOUNGER</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="categories/?c=4">EYE AND NECK CREAMS</a></li>
            
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="categories/?c=5">NOURISHING AND TREATMENT</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=6">ACNE AND BLEMISHES</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=7">MASQUES</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=8">SHAVING BUMP S MEN/WOMEN</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=9">DARK KNUCKLES,HANDS & FEET</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=10">MINERAL MAKEUP</a></li>
                <li class="dropdown__column--listItem"><a href="#">STRETCH MARKS</a></li>
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="categories/?c=11">SUN BLOCK</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=12">BLEACHING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=13">PEELS</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=14">SOAP</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=15">SERUM</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=16">WASH</a></li>
                <li class="dropdown__column--listItem"><a href="categories/?c=17">SCRUB</a></li>
               
            </ul>
                    </div>
        </div>
    <div class="shop-dropdown">
        <div class="shop-dropdown__column">
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=10"><img class="shop-dropdown__column--imgbox" src="images/shop11.png" alt="Ten years Younger Skin">Ten years younger skin rejuvenator</a></li>
            </ul>
        
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=2"><img class="shop-dropdown__column--imgbox" src="images/shop12.png" alt="BC Active Lightening Lotion">BC Active Lightening System</a></li>
            </ul>
       
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=11"><img class="shop-dropdown__column--imgbox" src="images/shop13.png" alt="BC Extra Strength Lightening Wash">BC Extra Strength Lightening Wash</a></li>
            </ul>
        </div>
    </div>
    <div class="products-dropdown">
        <div class="products-dropdown__column">
            <ul class="products-dropdown__column--list">
            <li class="products-dropdown__column--listItem"><a href="categories/?c=22">Discount Set</a></li>
            <li class="products-dropdown__column--listItem"><a href="categories/?c=1">Brightening and lightening</a></li>
            <li class="products-dropdown__column--listItem"><a href="categories/?c=3">Ten Years Younger</a></li>
            <li class="products-dropdown__column--listItem"><a href="categories/?c=6">Acne and Blemishes</a></li>
            <li class="products-dropdown__column--listItem"><a href="categories/?c=9">Dark Knuckles, hands & Feet</a></li>
            </ul>
        </div>
    </div>
    <div class="tv-dropdown">
        <div class="tv-dropdown__column">
        <iframe style="width:50%; height:100%; margin-bottom:2rem;" src="https://www.youtube.com/embed/6EsDhpe6suQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <ul class="tv-dropdown__column--list">
            <li class="tv-dropdown__column--listItem"><a href="https://youtu.be/6EsDhpe6suQ">Body Contours Advance Skin & Hair Care made of 100% Natural Organic Herbal Extracts</a></li>
            </ul>
        </div>
    </div>
    <div class="links-dropdown">
        <div class="links-dropdown__column">
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="Blogs/UnderAttack.php">MEN SKIN UNDER ATTACK</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/ScienceTech.php">SKIN SCIENCE TECHNOLOGY</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/SkinLight.php">SKIN LIGHTENING PRODUCTS</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/PerfectProduct.php">FIND THE PERFECT PRODUCT FOR YOU</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/8pointlift.php">8POINT LIFT</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/HairRemoval.php">LASER HAIR REMOVAL</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/WrinkleRed.php">WRINKLE REDUCTION</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/WeightTreat.php">WEIGHT LOSS TREATMENT</a></li>
            <li class="links-dropdown__column--listItem"><a href="Blogs/Bc.php">WHAT BC CAN DO FOR YOU</a></li>
            </ul>
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="#"><img class="links-dropdown__column--imgbox" src="images/links1.png" alt="Lightening Serum"></a></li>
            </ul>
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="#"><img class="links-dropdown__column--imgbox" src="images/link2.png" alt="Gold Face Softer Serum"></a></li>
            </ul>
        </div>
    </div>
    <script>
        
        const navSlide=()=>{  
        const burger=document.querySelector('.header__mobilemenu >div');
        const menu=document.querySelector('.header__menu');
        const menulinks=document.querySelectorAll('.header__menu--list li');
        burger.addEventListener('click',()=>{
            menu.classList.toggle('header__menu--active');

            menulinks.forEach((link,index)=>{
                if(link.style.animation){
                    link.style.animation='';
                    console.log('no animation');
                } else{
                    link.style.animation=`navLinkFade 0.2s ease forwards ${index/7+1}s`;
                    console.log('animation');
                }
        });
        });
        
        }
        navSlide();
     function dropdown(){
            let dropdown = document.querySelector('.dropdown');
            dropdown.classList.add('select');
            dropdown.style.height = (dropdown.scrollHeight)+'px';


            function hover(){
                dropdown.classList.add('select');
                dropdown.style.height = (dropdown.scrollHeight)+'px';
            }

            function hoverout(){
                removedropdown();
                dropdown.removeEventListener('mouseover',hover);
                dropdown.removeEventListener('mouseleave',hoverout);
            }

            dropdown.addEventListener('mouseover',hover);
            dropdown.addEventListener('mouseleave',hoverout);
        }
        function removedropdown(){
            let dropdown = document.querySelector('.dropdown');
            dropdown.classList.remove('select');
            dropdown.style.height ='0px';
        }
        function shopdropdown(){
            let dropdown = document.querySelector('.shop-dropdown');
            dropdown.classList.add('select');
            dropdown.style.height = (dropdown.scrollHeight)+'px';

            function hover(){
                dropdown.classList.add('select');
                dropdown.style.height = dropdown.scrollHeight+'px';
            }

            function hoverout(){
                removeshopdropdown();
                dropdown.removeEventListener('mouseover',hover);
                dropdown.removeEventListener('mouseleave',hoverout);
            }

            dropdown.addEventListener('mouseover',hover);
            dropdown.addEventListener('mouseleave',hoverout);
        }
        function removeshopdropdown(){
            let dropdown = document.querySelector('.shop-dropdown');
            dropdown.classList.remove('select');
            dropdown.style.height ='0px';
        }
        function productsdropdown(){
            let dropdown = document.querySelector('.products-dropdown');
            dropdown.classList.add('select');
            dropdown.style.height = (dropdown.scrollHeight)+'px';

            function hover(){
                dropdown.classList.add('select');
                dropdown.style.height = dropdown.scrollHeight+'px';
            }

            function hoverout(){
                removeproductsdropdown();
                dropdown.removeEventListener('mouseover',hover);
                dropdown.removeEventListener('mouseleave',hoverout);
            }

            dropdown.addEventListener('mouseover',hover);
            dropdown.addEventListener('mouseleave',hoverout);
        }
        function removeproductsdropdown(){
            let dropdown = document.querySelector('.products-dropdown');
            dropdown.classList.remove('select');
            dropdown.style.height ='0px';
        }
        function linksdropdown(){
            let dropdown = document.querySelector('.links-dropdown');
            dropdown.classList.add('select');
            dropdown.style.height = (dropdown.scrollHeight)+'px';

            function hover(){
                dropdown.classList.add('select');
                dropdown.style.height = dropdown.scrollHeight+'px';
            }

            function hoverout(){
                removelinksdropdown();
                dropdown.removeEventListener('mouseover',hover);
                dropdown.removeEventListener('mouseleave',hoverout);
            }

            dropdown.addEventListener('mouseover',hover);
            dropdown.addEventListener('mouseleave',hoverout);
        }
        function removelinksdropdown(){
            let dropdown = document.querySelector('.links-dropdown');
            dropdown.classList.remove('select');
            dropdown.style.height ='0px';
        }
        function tvdropdown(){
            let dropdown = document.querySelector('.tv-dropdown');
            dropdown.classList.add('select');
            dropdown.style.height = (dropdown.scrollHeight)+'px';

            function hover(){
                dropdown.classList.add('select');
                dropdown.style.height = dropdown.scrollHeight+'px';
            }

            function hoverout(){
                removetvdropdown();
                dropdown.removeEventListener('mouseover',hover);
                dropdown.removeEventListener('mouseleave',hoverout);
            }

            dropdown.addEventListener('mouseover',hover);
            dropdown.addEventListener('mouseleave',hoverout);
        }
        function removetvdropdown(){
            let dropdown = document.querySelector('.tv-dropdown');
            dropdown.classList.remove('select');
            dropdown.style.height ='0px';
        }
        const closebutton=document.querySelector(".closee");
        const loginpopup=document.querySelector(".pop-up-container");
        const loginpopupwindow=document.querySelector(".pop-up-window");
        window.addEventListener("load",function(){
            showPopup();
        })
        function showPopup(){
            const timeLimit=3
            let i=0;
            const timer=setInterval(function(){
                i++;
                if(i==timeLimit){
                    clearInterval(timer);
                    loginpopup.classList.add("show");
                    loginpopupwindow.classList.add("show");
                }
            },1000);
        }
        closebutton.addEventListener("click",function(){
            loginpopup.classList.remove("show");
        })

    </script>
    <!--``````````````````````````````````  SLIDESHOW  `````````````````````````````````````-->

    <div class="slideshow">

        <div class="slideshow__container">

            <!--##########################  SLIDE 1 ########################-->

            <div class="slide slide--1">

                <div class="slide__content slide__content--1">
                    <h5 class="heading--5 slide__heading slide__content--heading">
                        Gentle For Winter                   
                    </h5>
                    <h4 class="heading--4 slide__detail slide__content--detail">
                        SKIN LIGHTENING
                    </h4>
                    <p class="paragraph--5 slide__paragraph slide__content--paragraph">                        
                        Deal with hyperpigmentation, Beaux skin lightening products are formulated to even out skin tone and restore the skin’s natural color get even, clear and radiant skin.
                    </p>
                    <a href="#" class="paragraph--5 slide__paragraph slide__content--link">
                        View More
                    </a>
                </div>

            </div>

            <!--##########################  SLIDE 2 ########################-->

            <div class="slide slide--2">

                <div class="slide__content slide__content--2">
                    <h5 class="heading--5 slide__heading slide__content--heading">
                        Look Gorgeous                   
                    </h5>
                    <h4 class="heading--4 slide__detail slide__content--detail">
                        Natural Glow
                    </h4>
                    <p class="paragraph--5 slide__paragraph slide__content--paragraph">                        
                        Beaux products protect, moisturize, and lubricate your skin. It smartly nourish your skin with lotions, day creams, night creams, tinted moisturizers, and more.
                    </p>
                    <a href="#" class="paragraph--5 slide__paragraph slide__content--link">
                        View More
                    </a>
                </div>

            </div>

            <div class="slide__select">
                <div class="slide__select--dot"></div>
                <div class="slide__select--dot"></div>
            </div>

        </div>

    </div>

    <!--``````````````````````````````````  DEAL  `````````````````````````````````````-->

    <div class="deal">
        <p class="paragraph--3 deal__heading">BEAUTY DEAL</p>
        <p class="paragraph--5 deal__paragraph">
            Pick your beauty products today. 50% OFF on the most popular cosmetic brands.<br>
            Order all classy products today!
        </p>
    </div>

    <!--``````````````````````````````````  COLLECTIONS  `````````````````````````````````````-->

    <div class="collections">
        <div class="collections__top">
            <h1 class="heading--1 collections__heading collections__top--heading">
                beauty forever
            </h1>
            <p class="paragraph--3 collections__paragraph collections__top--paragraph">
                SPECIAL COLLECTIONS
            </p>
        </div>

        <div class="collections__grid">

            <a href="#" class="collections__grid--item">
                <img src="images/1.1.png" alt="" class="collections__grid--image">
                <div class="collections__grid--hover">
                    <p class="paragraph--5 collections__grid--title collections__paragraph">
                        NEW IN
                    </p>
                    <p class="paragraph--6 collections__grid--link collections__paragraph">
                        VIEW MORE
                    </p>
                </div>
            </a>

            <a href="#" class="collections__grid--item">
                <img src="images/1.2.png" alt="" class="collections__grid--image">
                <div class="collections__grid--hover">
                    <p class="paragraph--5 collections__grid--title collections__paragraph">
                        NEW IN
                    </p>
                    <p class="paragraph--6 collections__grid--link collections__paragraph">
                        VIEW MORE
                    </p>
                </div>
            </a>

            <a href="#" class="collections__grid--item">
                <img src="images/1.3.png" alt="" class="collections__grid--image">
                <div class="collections__grid--hover">
                    <p class="paragraph--5 collections__grid--title collections__paragraph">
                        NEW IN
                    </p>
                    <p class="paragraph--6 collections__grid--link collections__paragraph">
                        VIEW MORE
                    </p>
                </div>
            </a>

        </div>

    </div>

    <!--``````````````````````````````````  TRENDING  `````````````````````````````````````-->

    <div class="trending">
        <div class="trending__box">
            <p class="paragraph--3 trending__paragraph trending__box--heading">
                BRING OUT THE HIDDEN BEAUTY
            </p>
            <p class="paragraph--6 trending__paragraph trending__box--paragraph">
                Get styled with the high-fashion products and transform yourself.
            </p>
            <a href="categories/?c=22" class="paragraph--6 trending__paragraph trending__box--link">
                TRENDING
            </a>
        </div>
    </div>

    <!--``````````````````````````````````  NEW  `````````````````````````````````````-->

    <div class="new">
        <div class="new__top">
            <h1 class="heading--1 new__heading new__top--heading">
                hoose your type
            </h1>
            <p class="paragraph--3 new__paragraph new__top--paragraph">
                WHAT'S NEW FOR YOU
            </p>
        </div>

        <div class="new__products">

            <!--__________________________PRODUCTS_______________________________-->

            <div class="new__products--box">
                <div class="new__products--container">
                    <!-- <div class="product">
                        <a href="#" class="product__imagelink">
                            <p class="paragraph--6 product__sale">SALE</p>
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                        </a>
                        <p class="product__paragraph paragraph--5 product__title">
                            NEW AGE MIRACLE
                        </p>
                        <p class="product__price paragraph--6">
                            $300 <span class="product__price--delete">$360</span>
                        </p>
        
                    </div> -->
                </div>
                <!--__________________________BUTTONS_______________________________-->
                
                <svg class="new__products--button--left new__products--button">
                    <use href='images/sprite.svg#icon-chevron-small-left'></use>
                </svg>
                <svg class="new__products--button--right new__products--button">
                    <use href='images/sprite.svg#icon-chevron-small-right'></use>
                </svg>
                
            </div>

        </div>

    </div>

    <!--``````````````````````````````````  ORGANIC  `````````````````````````````````````-->

    <div class="organic">

        <p class="paragraph--5 organic__paragraph">
            CLEAN ORGANIC AND NATURAL COSMETIC PRODUCTS
        </p>

        <div class="organic__overlay">
            
        </div>
        <video class="organic__video" autoplay loop>
            <source src="https://cdn.shopify.com/s/files/1/0242/0434/5399/files/reflection.mp4" type="video/mp4">
        </video>
    </div>

    <!--``````````````````````````````````  DISCOUNT  `````````````````````````````````````-->

    <div class="discount">
        <div class="discount__left">
            <p class="paragraph--4 discount__paragraph discount__left--heading">
                30% OFF ON CREAMS
            </p>
            <p class="paragraph--5 discount__paragraph discount__left--paragraph">
                Nourish your skin with toxin-free cosmetics products.<br>
                With the offers that you can’t refuse.
            </p>
            <a href="#" class="paragraph--6 discount__paragraph discount__left--link">
                NEVER BEFORE PRICES
            </a>
        </div>
        <div class="discount__right">
            <img src="images/poster.jpg" alt="" class="discount__right--image">
        </div>
    </div>

    <!--``````````````````````````````````  BLOCKBUSTER  `````````````````````````````````````-->

    <div class="blockbuster">
        <div class="blockbuster__top">
            <h1 class="heading--1 blockbuster__heading blockbuster__top--heading">
                Divine beauty
            </h1>
            <p class="paragraph--3 blockbuster__paragraph blockbuster__top--paragraph">
                BLOCKBUSTER COLLECTIONS
            </p>
        </div>

        <div class="blockbuster__products">
            
            <div class="blockbuster__products--box">
                <div class="blockbuster__products--container">
                    <!-- <div class="product">
                        <a href="#" class="product__imagelink">
                            <p class="paragraph--6 product__sale">SALE</p>
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
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
                            <img src="images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                            <img src="images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                        </a>
                        <p class="product__paragraph paragraph--5 product__title">
                            NEW AGE MIRACLE
                        </p>
                        <p class="product__price paragraph--6">
                            $300 <span class="product__price--delete">$360</span>
                        </p>
        
                    </div> -->
                </div>
                <svg class="blockbuster__products--button blockbuster__products--button--left">
                    <use href='images/sprite.svg#icon-chevron-small-left'></use>
                </svg>
                <svg class="blockbuster__products--button blockbuster__products--button--right">
                    <use href='images/sprite.svg#icon-chevron-small-right'></use>
                </svg>
            </div>

        </div>

    </div>

    <!--``````````````````````````````````  BADGES  `````````````````````````````````````-->

    <div class="badges">
        <div class="badges__box">
            <div class="badges__container">
                <a href="#" class="badges__link">
                    <img src="images/badge-1.png" alt="" class="badges__images badges__image--1">
                </a>
                <a href="#" class="badges__link">
                    <img src="images/badge-2.png" alt="" class="badges__images badges__image--2">
                </a>
                <a href="#" class="badges__link">
                    <img src="images/badge-3.png" alt="" class="badges__images badges__image--3">
                </a>
                <a href="#" class="badges__link">
                    <img src="images/badge-4.png" alt="" class="badges__images badges__image--4">
                </a>
                <a href="#" class="badges__link">
                    <img src="images/badge-5.png" alt="" class="badges__images badges__image--5">
                </a>
            </div>
        </div>
    </div>

    <!--``````````````````````````````````  BLOG  `````````````````````````````````````-->

    <div class="blog">
        <div class="blog__top">
            <h1 class="heading--1 blog__heading blog__top--heading">
                our latest news
            </h1>
            <p class="paragraph--3 blog__paragraph blog__top--paragraph">
                BEAUTILICIOUS BLOG
            </p>
        </div>

        <div class="blog__posts">
            <div class="blog__post">
                <a href="Blog1.php#" class="blog__post--imagebox">
                    <img src="images/Untitled-2.JPG" alt="" class="blog__post--image" >
                </a>
                <a href="Blog1.php#" class="paragraph--5 blog__paragraph blog__post--headingLink">
                    THE BEST PART ABOUT MAKEUP BRUSH AND ITS TYPES
                </a>
                <p class="paragraph--6 blog__paragraph blog__post--date">
                    DEC 09 2019
                </p>
                <a href="Blog1.php#" class="paragraph--6 blog__paragraph blog__post--button">
                    READ MORE
                </a>
            </div>
            <div class="blog__post">
                <a href="Blog2.php#" class="blog__post--imagebox">
                    <img src="images/3.JPG" alt="" class="blog__post--image" >
                </a>
                <a href="Blog2.php#" class="paragraph--5 blog__paragraph blog__post--headingLink">
                    THE BEST PART ABOUT MAKEUP BRUSH AND ITS TYPES
                </a>
                <p class="paragraph--6 blog__paragraph blog__post--date">
                    DEC 09 2019
                </p>
                <a href="Blog2.php#" class="paragraph--6 blog__paragraph blog__post--button">
                    READ MORE
                </a>
            </div>
            <div class="blog__post">
                <a href="Blog3.php#" class="blog__post--imagebox">
                    <img src="images/Untitled-1.JPG" alt="" class="blog__post--image" >
                </a>
                <a href="Blog3.php#" class="paragraph--5 blog__paragraph blog__post--headingLink">
                    THE BEST PART ABOUT MAKEUP BRUSH AND ITS TYPES
                </a>
                <p class="paragraph--6 blog__paragraph blog__post--date">
                    DEC 09 2019
                </p>
                <a href="Blog3.php#" class="paragraph--6 blog__paragraph blog__post--button">
                    READ MORE
                </a>
            </div>
            <div class="blog__post">
                <a href="Blog4.php#" class="blog__post--imagebox">
                    <img src="images/1.JPG" alt="" class="blog__post--image" >
                </a>
                <a href="Blog4.php#" class="paragraph--5 blog__paragraph blog__post--headingLink">
                    THE BEST PART ABOUT MAKEUP BRUSH AND ITS TYPES
                </a>
                <p class="paragraph--6 blog__paragraph blog__post--date">
                    DEC 09 2019
                </p>
                <a href="Blog4.php#" class="paragraph--6 blog__paragraph blog__post--button">
                    READ MORE
                </a>
            </div>
        </div>
        <a href="#" class="blog__button paragraph--6">VIEW THE BLOG</a>

    </div>

    <!--``````````````````````````````````  INSTAGRAM  `````````````````````````````````````-->

    <div class="instagram">
        <a href="#" class="instagram__link">
            <img src="images/instaa-1.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/instaa-2.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/instaa-3.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/instaa-4.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/5.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/6.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/7.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/8.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/9.jpg" alt="" class="instagram__image">
        </a>
        <a href="#" class="instagram__link">
            <img src="images/10.jpg" alt="" class="instagram__image">
        </a>
    </div>

    <!--``````````````````````````````````  SUBSCRIBE  `````````````````````````````````````-->

    <div class="subscribe">
        <p class="paragraph--5 subscribe__heading">
            SIGN-UP THE BEAUTY FAN CLUB TODAY
        </p>
        <p class="paragraph--5 subscribe__paragraph">
            Subscribe to our mailing list to be notified about news, collections and special offers
        </p>
        <form action="#" class="subscribe__form">
            <input type="text" id="subscribeText" class="subscribe__textbox paragraph--6" placeholder="Your Email">
            <button type="submit" class="subscribe__button" >Subscribe</button>
        </form>
    </div>

    <!--``````````````````````````````````  FOOTER  `````````````````````````````````````-->

    <!--<footer class="footer">
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
                        <use href='images/sprite.svg#icon-facebook'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-instagram'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-twitter'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-pinterest'></use>
                    </svg>
                </a>
            </div>
        </div>
    </footer>-->
    
    <footer>
    <div class="footer-main">
        <div class="flexx-container">
            <div class="flexx-container--1">
            <div class="payment-container">
            <div class="paypal-icon">
                <a href="#">
                <img src="images/paypal_png-01.png" class="paypal-image" alt="paypal-icon"/>
                </a>
            </div>
            <div class="footer-payment">
            <a href="#" class="payment-item">
                <img src="images/visa_png-01.png" class="payment-image" alt="visa-icon"/></a>
            <a href="#" class="payment-item">                
                <img src="images/american_exp_png-01.png" class="payment-image" alt="visa-icon"/></a>
            </a>
            <a href="#" class="payment-item">                
                <img src="images/mastercard_png-01.png" class="payment-image" alt="visa-icon"/></a>
            </a>
            <a href="#" class="payment-item">                
                <img src="images/maestro_png-01.png" class="payment-image" alt="visa-icon"/></a>
            </a>
            </div>
            </div>
            </div>
            <div class="flexx-container--2">
                <div class="footer__store">
                <p class="heading">
                STORE
                </p>
                <p class="">
                Copyright © 2020, Adhyay<p class="break">
                Powered by Adhyay</p>
                </p>
                </div>
            </div>
            <div class="flexx-container--3">
                <div class="footer__info">
                <p class="footer-info-flex">
                    <p class="heading">
                    INFO
                    </p>
                <a href="#" class="footer-info-flex--1">Contact</a>
                <a href="#" class="footer-info-flex--2">Shipping and Returns</a>
                <a href="#" class="footer-info-flex--3">Search</a>
                    </p>
                </div>
        
            </div>
            <div class="flexx-container--4">
                <div class="footer__subscribe">
                <p class="paragraph--5 footer__paragraph footer__subscribe--heading">
                SUBSCRIBE
                </p>
                <div class="footer__subscribe--socialBox">
                <a href=https://www.facebook.com/bodycontours" target="_blank" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-facebook'></use>
                    </svg>
                </a>
                <a href="https://www.instagram.com/bodycontoursuk/" target="_blank" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-instagram'></use>
                    </svg>
                </a>
                <a href="https://www.twitter.com/bodycontours1" target="_blank" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-twitter'></use>
                    </svg>
                </a>
                <a href="#" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='images/sprite.svg#icon-pinterest'></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </footer>
    <script src="js/slideshow.js"></script>
    <script src="js/globalVariables.js"></script>
    <script src="js/productsSettelment.js"></script>
    <script src="js/glider.js"></script>
    <script src="js/cart.js"></script>

</body>
</html>