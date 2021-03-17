<?php
    include 'db.php';
    include 'string_to_array.php';
    $returnArray = array();

    if( isset( $_COOKIE['bodycountersUser'] ) ){
        $userID = json_decode($_COOKIE['bodycountersUser'])->id;
        $query = "SELECT `cart` FROM `users` WHERE id='$userID'";
        $query_exec = mysqli_query($conn,$query);
        $cart_string = '';
        $cart_decoded = '';

        while( $row = mysqli_fetch_array($query_exec) ){
            $cart_string = $row['cart'];
        }

        $cart_decoded = json_decode($cart_string,true);
        
        for( $i=0; $i<sizeof($cart_decoded) ;$i++ ){
            $returnArray[] = $cart_decoded[$i];
        }

    }else{
        $returnArray = 0;
    }

    echo json_encode($returnArray);

?>