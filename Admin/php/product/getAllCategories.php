<?php
    include '../../../php/db.php';

    $returnArray = array();

    $query = 'SELECT `id`,`slug` FROM `categories`';
    $query_exec = mysqli_query( $conn, $query );

    while( $row = mysqli_fetch_array($query_exec) ){
        $returnArray[] = array(
            'id' => $row['id'],
            'slug' => $row['slug']
        );
    }

    echo json_encode($returnArray);

?>