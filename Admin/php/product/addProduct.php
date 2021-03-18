<?php
    include '../../../php/db.php';
    include '../stringToArray.php';
    $returnedArray = array();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $time = date("h:i:s");

    if( $_POST ){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $detail = $_POST['detail'];
        $images = $_POST['images'];
        $attributes = $_POST['attributes'];
        $stock = $_POST['stock'];
        $prices = $_POST['prices'];
        $sellingPrices = $_POST['sellingPrices'];
        $actives = $_POST['actives'];
        $taxID = $_POST['taxID'];

        $int_smallPrice = getSmallestNumber( $sellingPrices );
        $int_largePrice = getLargestNumber( $sellingPrices );

        $globalID = 0;

        //---------------------------------------GET GLOBAL ID-------------------------------------------
        $query = "SELECT `globalId` FROM `meta_numbersdata` WHERE id=1";
        $query_exec = mysqli_query( $conn, $query );

        while( $row = mysqli_fetch_array($query_exec) ){
            $globalID = $row['globalId'];
        }
        $globalID++;

        //-------------------------------------Add Product-----------------------------------------------

        $query = "INSERT INTO `products`( `globalId`, `name`, `detail`, `categories`, `images`, `attributes`, `prices`, `sellingPrices`, `int_largePrice`, `int_smallPrice`, `stock`, `taxid`, `actives`, `time`, `date`) VALUES ('$globalID','$name','$detail','$category','$images','$attributes','$prices','$sellingPrices','$int_largePrice','$int_smallPrice','$stock','$taxID','$actives','$time','$date')";
        //echo $query;
        $query_exec = mysqli_query( $conn, $query );
        
        if( $query_exec == 1 ){
            //---------------------------------Product Added Successfully-------------------------------
            //---------------------------------Now Update All Parent Categories-------------------------
            $productID = mysqli_insert_id($conn);
            $updateParentCategories = updateCategory($conn,$category,$productID);

            if( $updateParentCategories == true ){
                //-----------------------------Insert Meta Variables-----------------------------------
                $query = "INSERT INTO `meta_variables`(`typeId`, `typeName`, `typeTable`) VALUES ('$productID','$name','products')";
                $query_exec = mysqli_query( $conn, $query );
                
                if( $query_exec == 1 ){
                    //-----------------------------Insert Meta Numbers Data-----------------------------------
                    $query = "UPDATE `meta_numbersdata` SET `globalId`='$globalID' WHERE id=1";
                    $query_exec = mysqli_query($conn,$query);

                    if( $query_exec == 1 ){
                        $returnedArray[] = 'Successful';
                    }else{
                        $returnedArray[] = 'Error1';
                    }

                }else{
                    $returnedArray[] = 'Error2';
                }

            }else{
                $returnedArray[] = 'Error3';
            }

        }else{
            $returnedArray[] = "Failed4";
        }

    }

    function updateCategory( $connection ,$currentCategory, $productID ){
        if( $currentCategory == 0 ){
            return true;
        }else{
            //---------------------------GETTING Values From Current Category---------------------------

            $parentCategory = 0;
            $products = '';
            $totalProducts = 0;

            $query = "SELECT `parentCategory`, `products`, `totalProducts` FROM `categories` WHERE id='$currentCategory'";
            $query_exec = mysqli_query($connection,$query);

            while( $row = mysqli_fetch_array($query_exec) ){
                $parentCategory = $row['parentCategory'];
                $products = $row['products'];
                $totalProducts = $row['totalProducts'];
            }

            if( strlen($products) == 0 ){
                $products = $productID;
            }else{
                $products = $products.','.$productID;
            }

            $totalProducts++;

            $query = "UPDATE `categories` SET `products`='$products',`totalProducts`='$totalProducts' WHERE id=$currentCategory";
            $query_exec = mysqli_query( $connection, $query );

            if( $query_exec == 1 ){
                return updateCategory($connection,$parentCategory,$productID);
            }else{
                return false;
            }

        }
    }

    function getLargestNumber( $arr ){
        $dataArray = getArrayFromString($arr,',');
        $largestNumber = 0;

        for ($i=0; $i < sizeof($dataArray) ; $i++) { 
            if( $dataArray[$i] > $largestNumber ){
                $largestNumber = $dataArray[$i];
            }
        }
        return $largestNumber;
    }

    function getSmallestNumber( $arr ){
        $dataArray = getArrayFromString($arr,',');
        $smallestNumber = 999999;

        for ($i=0; $i < sizeof($dataArray) ; $i++) { 
            if( $dataArray[$i] < $smallestNumber ){
                $smallestNumber = $dataArray[$i];
            }
        }

        return $smallestNumber;

    }

    echo json_encode($returnedArray);

?>