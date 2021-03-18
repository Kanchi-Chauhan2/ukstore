<?php
    $cookie = 0;
    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $cookie = $_COOKIE['bodycountersUser'];
    }
?>

<?php

    include '../php/db.php';
    include '../php/string_to_array.php';
    $products = array();
    $totalProducts = 0;
    $categoryName = '';
    $domainPrefix = 'http://localhost/ukstore/';
    $page = 0;
    $c = 0;
    $f = 0;
    if( $_GET ){
        if( isset($_GET['c']) ){
            $c = $_GET['c'];
            //---------------------QUERY TO GET TOTAL PRODUCTS---------------------
            $query = "SELECT `name`, `products`, `totalProducts` FROM `categories` WHERE id='$c'";
            $query_exec = mysqli_query($conn,$query);
            $tempProducts = '';
            while( $row = mysqli_fetch_array($query_exec) ){
                $totalProducts = $row['totalProducts'];
                $categoryName = $row['name'];
                $tempProducts = $row['products'];
            }

            $tempList = getArrayFromString( $tempProducts, ',' );
            $tempQuery = "";

            for( $i = 0 ; $i < sizeof( $tempList ) ; $i++ ){
                if ( $i === 0 ){
                    $tempQuery = $tempList[0];
                }else{
                    $tempQuery = $tempQuery . ' OR  ' . $tempList[$i];
                }
            }


            //---------------------Getting Products Using Featured-----------------

            if( isset($_GET['p']) ){
                $page = $_GET['p'];
            }

            $startRange = $page * 12;
            $endRange = $page + 12;

            if( $endRange > $totalProducts ){
                $endRange = $totalProducts;
            }
            $query = '';
            if( isset($_GET['f']) ){
                $f = $_GET['f'];

                switch($f){
                    case 0:
                        $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=". $tempQuery ." LIMIT $startRange,$endRange";
                        break;
                    case 1:
                        $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=". $tempQuery ." ORDER BY `products`.`int_smallPrice` ASC LIMIT $startRange,$endRange ";
                        break;
                    case 2:
                        $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=". $tempQuery ." ORDER BY `products`.`int_smallPrice` DESC LIMIT $startRange,$endRange ";
                        break;
                    case 3:
                        $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=". $tempQuery ."  ORDER BY `products`.`date` ASC LIMIT $startRange,$endRange ";    
                        break;
                    case 4:
                        $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=". $tempQuery ."  ORDER BY `products`.`date` DESC LIMIT $startRange,$endRange ";    
                        break;
                }

            }else{
                $query = "SELECT `id`, `name`, `images`,`prices`, `sellingPrices` FROM `products` WHERE `id`=" . $tempQuery . " LIMIT $startRange,$endRange";
            }
            //echo $query;
            $query_exec = mysqli_query( $conn, $query );
                
                while( $row = mysqli_fetch_array( $query_exec ) ){
                    $products[] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'images' => getArrayFromString($row['images'],','),
                        'prices' => getArrayFromString($row['prices'],','),
                        'sellingPrices' => getArrayFromString($row['sellingPrices'],',')
                    );
                }

        }else{
            echo 'Redirect to Error 500';
        }
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
        var products = <?php if( isset($_GET['c']) ){echo json_encode($products);} else{ echo json_encode(0); } ?>;
        var totalProducts = <?php if( isset($_GET['c']) ){echo json_encode($totalProducts);} else{echo json_encode(0);}?>;
        var page = <?php if( isset($_GET['p']) ){echo json_encode($page);} else{echo json_encode(0);} ?>;
        var categoryName = <?php if(isset($_GET['c'])){echo json_encode($categoryName);} else{echo json_encode('');} ?>;
        var categoryID = <?php if(isset($_GET['c'])){echo json_encode($_GET['c']);} else{echo json_encode(0);} ?>;
        var f = <?php if(isset($_GET['f'])){echo json_encode($f);} else{ echo json_encode(0); } ?>;
        var cookie = <?php echo json_encode($cookie) ?>;
        cookie = JSON.parse(cookie);
    </script>

</head>
<body>

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

    <header class="header" style="position:relative;">

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
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="dropdown()" onmouseleave="removedropdown()">
                    <a href="#" class="header__menu--link">CATEGORY<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6"  onmouseover="shopdropdown()" onmouseleave="removeshopdropdown()">
                    <a href="#" class="header__menu--link">SHOP<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="productsdropdown()" onmouseleave="removeproductsdropdown()">
                    <a href="#" class="header__menu--link">PRODUCTS<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="?c=22" class="header__menu--link">DISCOUNT SET</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="#" class="header__menu--link">Before/After Photos</a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="tvdropdown()" onmouseleave="removetvdropdown()">
                    <a href="#" class="header__menu--link">TV/AD<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item header__menu--dropdownItem paragraph--6" onmouseover="linksdropdown()" onmouseleave="removelinksdropdown()" >
                    <a href="#" class="header__menu--link">LINKS<svg class="header__menu--dropdown"> <use href='../images/sprite.svg#icon-chevron-small-right'></use> </svg></a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="../Blogs/AboutUs.php" class="header__menu--link">ABOUT US</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="../Blogs/ContactUs.php" class="header__menu--link">CONTACT</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="../Blogs/Testimonial.php" class="header__menu--link">TESTIMONIAL</a>
                </li>
                <li class="header__menu--item paragraph--6">
                    <a href="../Blogs/blogpage.php" class="header__menu--link">BLOG</a>
                </li>
            </ul>
            <a href="#" class="header__menu--cart header__menu--link paragraph--6">CART</a>
        </div>
    </header>

                        
    <!-- `````````````````````````````````  DROPDOWN    ````````````````````````````````````  -->
    <div class="dropdown">
        <div class="dropdown__column">
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=22">UPTO 60% OFF</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=21">ALL PRODUCTS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=22">DISCOUNT SET</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=1">BRIGHTENING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=2">FACIAL CLEANSERS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=3">TEN YEARS YOUNGER</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="?c=4">EYE AND NECK CREAMS</a></li>
             
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="?c=5">NOURISHING AND TREATMENT</a></li>
                <li class="dropdown__column--listItem"><a href="?c=6">ACNE AND BLEMISHES</a></li>
                <li class="dropdown__column--listItem"><a href="?c=7">MASQUES</a></li>
                <li class="dropdown__column--listItem"><a href="?c=8">SHAVING BUMP S MEN/WOMEN</a></li>
                <li class="dropdown__column--listItem"><a href="?c=9">DARK KNUCKLES,HANDS & FEET</a></li>
                <li class="dropdown__column--listItem"><a href="?c=10">MINERAL MAKEUP</a></li>
                <li class="dropdown__column--listItem"><a href="#">STRETCH MARKS</a></li>
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="?c=11">SUN BLOCK</a></li>
                <li class="dropdown__column--listItem"><a href="?c=12">BLEACHING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a href="?c=13">PEELS</a></li>
                <li class="dropdown__column--listItem"><a href="?c=14">SOAP</a></li>
                <li class="dropdown__column--listItem"><a href="?c=15">SERUM</a></li>
                <li class="dropdown__column--listItem"><a href="?c=16">WASH</a></li>
                <li class="dropdown__column--listItem"><a href="?c=17">SCRUB</a></li>
               
            </ul>
                    </div>
        </div>
    <div class="shop-dropdown">
        <div class="shop-dropdown__column">
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="../product/?p=10"><img class="shop-dropdown__column--imgbox" src="../images/shop11.png" alt="Ten years Younger Skin">Ten years younger skin rejuvenator</a></li>
            </ul>
        
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="../product/?p=2"><img class="shop-dropdown__column--imgbox" src="../images/shop12.png" alt="BC Active Lightening Lotion">BC Active Lightening System</a></li>
            </ul>
       
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="../product/?p=11"><img class="shop-dropdown__column--imgbox" src="../images/shop13.png" alt="BC Extra Strength Lightening Wash">BC Extra Strength Lightening Wash</a></li>
            </ul>
        </div>
    </div>
    <div class="products-dropdown">
        <div class="products-dropdown__column">
            <ul class="products-dropdown__column--list">
            <li class="products-dropdown__column--listItem"><a href="?c=22">Discount Set</a></li>
            <li class="products-dropdown__column--listItem"><a href="?c=1">Brightening and lightening</a></li>
            <li class="products-dropdown__column--listItem"><a href="?c=3">Ten Years Younger</a></li>
            <li class="products-dropdown__column--listItem"><a href="?c=6">Acne and Blemishes</a></li>
            <li class="products-dropdown__column--listItem"><a href="?c=9">Dark Knuckles, hands & Feet</a></li>
            </ul>
        </div>
    </div>
    <div class="tv-dropdown">
        <div class="tv-dropdown__column">
        <iframe style="width:100%;margin-bottom:2rem;" src="https://www.youtube.com/embed/6EsDhpe6suQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <ul class="tv-dropdown__column--list">
            <li class="tv-dropdown__column--listItem"><a href="https://youtu.be/6EsDhpe6suQ">Body Contours Advance Skin & Hair Care made of 100% Natural Organic Herbal Extracts</a></li>
            </ul>
        </div>
    </div>
    <div class="links-dropdown">
        <div class="links-dropdown__column">
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="../Blogs/UnderAttack.php">MEN SKIN UNDER ATTACK</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/ScienceTech.php">SKIN SCIENCE TECHNOLOGY</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/SkinLight.php">SKIN LIGHTENING PRODUCTS</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/PerfectProduct.php">FIND THE PERFECT PRODUCT FOR YOU</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/8pointlift.php">8POINT LIFT</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/HairRemoval.php">LASER HAIR REMOVAL</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/WrinkleRed.php">WRINKLE REDUCTION</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/WeightTreat.php">WEIGHT LOSS TREATMENT</a></li>
            <li class="links-dropdown__column--listItem"><a href="../Blogs/Bc.php">WHAT BC CAN DO FOR YOU</a></li>
            </ul>
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="#"><img class="links-dropdown__column--imgbox" src="../images/links1.png" alt="Lightening Serum"></a></li>
            </ul>
            <ul class="links-dropdown__column--list">
            <li class="links-dropdown__column--listItem"><a href="#"><img class="links-dropdown__column--imgbox" src="../images/link2.png" alt="Gold Face Softer Serum"></a></li>
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
                dropdown.style.height = dropdown.scrollHeight+'px';
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
    </script>
    </header>

    <!--``````````````````````````````````  COLLECTIONS  `````````````````````````````````````-->

    <div class="collections">
        <div class="collections__top">
            <div class="collections__top--slugs">
                <a href="<?php echo $domainPrefix; ?>" class="collections__top--slugs__link paragraph--6 collections__paragraph">Home</a>
                <span class="collections__top--slugs__slash paragraph--6 collections__paragraph">/</span>
                <p class="paragraph--6 collections__top--slugs__category collections__paragraph" id="categoryName">Category</p>
            </div>
            <div class="collections__sort">
                <p class="paragraph--5 collections__paragraph collections__sort--heading">
                    Sort by
                </p>
                <div class="collections__sort--selectionbox">
                    <div class="collections__sort--selected paragraph--6 collections__paragraph">

                        <?php
                            switch($f){
        
                                case 0:
                                    echo 'Featured';
                                    break;
                                case 1:
                                    echo 'Price, low to high';
                                    break;
                                case 2:
                                    echo 'Price, high to low';
                                    break;
                                case 3:
                                    echo 'Date, old to new';
                                    break;
                                case 4:
                                    echo 'Date, new to old';
                                    break;
                                default:
                                    echo 'Featured';
                                    break;
                            }
                        ?>

                    </div>
                    <ul class="collections__sort--selection collections__paragraph paragraph--6">
                        <li class="paragraph--6 collections__paragraph collections__sort--option" data-sort='featured'><a href="<?php echo $domainPrefix.'?c='.$c.'&p=0&f=0' ?>">Featured</a> </li>
                        <li class="paragraph--6 collections__paragraph collections__sort--option" data-sort='pricel'><a href="<?php echo $domainPrefix.'?c='.$c.'&p=0&f=1' ?>">Price, low to high</a></li>
                        <li class="paragraph--6 collections__paragraph collections__sort--option" data-sort='priceh'><a href="<?php echo $domainPrefix.'?c='.$c.'&p=0&f=2' ?>">Price, high to low</a></li>
                        <li class="paragraph--6 collections__paragraph collections__sort--option" data-sort='dateo'><a href="<?php echo $domainPrefix.'?c='.$c.'&p=0&f=3' ?>">Date, old to new</a></li>
                        <li class="paragraph--6 collections__paragraph collections__sort--option" data-sort='daten'><a href="<?php echo $domainPrefix.'?c='.$c.'&p=0&f=4' ?>">Date, new to old</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--****************************    PRODUCTS    *********************************-->

        <div class="collections__container">
            <!-- <div class="product">
                <a href="#" class="product__imagelink">
                    <p class="paragraph--6 product__sale">SALE</p>
                    <img src="../images/product-1-a.jpg" alt="" class="product__imagelink--image product__imagelink--image--1">
                    <img src="../images/product-1-b.jpg" alt="" class="product__imagelink--image product__imagelink--image--2">
                </a>
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
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
                <a href="#" class="product__paragraph paragraph--5 product__title">
                    NEW AGE MIRACLE
                </a>
                <p class="product__price paragraph--6">
                    $300 <span class="product__price--delete">$360</span>
                </p>
            </div> -->
        </div>

        <div class="collections__page">
            <!-- <p class="collections__index collections__index--1 paragraph--6 collections__paragraph">1</p>
            <p class="collections__index collections__index--2 paragraph--6 collections__paragraph">2</p>
            <p class="collections__index collections__index--upto paragraph--6 collections__paragraph">...</p>
            <p class="collections__index collections__index--last paragraph--6 collections__paragraph">10</p> -->
        </div>

    </div>

    <!--``````````````````````````````````  FOOTER  `````````````````````````````````````-->

    <footer>
    <div class="footer-main">
        <div class="flexx-container">
            <div class="flexx-container--1">
            <div class="payment-container">
            <div class="paypal-icon">
                <a href="#">
                <img src="../images/paypal_png-01.png" class="paypal-image" alt="paypal-icon"/>
                </a>
            </div>
            <div class="footer-payment">
            <a href="#" class="payment-item">
                <img src="../images/visa_png-01.png" class="payment-image" alt="visa-icon"/></a>
            <a href="#" class="payment-item">                
                <img src="../images/american_exp_png-01.png" class="payment-image" alt="visa-icon"/></a>
            </a>
            <a href="#" class="payment-item">                
                <img src="../images/mastercard_png-01.png" class="payment-image" alt="visa-icon"/></a>
            </a>
            <a href="#" class="payment-item">                
                <img src="../images/maestro_png-01.png" class="payment-image" alt="visa-icon"/></a>
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
                        <use href='../images/sprite.svg#icon-facebook'></use>
                    </svg>
                </a>
                <a href="https://www.instagram.com/bodycontoursuk/" target="_blank" class="footer__subscribe--link">
                    <svg class="footer__subscribe--icon">
                        <use href='../images/sprite.svg#icon-instagram'></use>
                    </svg>
                </a>
                <a href="https://www.twitter.com/bodycontours1" target="_blank" class="footer__subscribe--link">
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
    </div>
    </div>
    </div>
    </footer>
    <script src="js/settlingProducts.js"></script>
    <script src="../js/cart.js"></script>

</body>
</html>