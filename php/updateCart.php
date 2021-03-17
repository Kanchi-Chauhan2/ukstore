<?php
    include 'db.php';
    include 'string_to_array.php';

    if( isset($_COOKIE['bodycountersUser']) ){
        $receivedDATA = file_get_contents('php://input');
        $products = json_decode($receivedDATA,true);
        $userID = json_decode($_COOKIE['bodycountersUser'])->id;
        $newProducts = array();
        
        for( $i=0 ; $i<sizeof($products) ; $i++ ){
            $p = $products[$i];
            if( $p['quantity'] <= 0 ){
                
            }else{
                $newProducts[] = $products[$i];
            }
        }
        $newProductsJSON = json_encode($newProducts);
        $query = "UPDATE `users` SET `cart`='$newProductsJSON' WHERE id='$userID'";
        $query_exec = mysqli_query($conn,$query);

        echo $query_exec;

    }else{
        echo 0;
    }

?>