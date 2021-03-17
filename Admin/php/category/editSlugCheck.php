<?php
    include '../../../php/db.php';
    $returnArray = array();
    $parentID = 0;
    $slug = '';
    $flag = -2;
    if( $_POST ){
        $parentID = $_POST['parentID'];
        $slug = $_POST['slug'];
        $categoryID = $_POST['categoryID'];
        $query = "select `id`, `slug` FROM `categories` WHERE parentCategory='$parentID'";
        $query_exec = mysqli_query($conn,$query);
        $flag = 0;
        while( $row = mysqli_fetch_array($query_exec) ){
            if( $row['slug'] == $slug ){
                if( $row['id'] == $categoryID ){
                    $flag = 1;
                }else{
                    $flag = -1;
                }
            }
        }
    }

    if( $flag >= 0 ){
        $returnArray[] = 'accepted';
    }else{
        $returnArray[] = 'rejected';
    }

    echo json_encode($returnArray);

?>