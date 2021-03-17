<?php
    include '../../../php/db.php';

    $returnArray = array();
    $categoryID = 0;
    $categoryName = '';
    $categoryDetail = '';
    $categorySlug = '';
    $categoryImage = '';
    if( $_POST ){
        $categoryID = $_POST['categoryID'];
        $query = "SELECT `name` , `images`, `detail`, `slug` FROM `categories` WHERE id='$categoryID'";
        $query_exec = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array($query_exec) ){
            $categoryName = $row['name'];
            $categoryDetail = $row['detail'];
            $categorySlug = $row['slug'];
            $categoryImage = $row['images'];
        }

        $returnArray = array(
            'name' => $categoryName,
            'detail' => $categoryDetail,
            'slug' => $categorySlug,
            'image' => $categoryImage
        );

    }else{
        $returnArray[] = 'Error';
    }

    echo json_encode($returnArray);

?>