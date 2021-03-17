<?php
    include '../../php/db.php';

    $returnArray = array();

    if( isset($_POST['email']) ){
        $email = $_POST['email'];
        $password = 'temp';
        $query = "SELECT `password` FROM `users` WHERE email='$email'";
        $query_exec = mysqli_query( $conn, $query );
        
        while( $row = mysqli_fetch_array($query_exec) ){
            $password = $row['password'];
        }

        if( $password === 'temp' ){
            $returnArray = -1;
        }else{
            
            //$returnArray = 1;

            //---------------------Mail Sending-------------------

            $to = $email;
            $subject = 'Password of Email Counters';
            $message = "Hello '$email' your password of bodycounters.org is '$password'";
            $headers = 'From: technical@bodycounters.org';

            if( mail($to,$subject,$message,$headers) ){
                $returnArray = 1;
            }else{
                $returnArray = 0;
            }

        }

    }else{
        $returnArray = 0;
    }

    // 0 for technical error
    // 1 for successful
    // -1 email not matched

    echo json_encode($returnArray);

?>