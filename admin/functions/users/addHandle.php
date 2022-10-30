<?php
    require_once("../connect.php");
    
    // $errors = array();
    // if(!(isset($_POST['name']) && !empty($_POST['name']))){
    //     $errors[] = 'name';
    // }
    // if(!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) )){
    //     $errors[] = 'email';
    // }
    // if(!(isset($_POST['password']) && strlen($_POST['password'] > 5))){
    //     $errors[] = 'password';
    // }
    // if(!(isset($_POST['address']) && !empty($_POST['address']))){
    //     $errors[] = 'address';
    // }
    // if(! isset($_POST['phone'])){
    //     $errors[] = 'phone';
    // }
    // if(! isset($_POST['gender'])){
    //     $errors[] = 'gender';
    // }
    // if(isset($errors)){
    //     header("Location: ../../users.php?action=add&". $errors);
    //     exit();
    // }

    $name       = $_POST['name'];
    $password   = md5($_POST['password']);
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone'];
    $gender     = $_POST['gender'];
    $priv       = $_POST['priv'];
    
    $insertQuery = "INSERT INTO users(name, password, email, address, phone, priv, gender) 
        VALUES ('$name','$password','$email','$address','$phone','$priv','$gender')";

    $insert = $conn -> query($insertQuery);
    if(isset($insert)){
        header("Location: ../../users.php");
        exit();
    }else{
        header("Location: ../../users.php?action=add");
    }

?>