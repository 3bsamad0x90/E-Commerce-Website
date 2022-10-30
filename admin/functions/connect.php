<?php
    //Database connection 
    define("HOST","localhost");
    define("USER","root");
    define("PASSWORD","");
    define("DBNAME","e-commerce-website");

    //connection object
    $conn = new mysqli(HOST,USER,PASSWORD,DBNAME);
    $conn -> set_charset("utf8");
    //check connection
    // if(!$conn){
    //     echo $conn -> error_connect();
    // }else{
    //     echo "success";
    // }
?>
