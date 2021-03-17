<?php
    include '../../../php/db.php';
    $returnArray = array();
    $globalId = 0;
    if( $_POST ){
        $name = $_POST['name'];

        $displayNAME = $_POST['displayName'];
        $attributes = $_POST['attributes'];

        //----------------------SELECT QUERY FOR GLOBAL ID-------------------------------

        $globalIDquery = 'select globalId from `meta_numbersdata` where id = 1';
        $globalIDquery_exec = mysqli_query( $conn, $globalIDquery );

        while( $row = mysqli_fetch_array( $globalIDquery_exec ) ){
            $globalId = $row['globalId'];
        }

        $globalId++;

        //--------------------------------------INSERT QUERY FOR ATTRIBUTES----------------------------------

        $query = "INSERT INTO `attributes`(`globalId`, `name`, `displayName`, `attValues`) VALUES ('$globalId','$name','$displayNAME','$attributes')";
        $query_exec = mysqli_query( $conn, $query );
        
        if( $query_exec == 1 ){

            $typeId = mysqli_insert_id($conn);
            $typeName = $name;
            $typeTable = 'attributes';

            //-----------------------------------------INSERT QUERY FOR META VARIABLES---------------------------------

            $meta_query = "INSERT INTO `meta_variables`(`typeId`, `typeName`, `typeTable`) VALUES ('$typeId','$typeName','$typeTable')";
            $meta_query_exec = mysqli_query( $conn, $meta_query );

            if($meta_query_exec == 1){

                //--------------------------------------UPDATE QUERY FOR PARENT VARIABLES------------------------------

                $query = "UPDATE `meta_numbersdata` SET `globalId`='$globalId' WHERE id=1";
                $query_exec = mysqli_query($conn,$query);

                if( $query_exec == 1 ){
                    $returnArray[] = "Success";
                }else{
                    $returnArray[] = "Failed1";
                }

            }else{
                $returnArray[] = "Failed2";
            }

        }else{
            $returnArray[] = "Failed3";
        }

    }else{
        $returnArray[] = "Failed4";
    }

    echo json_encode($returnArray);

?>
