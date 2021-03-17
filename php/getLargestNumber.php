<?php
include 'string_to_array.php';

    function getLargestNumber( $arr ){
        $dataArray = getArrayFromString($arr,',');
        $largestNumber = 0;

        for ($i=0; $i < sizeof($dataArray) ; $i++) { 
            if( $dataArray[$i] > $largestNumber ){
                $largestNumber = $dataArray[$i];
            }
        }
        return $largestNumber;
    }

    function getSmallestNumber( $arr ){
        $dataArray = getArrayFromString($arr,',');
        $smallestNumber = 999999;

        for ($i=0; $i < sizeof($dataArray) ; $i++) { 
            if( $dataArray[$i] < $smallestNumber ){
                $smallestNumber = $dataArray[$i];
            }
        }

        return $smallestNumber;

    }

    getLargestNumber( '10,5,33,55,12,8,8' );
    echo '<br>';
    getSmallestNumber( '10,5,33,55,12,8,8' );

?>