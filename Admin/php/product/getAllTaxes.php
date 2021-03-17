<?php
    include '../../../php/db.php';

    $returnArray = array();

    $query = 'SELECT `id`, `name`, `value` FROM `taxes`';
    $query_exec = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_array($query_exec) ){
        $returnArray[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'value' => $row['value']
        );
    }

    echo json_encode($returnArray);

?>