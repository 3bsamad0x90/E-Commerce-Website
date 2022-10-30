<?php
    require_once("connect.php");
    $id = $_GET['id'];
    $DeleteQuery = "DELETE  FROM users WHERE id= $id";
    $delete = $conn -> query($DeleteQuery);
    if($delete){
        header("Location: ../users.php");
        exit();
    }else{
        echo $conn -> connect_error();
    }

?>