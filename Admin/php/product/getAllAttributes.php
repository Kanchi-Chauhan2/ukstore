<?php
    include '../../../php/db.php';
    include '../stringToArray.php';

    $returnArray = array();

    $query = 'SELECT `id`, `name`, `attValues` FROM `attributes`';
    $query_exec = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_array( $query_exec ) ){
        $id = $row['id'];
        $name = $row['name'];
        $str_values = $row['attValues'];
        $arr_values = array();

        $arr_values = getArrayFromString( $str_values, ',' );

        $returnArray[] = array( 
            'id' => $id,
            'name' => $name,
            'values' => $arr_values
        );

    }

    echo json_encode($returnArray);

?>