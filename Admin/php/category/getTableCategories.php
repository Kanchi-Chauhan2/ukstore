<?php

    function getTableCategories( $conn, $parentID ){

        $categoryTable = array();

        $query = "SELECT `id`, `name`, `detail`,`slug`, `totalProducts` FROM `categories` WHERE `parentCategory`='$parentID'";
        $query_exec = mysqli_query( $conn , $query );

        while( $row = mysqli_fetch_array($query_exec) ){
            $id = $row['id'];
            $name = $row['name'];
            $detail = $row['detail'];
            $totalProducts = $row['totalProducts'];
            $slug = $row['slug'];

            $categoryTable[] = array(
                'id' => $id,
                'name' => $name,
                'detail' => $detail,
                'totalProducts' => $totalProducts,
                'slug' => $slug
            );

        }

        return json_encode( $categoryTable );

    }


?>