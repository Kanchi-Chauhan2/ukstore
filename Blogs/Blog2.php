<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
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

   
<div class="header__menu" style="position:relative;">
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
                    <a href="../categories/?c=22" class="header__menu--link">DISCOUNT SET</a>
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
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=22">UPTO 60% OFF</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=21">ALL PRODUCTS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=22">DISCOUNT SET</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=1">BRIGHTENING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=2">FACIAL CLEANSERS</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=3">TEN YEARS YOUNGER</a></li>
                <li class="dropdown__column--listItem"><a class="paragraph--6" href="../categories/?c=4">EYE AND NECK CREAMS</a></li>
            
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="../categories/?c=5">NOURISHING AND TREATMENT</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=6">ACNE AND BLEMISHES</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=7">MASQUES</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=8">SHAVING BUMP S MEN/WOMEN</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=9">DARK KNUCKLES,HANDS & FEET</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=10">MINERAL MAKEUP</a></li>
                <li class="dropdown__column--listItem"><a href="#">STRETCH MARKS</a></li>
            </ul>
            <ul class="dropdown__column--list">
                <li class="dropdown__column--listItem"><a href="../categories/?c=11">SUN BLOCK</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=12">BLEACHING AND LIGHTENING</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=13">PEELS</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=14">SOAP</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=15">SERUM</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=16">WASH</a></li>
                <li class="dropdown__column--listItem"><a href="../categories/?c=17">SCRUB</a></li>
               
            </ul>
                    </div>
        </div>
    <div class="shop-dropdown">
        <div class="shop-dropdown__column">
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=10"><img class="shop-dropdown__column--imgbox" src="../images/shop11.png" alt="Ten years Younger Skin">Ten years younger skin rejuvenator</a></li>
            </ul>
        
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=2"><img class="shop-dropdown__column--imgbox" src="../images/shop12.png" alt="BC Active Lightening Lotion">BC Active Lightening System</a></li>
            </ul>
       
            <ul class="shop-dropdown__column--list">
            <li class="shop-dropdown__column--listItem"><a href="product/?p=11"><img class="shop-dropdown__column--imgbox" src="../images/shop13.png" alt="BC Extra Strength Lightening Wash">BC Extra Strength Lightening Wash</a></li>
            </ul>
        </div>
    </div>
    <div class="products-dropdown">
        <div class="products-dropdown__column">
            <ul class="products-dropdown__column--list">
            <li class="products-dropdown__column--listItem"><a href="../categories/?c=22">Discount Set</a></li>
            <li class="products-dropdown__column--listItem"><a href="../categories/?c=1">Brightening and lightening</a></li>
            <li class="products-dropdown__column--listItem"><a href="../categories/?c=3">Ten Years Younger</a></li>
            <li class="products-dropdown__column--listItem"><a href="../categories/?c=6">Acne and Blemishes</a></li>
            <li class="products-dropdown__column--listItem"><a href="../categories/?c=9">Dark Knuckles, hands & Feet</a></li>
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
</script>
    <div class="Blog-container">
       <div class="heading__all">
            <h1>FEELING COMFORTABLE IN YOUR SKIN</h1>
        </div>
        <div class="Blog-body">
                <a href="#" class="blog__imagebox">
                    <img src="../images/3.JPG" alt="" class="blog__post--imagee" >
                </a>
                <div class="Blog-content">
                    <p class="blog-para">
                    According to the US National Library of Medicine research, Out of 600 surveyed women in South Africa mostly African and Indian ancestries, “32.7% reported using skin lightening products” (Dermatol BR J). Women have put their own health at risk by using cosmetic products containing mercury, hydroquinone, and corticosteroids especially after knowing the facts about the harmful effects caused by these products.

<p class="break">breakAnother culture that is very conscious about skin lightening is the Chinese culture (among other Asian cultures). Although the modern revelation of brighter skin may date back to ancient China as women considered to be beautiful with physical characteristics such as black lustrous hair, pale skin, bright expressive eyes, and light elegant gait.</p>

<p class="break">In recent times, to attain favorite skin tone, people are more inclined to use skin-bleaching products made available by those who want to exploit the desire for fairer skin. Meanwhile, it has increasingly become more important to choose skin-lightening products wisely and be aware of the ingredients that are safe and contain non-allergic chemicals, whilst understanding when and why it is adequate to apply such ointments.</p>

<p class="break">The most common skin lightener, hydroquinone is not uniformly safe and has been banned in Europe while the FDA is proposing to ban it in the US since hydroquinone causes rashes and may also result in skin cancer. Moreover, it is always advisable to be steering clear of any skin lightener that contains steroids, as some are so potent that they can even suppress our immune systems.</p>

<p class="break">According to Dr. Arthur Perry (NY, USA), “when you see a dramatic change in skin color of celebrities, it is mainly because they undertake laser or chemical peels, or use a drug called Benaquin cream. This is a drug that kills pigment-producing cells and is intended as a last-ditch effort to even out the splotches that occurs in that terribly disfiguring disease called vitiligo”.  </p>

 

<h3 class="heading__para">CHOOSING EFFECTIVE PRODUCTS FOR YOUR SKIN</h3>

<p class="break">Each individual has a unique skin type that means finding the best skin lightening cream is a different experience for different people. Fortunately, there are many harmless products available in the market to achieve skin treatment, depending on one’s goal. For instance, reversing the effects of the sun on your face or getting rid of black spots on the skin. However, depending on the age, one must lookout for products that will both even out the skin tone and help with anti-aging efforts that are rich in vitamin C and moisturizing ingredients such as coconut and olive oils. Other factors while choosing skin cream are the sensitive skin that is prone to irritation and rashes. In that case, one should look for creams with natural ingredients that work to kill bacteria and exfoliate the skin, all while keeping the pores clean. </p>

 

<h3 class="heading__para">BEST ORGANIC SKIN LIGHTENING CREAM</h3>

<p class="break">Chemical brightening agents like hydroquinone blocks key enzymes near melanin (pigment) and help skin to appear brighter. However, recent studies began questioning the safety of hydroquinone as clients were at risk for developing ochronosis, a condition that ironically darkens the skin and causes severe irritation and hyperpigmentation. There are many shops that are switching to hydroquinone-free lightening agents, online stores such as ‘Body Contours’ are mostly focusing on organic products that will brighten and will have no after effect on the skin also helping with problems of skin pigmentation.</p>

<p class="break">Body Contours sells organic lightening cream that comprises natural alternatives to hydroquinone. Some of the natural ingredients in this skin cream include:</p>

<p class="break">LICORICE: It involves two ingredients that help with pigmentation- glabridin and liquiritin. Helping with dark spots, licorice is soothing and can help even out skin tone.</p>

<p class="break">KOJIC ACID:  It is originated from mushroom-like fungi during fermentation and is the second most common natural lightening agent. It forbids the production of melanin and penetrates the upper layers of the skin causing a lightning effect.</p>

<p class="break">VITAMIN C: It is another popular brightening alternative found in brightening serum from Body Contours and is an incredible antioxidant that is favorable for patients with hyperpigmentation. It works by lightening hyperpigmentation spots on the skin, but not brightening regular skin.</p>

<h3 class="heading__para">TAKEAWAYS</h3>

<p class="break">Organic creams that reassure cell turnover and shedding, constrain melanin production or shield from the sun will all be helpful in improving the skin to some degree, more importantly, it helps avoid further darkening of the skin.</p>

<p class="break">If you are looking to purchase whitening cream to lighten your skin color or reduce the appearance of dark pigmentation, we can recommend “active lightening system skin lotion (https://bodycontours.org/brightening-and-lightening/2-bc-active-lightening-system-skin-lotion-250ml.html )” by Body Contours. It contains a large number of natural whiteners with organic Aloe Vera, Kojic acid, Organic Coconut oil, and so on. Daily use helps maintain healthy skin while avoiding skin-damage in the longer run.</p>
                    </p>
                </div>
        </div>
    </div>
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
                <a href="https://www.facebook.com/bodycontours" target="_blank" class="footer__subscribe--link">
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
</body>
</html>