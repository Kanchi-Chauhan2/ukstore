<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;650;600;700&display=swap" rel="stylesheet">
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

    <div class="test-container">
        <div class="testheading__para">
            <h1>Testimonial</h1>
        </div>
        <div class="test-content">
            <p class="test-para">
            This Active lightening is wonderful, I have tried many products but I didn't get the results until I use the Bc Active lotion , you need to see me now, very light skin , flawless even tone youthful. I have now regain my confidence . Love BODYCONTOURSUK.<span style="color:orange; font-weight:650;">-  Pamela Nzeh</span>
<p class="breakk">I use sun block from body contours when I do outdoor activities; I keep it with me and apply it all the time and it don’t burn. It keeps my skin soft and nourishing. I now have people asking, what I do to keep my skin so good.<span style="color:orange; font-weight:650;"> - Osato Akintimeyin</span></p>
<p class="breakk">My husband and I uses body contours products and very happy with the product quality and so the body lotion is absolutely wonderful, keeping our skin soft and moisturized.<span style="color:orange; font-weight:650;">-  Judith Okon</span></p>
<p class="breakk">Body contours dark knuckle serum has been very useful for me; I have applied it on my knuckles, elbow and toes and the results are much better than other products in the market.<span style="color:orange; font-weight:650;">-  Mercy Bella</span></p>
<p class="breakk">I switched to Body Contours products last year and very happy with their products particularly vitamin C serum, recommended for aging women.<span style="color:orange; font-weight:650;">-  Samantha Oswagwu</span></p>
<p class="breakk">I always have best experience with Body Contours and happy to be a regular customer of such a wonderful company. The store owner is always polite when I have had call in the past and the shipping is regularly in time!-<span style="color:orange; font-weight:650;">  Mary Morris</span></p>
<p class="breakk">I must say that https://bodycontours.org/17-eye-neck-creams  (eye cream) from body contours is a much better option in market as it is organic hypoallergenic cream rich with Vitamin E and Vitamin C, at least for people having sensitive eyes as mine to keep away the unwanted lanolin chemical. Kudos to Body Contours!<span style="color:orange; font-weight:650;">-  Precious Iyanda</span></p>
<p class="breakk">I recently received Body Contours lightening body lotion and I am overwhelmed with the hassle free delivery. I literally tried everything that is available out on the market, from high-end department store to local pharmacy but the products are mostly spiked with unwanted elements. For a long time now I have wanted to find a skin care line that can overcome my desires to organically lighten my skin without any harmful chemicals, and I believe that I finally found the best solution after consulting Body Contours. I have done research work on health and nutrition during my college and know that transdermal effects of using organic products simply render better health system.  Thank you Body Contours from my heart and wishing you the very best of success and I have faith that your natural product treatment will reach out to many people who cares about their health and body!<span style="color:orange; font-weight:650;">-  Stella Johnson</span></p>
<p class="breakk">Best brightening and lightning lotion, I have purchased from 'Body contours' and I am very happy with the product and highly recommended <span style="color:orange; font-weight:650;"> -Sarah Kimell </span></p>
<p class="breakk">One of the best facial cleanser available online. Thank you Bodycontour for recommending me this product<span style="color:orange; font-weight:650;">- Anish Restivo</span></p>

<p class="breakk">I was struggling with the dark patches around the neck for a long time, spending money on buying cremes from the pharmacy and online store without results. Until one of my friends recommended 'Body contours' products and as I took her advice, I switched on to using BC Multi - Actives Eye Repair Cream from 'Body Contours'. No sooner, I eventually found my self in a better place with much-needed improvements. I would Highly recommend their products<span style="color:orange; font-weight:650;">- Masi Emmanuel</span></p>

<p class="breakk">One of the best Sun protective cream available in the market, Highly Recommended<span style="color:orange; font-weight:650;">-   Varon Cornell</span></p>

<p class="breakk">It's early days, I've only used the products for only six days now, but I can see signs of brightness. So hopefully I'm in for a winner. And it'll be God sent for me, because I've tried so many products without results.<span style="color:orange; font-weight:650;">-   Marjorie b.</span></p>

<p class="breakk">My friend was watching the tv and saw the advertisement and refer the number to me, she knew how my self esteem was so low and no confidence because of my acne and blemishes. Have called and spoke with Bridget, she is a life saver and I will never forget you, you have all the patience with me and gave me lots of encouragement and promise me if I follow your treatment plan I will never regret it and trust me she was right, I will be using these products for the rest of my life, have had extremely bad dark spot and acne and can’t leave my house with out make up for about 15 years now and I can finally say since starting this products after 6 weeks I went make up free. My skin is bright and glowing and my scars are almost gone. Bridget I can’t thank you enough may god continue to bless you with changing peoples life. Thanks ever so much<span style="color:orange; font-weight:650;">-  Samantha W.</span></p>

<p class="breakk">Hi Samantha, thank you for your kind words, I say Amen to that.And so shall it be, I’m so happy to read about you been able to go out now without makeup. I understand the low self-esteem. I am privileged to take care of your skin. I really love you for taking the time to send this review, May God Bless you. I love you, please give me a call. Thank you so much, lots of Love Bridget<span style="color:orange; font-weight:650;">-   Store Owner</span></p>

<p class="breakk">I start seeing lines by my mouth, and my eyes area, I did research and found this company, I called BODYCONTOURSUK, I was advised by Nefer, she told me the 10 years younger will help, I didn't want Botox because it's toxic, I wanted organic natural products I have use this product for 2 years and I'm amazed how my face look so youthful and smooth, my face is light. I'm so happy - <span style="color:orange; font-weight:650;">  Lorraine Thomson</span></p>

<p class="breakk">All my blemishes have gone just in 4 weeks of using this, and my skin looks brighter and more even now, very good product, I will definitely buy again, I recommend this to everyone with uneven skin and blemishes it works so fast.<span style="color:orange; font-weight:650;">-  Amanda Bailey</span></p>

<p class="breakk">I think this is one of the best and affordable products I have ever used in skin care.. I will personally rebrand it as Nyquil you WANT to know THE meaning talk to BODY CONTOURS<span style="color:orange; font-weight:650;">-  Asa</span></p>

<p class="breakk">Wonderful product, Love it with the smoothing gel, I'm a few shade lighter in 28 days, I'm amazed like the it says in the bottle. <span style="color:orange; font-weight:650;">-  Chichi okoro</span></p>
            </p>
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