<?php
    $file_path_prefix = 'http://localhost/ukstore/images/';
    include 'db.php';
    $returnArray = array();

    $query = 'select images from meta_numbersdata where id = 1';
    $query_exec = mysqli_query( $conn , $query );
    $currentImage = 0;

    while( $row = mysqli_fetch_array($query_exec) ){
        $currentImage = $row['images'];
    }

    if( $_FILES['myFiles']['tmp_name'] != '' ){
        foreach ( $_FILES['myFiles']['tmp_name'] as $key => $value ){
            $currentImage++;
            $str = "".$_FILES['myFiles']['name'][$key];
            $ext = pathinfo( $_FILES["myFiles"]["name"][$key], PATHINFO_EXTENSION );
            $targetPath = "../images/".$currentImage.'.'.$ext;
            $tempPath = $file_path_prefix.$currentImage.'.'.$ext;

            move_uploaded_file($value,$targetPath);

            $query = "INSERT INTO `cdn_images`(`path`) VALUES ('$tempPath') ";
            $query_exec = mysqli_query( $conn , $query );

            if( $query_exec == 1 ){
                $returnArray[] = $tempPath;
            }else{

            }
        }
    }else{

    }
    $query = "UPDATE `meta_numbersdata` SET `images`=".$currentImage." WHERE id=1";
    $query_exec = mysqli_query( $conn , $query );

    if( sizeof($returnArray) > 0 ){
        echo json_encode($returnArray);
    }else{
        echo json_encode(array('Error'));
    }



//    $query = 'select images from meta_numbersdata';
//    $query_exec = mysqli_query( $conn , $query );
//
//    $current_image_index = 0;
//
//    while( $row = mysqli_fetch_array( $query_exec ) ){
//        $current_image_index = $row[0];
//    }
//
//    $query = "UPDATE `meta_numbersdata` SET `images`=".($current_image_index+1)." WHERE id = 1";
//    $query_exec = mysqli_query( $conn , $query );

?>
