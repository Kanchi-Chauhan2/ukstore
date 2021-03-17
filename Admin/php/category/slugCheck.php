<?php
    include "../../../php/db.php";
    $match = false;
    if( $_POST ){
        $query = "select slug from categories where parentCategory='".$_POST['parentCategory']."'";
        $query_exec = mysqli_query( $conn , $query );

        while( $row = mysqli_fetch_array( $query_exec ) ){
            if( $row['slug'] == $_POST['slugCheck'] ){
                $match = true;
            }
        }
    }

    if( !$match ){
        echo json_encode('accepted');
    }else{
        json_encode( 'rejected' );
    }

?>