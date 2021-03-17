<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="contact-container">
        <div class="heading__all">
            <h1>CONTACT</h1>
        </div>
            <div class="contact-flex-container">
            <div class="contact-phone">
            <img src="../images/1.png" alt="phone" class="contact-img">
            <div class="headding">PHONE</div>
            <div class="headding_content">02088577999</div>
            </div>
            <div class="contact-email">
            <img src="../images/2.png" alt="email" class="contact-img">
            <div class="headding">E-MAIL</div>
            <div class="headding_content">info@bodycontours.co.uk</div>
            </div>
            <div class="contact-address">
            <img src="../images/3.png" alt="address" class="contact-img">
            <div class="headding">ADDRESS</div>
            <div class="headding_content">BodyContours, London, <br>United Kingdom</div>
            </div>
        </div>
        <div class="contact-form-container">
        <div class="heading__form">
            <h2>CONTACT FORM</h2>
        </div>
            <div class="contact-form">
                <form>
                    <input type="text" id="ContactFormName" name="contact[name]" placeholder="Name" autocapitalize="words" value>
                    <input type="email" id="ContactFormEmail" name="contact[email]" placeholder="Email" autocapitalize="words" value>
                    <input type="text" id="ContactFormSub" name="contact[subject]" placeholder="Subject" autocapitalize="words" value>
                    <textarea rows="7" id="ContactFormMessage" name="contact[body]" placeholder="Message"></textarea>
                    <button class="submit" class="btn">SEND</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>