
<!DOCTYPE html>
<html lang="en">

<?php


    include '../php/db.php';
    include 'php/category/getTableCategories.php';
    $table = -1;
    $function = -1;
    $id = -1;
    
    if( $_GET ){
        if( isset($_GET['function']) ){
            $function = $_GET['function'];
            $id = $_GET['id'];
            switch ( $_GET['function'] ){
                case 'category':
                    $table = getTableCategories($conn,$_GET['id']);
                    break;
            }
        }
    }

?>

<head>
    <script>
        let php_function = '';
        let php_currentParentCategory = 0;
        let php_categoryTable = '';
        php_function = ''+<?php echo json_encode($function) ?>;

        switch (php_function) {
            case 'category':
                {
                    php_currentParentCategory = <?php echo json_encode($id) ?>;
                    php_categoryTable = <?php echo $table ?>;
                    break;
                }
        }
        
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>


    <!--||||||||||||||||||||||||||||        HEADER          ||||||||||||||||||||||||||||||-->

    <header class="header">
        <div class="header__flex">

            <div class="header__home">
                <a href="#"><img src="images/logo.png" alt="" class="header__home--icon"></a>
            </div>

            <div class="header__search">
                <form action="#" class="header__search--form">
                    <input type="text" name="search" class="header__search--box" placeholder="Search Here">
                    <button type="submit" class="header__search--icon"></button>
                </form>
            </div>

            <div class="header__application">
                
            </div>

            <div class="header__notification">
                <span>9+</span>
            </div>

            <div class="header__profile">
                <div class="header__profile--image">

                </div>

                <div class="header__profile--arrow">

                </div>

            </div>


        </div>
    </header>

    <!--||||||||||||||||||||||||||||        SIDEBAR          ||||||||||||||||||||||||||||||-->

    <div class="sidebar">

        <div class="sidebar__menu">

            <!--    ########################    MENU 1    ##########################      -->

            <p class="sidebar__heading paragraph--4">MAIN</p>

            <div class="sidebar__item sidebar__dashboard active">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    Dashboard
                </p>

            </div>

            <div class="sidebar__accordion sidebar__accordion--ecommerce">
                
                <div class="sidebar__accordion--box">
                    <div class="sidebar__icon">
                    
                    </div>
    
                    <p class="sidebar__title paragraph--2">
                        Ecommerce
                    </p>

                    <div class="sidebar__accordion--arrow">

                    </div>

                </div>

                <ul>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3 active">
                        <span>Products</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Add Product</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Categories</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Charts</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Attributes</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Taxes</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Orders</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Customers</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Invoice</span>
                    </li>
                </ul>

            </div>

            <div class="sidebar__accordion sidebar__accordion--application">

                <div class="sidebar__accordion--box">
                    <div class="sidebar__icon">

                    </div>
    
                    <p class="sidebar__title paragraph--2">
                        Application
                    </p>

                    <div class="sidebar__accordion--arrow">

                    </div>

                </div>

                <ul>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Chat</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Calender</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Email</span>
                    </li>
                </ul>

            </div>

            <!--    ########################    MENU 2    ##########################      -->

            <p class="sidebar__heading paragraph--4">PAGES</p>

            <div class="sidebar__item sidebar__profile">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    Profile
                </p>

            </div>

            <div class="sidebar__accordion sidebar__accordion--authentication">

                <div class="sidebar__accordion--box">
                    <div class="sidebar__icon">

                    </div>
    
                    <p class="sidebar__title paragraph--2">
                        Authentication
                    </p>

                    <div class="sidebar__accordion--arrow">

                    </div>

                </div>

                <ul>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Login</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Register</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>Forgot Password</span>
                    </li>

                </ul>

            </div>

            <div class="sidebar__accordion sidebar__accordion--errorpages">

                <div class="sidebar__accordion--box">
                    <div class="sidebar__icon">

                    </div>
    
                    <p class="sidebar__title paragraph--2">
                        Error Pages
                    </p>

                    <div class="sidebar__accordion--arrow">

                    </div>

                </div>

                <ul>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>404 Error</span>
                    </li>
                    <li class="sidebar__accordion--item sidebar__paragraph paragraph--3">
                        <span>500 Error</span>
                    </li>
                </ul>

            </div>

            <div class="sidebar__item sidebar__users">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    Users
                </p>

            </div>

            <div class="sidebar__item sidebar__pages">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    All Pages
                </p>

            </div>

            <!--    ########################    MENU 3    ##########################      -->

            <p class="sidebar__heading paragraph--4">UI INTERFACES</p>

            <div class="sidebar__item sidebar__components">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    Components
                </p>

            </div>

            <div class="sidebar__item sidebar__layouts">

                <div class="sidebar__icon">

                </div>

                <p class="sidebar__title paragraph--2">
                    Layouts
                </p>

            </div>

        </div>

    </div>

    <!--||||||||||||||||||||||||||||        CONTAINER        ||||||||||||||||||||||||||||||-->

    <div class="container">

        <!--:::::::::::::::::::::::         DASHBOARD           :::::::::::::::::::::::::::-->

        <div class="dashboard">

            <p class="heading--4 dashboard__paragraph container__user">
                Welcome Admin!
            </p>

            <p class="paragraph--4 dashboard__heading container__title">
                DASHBOARD
            </p>

            <!--******************          CARDS           **********************-->

            <div class="dashboard__cards">

                <div class="dashboard__card dashboard__card--customers">

                    <div class="dashboard__card--flex">

                        <div class="dashboard__card--iconbox dashboard__card--customers__iconbox">
                            <div class="dashboard__card--icon dashboard__card--customers__icon">

                            </div>
                        </div>

                        <div class="dashboard__card--percentbox">
                            <div class="dashboard__card--arrow dashboard__card--arrow__down">

                            </div>
                            <p class="paragraph--1 dashboard__paragraph dashboard__card--customers__percent">
                                17%
                            </p>
                        </div>

                    </div>

                    <h4 class="heading--4 dashboard__paragraph dashboard__card--number">168</h4>
                    <p class="paragraph--3 dashboard__heading dashboard__card--title">Customers</p>

                    <div class="dashboard__card--loadpercentbox">
                        <div class="dashboard__card--customers__loadpercent"></div>
                    </div>

                </div>

                <div class="dashboard__card dashboard__card--products">

                    <div class="dashboard__card--flex">

                        <div class="dashboard__card--iconbox dashboard__card--products__iconbox">
                            <div class="dashboard__card--icon dashboard__card--products__icon">

                            </div>
                        </div>

                        <div class="dashboard__card--percentbox">
                            <div class="dashboard__card--arrow dashboard__card--arrow__up">

                            </div>
                            <p class="paragraph--1 dashboard__paragraph dashboard__card--products__percent">
                                17%
                            </p>
                        </div>

                    </div>

                    <h4 class="heading--4 dashboard__paragraph dashboard__card--number">21587</h4>
                    <p class="paragraph--3 dashboard__heading dashboard__card--title">Products</p>

                    <div class="dashboard__card--loadpercentbox">
                        <div class="dashboard__card--products__loadpercent"></div>
                    </div>

                </div>

                <div class="dashboard__card dashboard__card--sales">

                    <div class="dashboard__card--flex">

                        <div class="dashboard__card--iconbox dashboard__card--sales__iconbox">
                            <div class="dashboard__card--icon dashboard__card--sales__icon">

                            </div>
                        </div>

                        <div class="dashboard__card--percentbox">
                            <div class="dashboard__card--arrow dashboard__card--arrow__down">

                            </div>
                            <p class="paragraph--1 dashboard__paragraph dashboard__card--sales__percent">
                                17%
                            </p>
                        </div>

                    </div>

                    <h4 class="heading--4 dashboard__paragraph dashboard__card--number">$56485</h4>
                    <p class="paragraph--3 dashboard__heading dashboard__card--title">Sales</p>

                    <div class="dashboard__card--loadpercentbox">
                        <div class="dashboard__card--sales__loadpercent"></div>
                    </div>

                </div>

                <div class="dashboard__card dashboard__card--revenue">

                    <div class="dashboard__card--flex">

                        <div class="dashboard__card--iconbox dashboard__card--revenue__iconbox">
                            <div class="dashboard__card--icon dashboard__card--revenue__icon">

                            </div>
                        </div>

                        <div class="dashboard__card--percentbox">
                            <div class="dashboard__card--arrow dashboard__card--arrow__up">

                            </div>
                            <p class="paragraph--1 dashboard__paragraph dashboard__card--revenue__percent">
                                17%
                            </p>
                        </div>

                    </div>

                    <h4 class="heading--4 dashboard__paragraph dashboard__card--number">$62523</h4>
                    <p class="paragraph--3 dashboard__heading dashboard__card--title">Revenue</p>

                    <div class="dashboard__card--loadpercentbox">
                        <div class="dashboard__card--revenue__loadpercent"></div>
                    </div>

                </div>

            </div>

            <!--******************          CHARTS           **********************-->

            <div class="dashboard__charts">

                <div class="dashboard__chartbox">

                    <h5 class="dashboard__paragraph heading--5 dashboard__chartbox--heading">Sales Overview</h5>
                    <div class="dashboard__chart dashboard__chart--sales"></div>

                </div>

                <div class="dashboard__chartbox">

                    <h5 class="dashboard__paragraph heading--5 dashboard__chartbox--heading">Order Status</h5>
                    <div class="dashboard__chart dashboard__chart--orderstatus"></div>

                </div>

                <div class="dashboard__chartbox">

                    <h5 class="dashboard__paragraph heading--5 dashboard__chartbox--heading">Recent Orders</h5>
                    <div class="dashboard__chart dashboard__chart--recentorder">
                        <div class="dashboard__chart--recentorder__table">

                            <!--+++++++++++++++++++     ROW1     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Item</p>
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Date</p>
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--quantity">Quantity</p>
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--status">Status</p>
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--price">Price</p>
                            </div>

                            <!--+++++++++++++++++++     ROW2     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Apple Watch Series 4</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--item">26 May 2020</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--quantity">5</p>
                                <p class="paragraph--6 dashboard__paragraph dashboard__chart--recentorder__grid--status dashboard__chart--recentorder__grid--status__completed">Completed</p>
                                <p class="paragraph--2 dashboard__paragraph dashboard__chart--recentorder__grid--price">$487</p>
                            </div>

                            <!--+++++++++++++++++++     ROW3     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Apple Watch Series 4</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--item">26 May 2020</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--quantity">5</p>
                                <p class="paragraph--6 dashboard__paragraph dashboard__chart--recentorder__grid--status dashboard__chart--recentorder__grid--status__cancelled">Cancelled</p>
                                <p class="paragraph--2 dashboard__paragraph dashboard__chart--recentorder__grid--price">$487</p>
                            </div>

                            <!--+++++++++++++++++++     ROW4     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Apple Watch Series 4</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--item">26 May 2020</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--quantity">5</p>
                                <p class="paragraph--6 dashboard__paragraph dashboard__chart--recentorder__grid--status dashboard__chart--recentorder__grid--status__pending">Pending</p>
                                <p class="paragraph--2 dashboard__paragraph dashboard__chart--recentorder__grid--price">$487</p>
                            </div>

                            <!--+++++++++++++++++++     ROW5     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Apple Watch Series 4</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--item">26 May 2020</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--quantity">5</p>
                                <p class="paragraph--6 dashboard__paragraph dashboard__chart--recentorder__grid--status dashboard__chart--recentorder__grid--status__completed">Completed</p>
                                <p class="paragraph--2 dashboard__paragraph dashboard__chart--recentorder__grid--price">$487</p>
                            </div>

                            <!--+++++++++++++++++++     ROW6     ++++++++++++++++++++-->
                            <div class="dashboard__chart--recentorder__grid">
                                <p class="paragraph--3 dashboard__heading dashboard__chart--recentorder__grid--item">Apple Watch Series 4</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--item">26 May 2020</p>
                                <p class="paragraph--3 dashboard__paragraph dashboard__chart--recentorder__grid--quantity">5</p>
                                <p class="paragraph--6 dashboard__paragraph dashboard__chart--recentorder__grid--status dashboard__chart--recentorder__grid--status__pending">Pending</p>
                                <p class="paragraph--2 dashboard__paragraph dashboard__chart--recentorder__grid--price">$487</p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="dashboard__chartbox">

                    <h5 class="dashboard__paragraph heading--5 dashboard__chartbox--heading">Feed Activity</h5>
                    <div class="dashboard__chart dashboard__chart--feedactivity">
                        <div class="dashboard__chart--feedactivity__timeline">
                            <div class="dashboard__chart--feedactivity__timeline--left">
                                <div class="dashboard__chart--feedactivity__timeline--draw">
                                    <div class="dashboard__chart--feedactivity__timeline--dot"></div>
                                    <div class="dashboard__chart--feedactivity__timeline--line"></div>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--draw">
                                    <div class="dashboard__chart--feedactivity__timeline--dot"></div>
                                    <div class="dashboard__chart--feedactivity__timeline--line"></div>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--draw">
                                    <div class="dashboard__chart--feedactivity__timeline--dot"></div>
                                    <div class="dashboard__chart--feedactivity__timeline--line"></div>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--draw">
                                    <div class="dashboard__chart--feedactivity__timeline--dot"></div>
                                    <div class="dashboard__chart--feedactivity__timeline--line"></div>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--draw">
                                    <div class="dashboard__chart--feedactivity__timeline--dot"></div>
                                    <div class="dashboard__chart--feedactivity__timeline--line"></div>
                                </div>
                            </div>
                            <div class="dashboard__chart--feedactivity__timeline--right">
                                <div class="dashboard__chart--feedactivity__timeline--box">
                                    <p class="paragraph--4 dashboard__paragraph dashboard__chart--feedactivity__timeline--date">MAY 26</p>
                                    <p class="paragraph--3 dashboard__paragraph dashboard__chart--feedactivity__timeline--feed">
                                        <span class="dashboard__heading">John Doe</span> added a new product <span class="dashboard__heading">"Smart Watch"</span>
                                    </p>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--box">
                                    <p class="paragraph--4 dashboard__paragraph dashboard__chart--feedactivity__timeline--date">MAY 26</p>
                                    <p class="paragraph--3 dashboard__paragraph dashboard__chart--feedactivity__timeline--feed">
                                        <span class="dashboard__heading">John Doe</span> added a new product <span class="dashboard__heading">"Smart Watch"</span>
                                    </p>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--box">
                                    <p class="paragraph--4 dashboard__paragraph dashboard__chart--feedactivity__timeline--date">MAY 26</p>
                                    <p class="paragraph--3 dashboard__paragraph dashboard__chart--feedactivity__timeline--feed">
                                        <span class="dashboard__heading">John Doe</span> added a new product <span class="dashboard__heading">"Smart Watch"</span>
                                    </p>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--box">
                                    <p class="paragraph--4 dashboard__paragraph dashboard__chart--feedactivity__timeline--date">MAY 26</p>
                                    <p class="paragraph--3 dashboard__paragraph dashboard__chart--feedactivity__timeline--feed">
                                        <span class="dashboard__heading">John Doe</span> added a new product <span class="dashboard__heading">"Smart Watch"</span>
                                    </p>
                                </div>
                                <div class="dashboard__chart--feedactivity__timeline--box">
                                    <p class="paragraph--4 dashboard__paragraph dashboard__chart--feedactivity__timeline--date">MAY 26</p>
                                    <p class="paragraph--3 dashboard__paragraph dashboard__chart--feedactivity__timeline--feed">
                                        <span class="dashboard__heading">John Doe</span> added a new product <span class="dashboard__heading">"Smart Watch"</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!--:::::::::::::::::::::::         ECOMMERCE           :::::::::::::::::::::::::::-->

        <div class="ecommerce">

            <!--******************          PRODUCTS            **********************-->

            <div class="products">

            </div>

            <!--******************          ADD PRODUCT         **********************-->

            <div class="addProduct">

                <p class="heading--4 dashboard__paragraph container__user">
                    Welcome Admin!
                </p>
    
                <p class="paragraph--4 dashboard__heading container__title" id="addProductUI">
                    ADD PRODUCT
                </p>

                <form action="#" class="addProduct__form">
                    <input type="text" id="addProductName" placeholder="Enter Product Name" class="addProduct__text addProduct__name">
                    <p class="paragraph--5 dashboard__paragraph addProduct__title">Select Category</p>
                    <select id="addProductSelectCategory" class="addProduct__selectBox">
                        <option value="default" disabled>&nbsp;</option>
                    </select>
        
                    <textarea id="addProductDetails" class="addProduct__text addProduct__textarea" placeholder="Enter Description"></textarea>

                    <p class="paragraph--5 dashboard__paragraph addProduct__title">Add Images</p>
                    <input type="file" id="addProductSelectImages" multiple>
                    <div class="addProduct__images">
                        <!-- <img src="#" alt="" class="addProduct__image"> -->
                    </div>
                    <div class="addProduct__attributeBox">
                        <p class="paragraph--5 dashboard__paragraph addProduct__title">Select Attributes</p>
                        <select class="addProduct__selectBox addProduct__attributesSelect">
                            <option value="default" disabled>&nbsp;</option>
                        </select>
                        <button class="addProduct__button" id="addProductAddAttribute">Add Attribute</button>

                        <table class="addProduct__attributeTable">
                            <thead>
                                <!-- <th>Attribute 1</th> -->
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Selling Price</th>
                                <th>Active</th>
                            </thead>
                            <tbody>
                                <!-- <td>Value 1</td> -->
                                <td><input type="number" class="addProduct__text addProduct__stockBox"></td>
                                <td><input type="number" class="addProduct__text addProduct__priceBox"></td>
                                <td><input type="number" class="addProduct__text addProduct__sellingPriceBox"></td>
                                <td><input type="checkbox" class="addProduct__radio addProduct__actives"></td>
                            </tbody>
                        </table>

                    </div>
                    <div class="addProduct__noAttributeBox">
                        <input type="number" step="0.0000001" id="addProductStock" class="addProduct__text" placeholder="Stock">
                        <input type="number" step="0.0000001" id="addProductPrice" class="addProduct__text" placeholder="M.R.P">
                        <input type="number" step="0.0000001" id="addProductSalesPrice" class="addProduct__text" placeholder="Sales Price">
                        <label for="addProductActive">Active</label>
                        <input type="checkbox" id="addProductActive" class="addProduct__checkbox">
                    </div>
                    <p class="paragraph--5 dashboard__paragraph addProduct__title">Select Tax</p>
                    <select id="addProductSelectTax" class="addProduct__selectBox">
                        <option value="default" disabled>&nbsp;</option>
                    </select>
                    <br>
                    <button type="submit" class="addProduct__button addProduct__submit" id="addProductButton">Add Product</button>
                    
                </form>


            </div>

            <!--******************          CATEGORIES          **********************-->

            <div class="categories">

                <p class="heading--4 dashboard__paragraph container__user">
                    Welcome Admin!
                </p>
    
                <p class="paragraph--4 dashboard__heading container__title" id="categoryUI">
                    Categories
                </p>

                <div class="categories__container">

                    <h4 class="heading--4 dashboard__paragraph categories__add--heading">Add Category</h4>
                    <!--+++++++++++++++++++     ADD CATEGORY     ++++++++++++++++++++-->
                    <form action="#" class="categories__add" id="addCategoryForm" style="display: block;">
                        <div class="categories__button--close"></div>
                        <input type="text" id="addCategoryName" placeholder="Add Category Name" class="categories__text" required>
                        <p class="paragraph--6 dashboard__paragraph">No special characters are allowed.</p>
                        <textarea id="addCategoryDescription" class="categories__textarea" placeholder="Description" required></textarea>
                        <input type="text" id="addCategorySlug" placeholder="Add Category Slug" class="categories__text" required>
                        <p class="paragraph--6 dashboard__paragraph">This slug is used as the url for the category page. And only '_' special character and entered test must be lower case.<br>Length Must be less than 25 characters and greater than 2 characters.</p>
                        <input type="file" id="addCategoryImageChooser" required class="categories__filechooser">
                        <p class="paragraph--6 dashboard__paragraph">Image dimensions must be of width = '1080' and height = '300'.</p>
                        <img src="#" id="addCategoryImageDisplay" alt="" class="categories__image">
                        <button class="categories__button pagagraph--1 dashboard__paragraph" id="addCategoryButton">Add Category</button>
                    </form>
                    <!--+++++++++++++++++++     CATEGORY TABLE     ++++++++++++++++++++-->
                    <table class="categories__table">
                        <thead>
                            <tr>
                                <td >ID</td>
                                <td>NAME</td>
                                <td>DESCRIPTION</td>
                                <td>PRODUCTS</td>
                                <td>FUNCTION</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                    <!--+++++++++++++++++++     EDIT CATEGORY     ++++++++++++++++++++-->

                    <div class="categories__edit">
                        <div class="categories__button--close"></div>
                        <input type="text" id="editCategoryName" placeholder="Edit Category Name" class="categories__text" required>
                        <p class="paragraph--6 dashboard__paragraph">No special characters are allowed.</p>
                        <textarea id="editCategoryDescription" class="categories__textarea" placeholder="Description" required></textarea>
                        <input type="text" id="editCategorySlug" placeholder="Edit Category Slug" class="categories__text" required>
                        <p class="paragraph--6 dashboard__paragraph">This slug is used as the url for the category page. And only '_' special character and entered test must be lower case.<br>Length Must be less than 25 characters and greater than 2 characters.</p>
                        <input type="file" id="editCategoryImageChooser" required class="categories__filechooser">
                        <p class="paragraph--6 dashboard__paragraph">Image dimensions must be of width = '1080' and height = '300'.</p>
                        <img src="#" id="editCategoryImageDisplay" alt="" class="categories__image">
                        <button class="categories__button pagagraph--1 dashboard__paragraph" id="editCategoryButton">Edit Category</button>
                    </div>
                    
                </div>


            </div>

            <!--******************          CHARTS          **********************-->

            <div class="charts">
            </div>

            <!--******************          ATTRIBUTES          **********************--> 

            <div class="attributes">
                <p class="heading--4 dashboard__paragraph container__user">
                    Welcome Admin!
                </p>
    
                <p class="paragraph--4 dashboard__heading container__title" id="attributesUI">
                    Attributes
                </p>

                <h4 class="heading--4 attributes__heading attributes__top--heading dashboard__paragraph">
                    Add Attribute
                </h4>

                <form action="#" class="attributes__form">
                
                    <input type="text" id="addAttributeName" class="attributes__textbox" placeholder="Attribute Name">
                    <input type="text" id="addAttributeDisplay" class="attributes__textbox" placeholder="Display Name">
                    <input type="text" class="attributes__value attributes__textbox" placeholder="Attribute Value">
                    <button class="attributes__addValue attributes__button dashboard__paragraph">Add Value</button>
                    <button class="attributes__saveAttribute attributes__button dashboard__paragraph">SAVE</button>

                </form>

                <table class="attributes__table">
                
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Attribute Name</th>
                            <th>Display Name</th>
                            <th>Function</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ABCD</td>
                            <td>ABCD</td>
                            <td>
                                <span class="attributes__table--function attributes__table--edit">EDIT</span>
                                <span class="attributes__table--function attributes__table--delete">DELETE</span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ABCD</td>
                            <td>ABCD</td>
                            <td>
                                <span class="attributes__table--function attributes__table--edit">EDIT</span>
                                <span class="attributes__table--function attributes__table--delete">DELETE</span>
                            </td>
                        </tr>
                    </tbody>
                
                </table>

            </div>           

        </div>

    </div>
    <script src="js/sidebar.js"></script>
    <script src="js/globalVariables.js"></script>
    <script src="js/categoryVariables.js"></script>
    <script src="js/attributeVariables.js"></script>
    <script src="js/productVariables.js"></script>
    <script src="js/categoriesTable.js"></script>
    <script src="js/addCategory.js"></script>
    <script src="js/editCategory.js"></script>
    <script src="js/addAttribute.js"></script>
    <script src="js/addProduct.js"></script>
    <script src="js/test.js"></script>

</body>
</html>