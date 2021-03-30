<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>

<!--------------------------ORDER--------------------------->

<div class="profile-container">
<div class="profile-container__options"> 
    <div class="profile-container__options--1">
        <a href="#">My Profile</a>
    </div>
    <div class="profile-container__options--2">
        <a href="#">Order</a>
    </div>
    </div>

    <div class="profile-container__order">
    <div class="profile-container__order--orderlist">
        <div class="profile-container__order--orderlist profile-container__order--orderlist--1">
            <img src="../images/insta-5.jpg" class="order-image"/>
        </div>    
        <div class="profile-container__order--orderlist profile-container__order--orderlist--2">
            <p>info about the product</p>
        </div>    
        <div class="profile-container__order--orderlist profile-container__order--orderlist--3">
            <p>price</p>
        </div> 
        <div class="profile-container__order--orderlist profile-container__order--orderlist--3">
            <p>delivery info</p>
        </div>            
    </div>
    <div class="profile-container__order--orderlist">
        <div class="profile-container__order--orderlist profile-container__order--orderlist--1">
            <img src="../images/insta-5.jpg" class="order-image"/>
        </div>    
        <div class="profile-container__order--orderlist profile-container__order--orderlist--2">
            <p>info about the product</p>
        </div>    
        <div class="profile-container__order--orderlist profile-container__order--orderlist--3">
            <p>price</p>
        </div> 
        <div class="profile-container__order--orderlist profile-container__order--orderlist--3">
            <p>delivery info</p>
        </div>            
    </div>
</div>
</div>

    <!-----------------------personal info---------------------->


    <div class="profile-container">

    <div class="profile-container__options"> 
    <div class="profile-container__options--1">
        <a href="#">My Profile</a>
    </div>
    <div class="profile-container__options--2">
        <a href="#">Order</a>
    </div>
    </div>
    <div class="profile-container__details">
                <form class="profile-container__details--1">
                    <h1>Personal  Information</h1>
                    <label class="labell">Name</label>
                    <input type="text" class="inputt" name="contact[name]" autocapitalize="words" value>
                    <label class="labell">E-mail Address</label>
                    <input type="email" class="inputt" name="contact[email]" autocapitalize="words" value>
                    <label class="labell">Mobile Number</label>
                    <input type="text" class="inputt" name="contact[subject]" autocapitalize="words" value>
                </form>
    </div>
    </div>
</body>
</html>
