<?php

    include '../../../php/db.php';
    $returnArray = array();

    if( $_POST ){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $image = $_POST['image'];
        $detail = $_POST['detail'];
        $query = "UPDATE `categories` SET `name`='$name',`images`='$image',`slug`='$slug',`detail`='$detail' where id='$id'";
        $query_exec = mysqli_query( $conn, $query );

        if( $query_exec == 1 ){
            $returnArray[] = 'successful';
        }else{
            $returnArray[] = 'error';
        }

    }
    echo json_encode($returnArray);
?>
