<?php
    session_start();
    require_once("connect.php");
    $errors = array();
    if(!(isset($_POST['email'] ) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
        $errors['email'] = 'email';
    }
    if(! (isset($_POST['password']) && !empty($_POST['password']))){
        $errors['password'] = 'password';
    }

    if(!$errors){
        $email = $conn -> real_escape_string($_POST['email']);
        $password = md5($_POST['password']);
    
        $selectLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $loginQuery = $conn -> query($selectLogin);
        $user = $loginQuery -> fetch_assoc();
        
        if($loginQuery -> num_rows > 0 ) {
            $id = $user['id'] ;
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $user['email'] ;
            header("Location: ../index.php");
            exit();
        }
        else{
            $errors = "Invalid Email or Password" ;
            $_SESSION['error_invalid'] = $errors ;
            header("Location: ../login.php");
            exit();
        }
    }else{
        $_SESSION['errors'] = $errors ;
        header("Location: ../login.php");
        exit();
    }



?>