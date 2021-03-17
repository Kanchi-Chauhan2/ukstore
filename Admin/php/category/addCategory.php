<?php
    include '../../../php/db.php';

    $return_array = array();

    //----------------------------QUERY FOR SELECTING GLOBAL ID-------------------------------

    $query = "select globalId from `meta_numbersdata` where id = 1";
    $query_exec = mysqli_query( $conn, $query );

    $globalId = 0;

    while( $row = mysqli_fetch_array($query_exec) ){
        $globalId = $row['globalId'];
    }

    if( $_POST ){

        $globalId++;
        $name = $_POST['name'];
        $subCategories = '';
        $image = $_POST['image'];
        $products = '';
        $detail = $_POST['description'];
        $totalProducts = 0;
        $parentCategory = $_POST['parentCategory'];
        $slug = $_POST['slug'];

        //------------------------------------------INSERT QUERY FOR CATEGORY-----------------------------------------

        $query = "INSERT INTO `categories`( `globalId`, `name`,`parentCategory`, `subCategories`, `images`, `products`, `detail`, `totalProducts`, `slug`)
                    VALUES ('$globalId','$name','$parentCategory','$subCategories','$image','$products','$detail','$totalProducts','$slug')";
        $query_exec = mysqli_query( $conn, $query );
        if( $query_exec == 1 ){

            $typeId = mysqli_insert_id($conn);
            $typeName = $name;
            $typeTable = 'categories';

            //-----------------------------------------INSERT QUERY FOR META VARIABLES---------------------------------

            $meta_query = "INSERT INTO `meta_variables`(`typeId`, `typeName`, `typeTable`) VALUES ('$typeId','$typeName','$typeTable')";
            $meta_query_exec = mysqli_query( $conn, $meta_query );

            if($meta_query_exec == 1){

                //--------------------------------------UPDATE QUERY FOR PARENT VARIABLES------------------------------

                $query = "UPDATE `meta_numbersdata` SET `globalId`='$globalId' WHERE id=1";
                $query_exec = mysqli_query($conn,$query);

                if( $query_exec == 1 ){
                    $return_array[] = "Success";
                    $return_array[] = $typeId;
                }else{
                    $return_array[] = "Failed";
                }

            }else{
                $return_array[] = "Failed";
            }

        }else{
            $return_array[] = "Failed";
        }

    }else{
        $return_array[] = "0";
    }

    echo json_encode($return_array);

?>