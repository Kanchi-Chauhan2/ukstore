<?php

    function getArrayFromString( $str, $delimiter ){
        $arr = array();
        $token = strtok($str,$delimiter);
        while( $token !== false ){
            $arr[] = ''.$token;
            $token = strtok($delimiter);
        }
        return $arr;
    }

?>