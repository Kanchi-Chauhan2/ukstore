<?php
    include 'db.php';
    include 'string_to_array.php';

    $floatPrices = array();
    $intPrices = array();

    $query = 'SELECT `sellingPrices` FROM `products`';
    $query_exec = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_array( $query_exec ) ){
        $temp = $row['sellingPrices'];
        $floatPrices[] = getArrayFromString( $temp, ',' );
    }

    foreach( $floatPrices as $arr ){
        if( sizeof($arr) === 1 ){
            $intPrices[] = intval($arr[0]);
        }else{
            $intPrices[] = intval($arr[0]);
        }
    }

    for( $i = 1 ; $i <= sizeof($intPrices) ; $i++ ){
        $intVal = $intPrices[$i-1];
        $query = "UPDATE `products` SET `int_largePrice`='$intVal' WHERE id='$i'";
        $query_exec = mysqli_query( $conn, $query );
        echo $query_exec.'<br>';
    }

?>