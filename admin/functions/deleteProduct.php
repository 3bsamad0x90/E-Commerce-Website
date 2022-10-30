<?php
    require_once("connect.php");
    $id = $_GET['id'];
    $DeleteQuery = "DELETE  FROM products WHERE id= $id";
    $delete = $conn -> query($DeleteQuery);
    if($delete){
        header("Location: ../products.php");
        exit();
    }else{
        echo $conn -> connect_error();
    }

?>