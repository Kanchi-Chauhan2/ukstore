<?php
    include '../../php/db.php';

    if( isset($_POST['sid']) ){
        $sid = $_POST['sid'];
        $query = "SELECT `cost` FROM `shipping` WHERE sid = '$sid'";
        $query_exec = mysqli_query($conn,$query);
        $cost = 0;

        while( $row = mysqli_fetch_array($query_exec) ){
            $cost = $row['cost'];
        }

        echo $cost;

    }else{
        echo -1;
    }


?>