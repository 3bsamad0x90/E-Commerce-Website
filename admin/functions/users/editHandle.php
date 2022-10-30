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
    $id = $_POST['id'];
    $name       = $_POST['name'];

    $retrievePasswordQuery = "SELECT password FROM users WHERE id = $id";
    $retrievePassword = $conn -> query($retrievePasswordQuery);
    $retrievePassword = $retrievePassword -> fetch_assoc(); 
    if(empty($_POST['password'])){
        $password = $retrievePassword['password'];
    }else{
        $password   = md5($_POST['password']);
    }
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $phone      = $_POST['phone'];
    $gender     = $_POST['gender'];
    $priv       = $_POST['priv'];
    
    $updateQuery = "UPDATE users SET 
        name='$name',
        password='$password',
        email='$email ',
        address='$address',
        phone='$phone',
        priv='$priv',
        gender='$gender' WHERE id = $id";

    $update = $conn -> query($updateQuery);
    if(isset($update)){
        header("Location: ../../users.php");
        exit();
    }else{
        header("Location: ../../users.php?action=edit");
    }

?>