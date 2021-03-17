<?php

    include '../../../php/db.php';
    $return_array = array();

    if($_POST){
        $super = $_POST['super'];
        $sub = $_POST['sub'];

        $super_subCategories = '';

        $query = "SELECT `subCategories` FROM `categories` WHERE id='$super'";
        $query_exec = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array( $query_exec ) ){
            $super_subCategories = $row;
        }

        if ( $super_subCategories == '' ){
            $super_subCategories = ""+$sub;
        }else{
            $super_subCategories = $super_subCategories.','.$sub;
        }

        $query = "UPDATE `categories` SET `subCategories`='$super_subCategories' WHERE id='$super'";
        $query_exec = mysqli_fetch_array($conn,$query);

        if ( $query_exec == 1 ){
            $return_array[] = 'Success';
        }else{
            $return_array[] = 'Failed';
        }

    }else{
        $return_array[] = 'Error';
    }

    echo json_encode($return_array);

?>
