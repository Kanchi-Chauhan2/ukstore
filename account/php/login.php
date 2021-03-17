<?php

    include '../../php/db.php';
    $returnData = 0;

    if( $_POST ){
        if( isset( $_POST['email'] ) && isset($_POST['password']) ){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $queryEmail = '';
            $queryPassword = '';
            $tockenID = '';
            $id = '';
            $name = '';

            $query = "SELECT `id`,`name`,`email`,`password`,`tockenID` FROM `users` WHERE email='$email'";
            $query_exec = mysqli_query( $conn, $query );

            while( $row = mysqli_fetch_array(  $query_exec) ){
                if( $password === '' ){
                    $returnData = -1;
                }else{
                    $queryEmail = $row['email'];
                    $queryPassword = $row['password'];
                    $id = $row['id'];
                    $name = $row['name'];
                    $tockenID = $row['tockenID'];
                    
                }
            }

            //------------------NOW MATCHING DATA---------------------------------

            if( $email == $queryEmail && $password == $queryPassword ){
                //--------------------IF DATA MATCHED THEN CREATE COOKIE------------------------

                $cookiename = 'bodycountersUser';
                $value = array(
                    'id' => $id,
                    'tockenID' => $tockenID,
                    'name' => $name,
                    'email' => $email,
                    
                );
                $time = time() + 86400 * 30; //  30 days

                setcookie($cookiename,json_encode($value),$time, "/" );   // Cookie is Added for 30 days
                
                $returnData = 1;
            }else{  
                $returnData = -1;
            }


        }else{
            $returnData = -2;
        }
    }else{
        $returnData = -3;
    }

    if( $returnData === 1 ){
        header('Location: ../../index.php');
    }else{
        header('Location: ../login.php?account=error');
    }

?>