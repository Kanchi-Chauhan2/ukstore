<?php
    $preDomain = "Location: http://localhost/ukstore/";
    $path = "";
    if(isset($_COOKIE['bodycountersUser']) ){
        $cookiename = 'bodycountersUser';
        $time = time();
        setcookie($cookiename,'',$time-3600, "/" );

        if( isset($_GET['path']) ){
            $path = $_GET['path'];

            switch($path){
                case 'account':
                    //DO NOTHING
                    break;
                case 'product':
                    $path = $path.'/?p='.$_GET['p'];
                    break;
                case 'category':
                    $path = $path.'/?c='.$_GET['c'];
                    break;
                default:
                    //DO NOTHING
                    break;
            }
            header($preDomain.$path);
        }else{
            header($preDomain);
        }

    }else{
        header($preDomain);
    }

?>