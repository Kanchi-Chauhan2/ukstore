<?php
    include '../../php/db.php';

    if($_POST){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $type = 'customer';
        $name = $firstName.' '.$lastName;
        $dob = '';
        $gender = '';
        $phone = '';
        $image = '';
        $addresses = '';
        $cards = '';
        $orders = '';
        $cart = '';
        $wishlist = '';
        $date = date("Y-m-d");
        $time = date("h:i:s");
        $tockenID = rand();
        //echo $tockenID;
        
        $query = "INSERT INTO `users`(`tockenID`, `type`, `name`, `dob`, `gender`, `email`, `password`, `phone`, `image`, `addresses`, `cards`, `orders`, `cart`, `wishlist`, `time`, `date`) VALUES ($tockenID,'$type','$name','$dob','$gender','$email','$password','$phone','$image','$addresses','$cards','$orders','$cart','$wishlist','$time','$date')";
        $query_exec = mysqli_query($conn,$query);

        header('Location: ../login.php?account=created');       

    }
  
?>