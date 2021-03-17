<?php
    include '../../php/db.php';
    $order = json_decode(file_get_contents("php://input"),true);

    //-------------------------CREATE ORDER--------------------------------------

    $cname = $order['cname'];
    $cID = $order['cid'];

    $orderID = $order['oID'];
    $payeeID = $order['payeeID'];
    $orderStatus = $order['status'];
    $price = $order['price'];

    $products = json_encode($order['products']);
    $productsArray = json_decode($products,true);
    

    $address = array(
        'stateid' => $order['stateid'],
        'address' => $order['address'],
        'landmark' => $order['landmark'],
        'city' => $order['city'],
        'state' => $order['state'],
        'country' => $order['country'],
        'pin' => $order['pin'],
        'phone' => $order['phone']
    );

    $address = json_encode($address);

    $date = date("Y-m-d");
    $time = date("h:i:s");

    $query = "INSERT INTO `orders`(`userName`, `userId`, `payeeID`, `orderId`, `products`, `paymentMode`, `paymentGateway`, `status`, `totalPrice`,`address` , `time`, `date`) VALUES 
                                ('$cname','$cID','$payeeID','$orderID','$products','paypal','paypal','$orderStatus','$price','$address','$time','$date')";
    $query_exec = mysqli_query( $conn, $query );

    if( $query_exec == 1 ){
        //-------------------------------------     UPDATE USER ORDERS      ----------------------------------
        $oID = mysqli_insert_id($conn);
        $query = "SELECT `orders` FROM `users` WHERE id='$cID'";
        $query_exec = mysqli_query($conn,$query);

        $userOrders = '0';

        while( $row = mysqli_fetch_array( $query_exec ) ){
            $userOrders = $row['orders'];
        }

        if( $userOrders == '0' ){
            //---------------------------------     Error       ----------------------------------------------
            echo '-2';
        }else{
            if( $userOrders === '' ){
                $userOrders = $oID;
            }else{
                $userOrders = $userOrders.','.$oID;
            }
            $query = "UPDATE `users` SET `orders`='$userOrders',`cart`='' WHERE id='$cID'";
            $query_exec = mysqli_query( $conn, $query );

            echo $query_exec;
            echo $query;

            if( $query_exec == 1 ){
                //---------------------------------Emailing Code Here-----------------------------------------

                //---------------------------------Update Numbers Data----------------------------------------

                $query = 'SELECT `orders`,`sales` FROM `meta_numbersdata` WHERE id=1';
                $query_exec = mysqli_query( $conn, $query );

                $sales = 0;
                $orders = 0;

                while( $row = mysqli_fetch_array( $query_exec ) ){
                    $sales = $row['sales'];
                    $orders = $row['orders'];
                }

                $sales+=$price;
                $orders++;

                $query="UPDATE `meta_numbersdata` SET `sales`='$sales',`orders`='$orders' WHERE id=1";
                $query_exec = mysqli_query($conn,$query);

                if( $query_exec == 1 ){
                    echo '1';

                    //-----------------------Update Product Set----------------------------------------

                    for( $i=0 ; $i<count($productsArray) ; $i++ ){
                        $p = $productsArray[$i];
                        $query = '';
                        $q = $p['quantity'];
                        $pq = 0;

                        if( $p['type'] == 'variable' ){
                            $query = "";
                        }

                    }

                    $query = "";


                }else{
                    echo '-4';
                }


            }else{
                echo '-1';
            }

        }

    }else{
        echo '-3';
    }


?>