<?php

    include '../../php/db.php';

    $returnDATA = 0;
    if( isset($_POST['userID']) ){
        $type = $_POST['type'];
        $userID = $_POST['userID'];
        $cart = array();
        $product = '';

        //------------------------------MAKING PRODUCT---------------------------

        if( $type == 'single' ){
            //--------------------SINGLE PRODUCT---------------------------------
            $id = $_POST['id'];
            $name  = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $quantity =  $_POST['quantity'];

            $product = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'quantity' => $quantity,
                'type' => $type
            );

        }else{
            //--------------------VARIABLE PRODUCT---------------------------------
            $id = $_POST['id'];
            $name  = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $quantity =  $_POST['quantity'];

            $attributeID = $_POST['attributeID'];
            $attributeName = $_POST['attributeName'];
            $attributeIndex = $_POST['attributeIndex'];
            $attributeValue = $_POST['attributeValue'];

            $product = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'quantity' => $quantity,
                'type' => $type,
                'attributeID' => $attributeID,
                'attributeName' => $attributeName,
                'attributeIndex' => $attributeIndex,
                'attributeValue' => $attributeValue
            );

        }

        $query = "SELECT `cart` FROM `users` WHERE id='$userID'";
        $query_exec = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array($query_exec) ){
            if( $row['cart'] === '' ){
                
            }else{
                $cart = json_decode($row['cart'],true);
            }
        }
        $cart[] = $product;
        $tempCart = json_encode($cart);

        $query = "UPDATE `users` SET `cart`='$tempCart' WHERE id='$userID'";
        $query_exec = mysqli_query( $conn,$query );

        if( $query_exec == 1 ){
            echo 1;     //Product Successfully Added
        }else{
            echo 0;     //Product Not Added
        }

    }else{
        echo -1;        //Product Not Found
    }
?>