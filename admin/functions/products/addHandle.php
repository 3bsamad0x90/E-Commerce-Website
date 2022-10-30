<?php
    require_once("../connect.php");
    session_start();
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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name       = $_POST['name'];
        $price      = $_POST['price'];
        $cat_id     = $_POST['cat_id'];

        $AllImages = array();
        $errors = array();
        $uploadedImages     = $_FILES['images'];
        echo "<pre>";
        // print_r($uploadedImages);
        //images from the form 
        $image_name = $uploadedImages['name'];
        $image_type = $uploadedImages['type'];
        $image_tmp = $uploadedImages['tmp_name'];
        $image_size = $uploadedImages['size'];
        $image_error = $uploadedImages['error'];
        //Allowed Extensions 
        $allowedExtensions = ['jpg','png','gif','jpeg'];
        //check if the files is uploaded
        if($image_error[0] == 4){
            $errors[] = "No files Uploaded";
        }else {
            //there are files uploaded
            $filesCount = count($image_name);
            for($i = 0; $i < $filesCount; $i++){
                $image_extension[$i] = strtolower(pathinfo($image_name[$i], PATHINFO_EXTENSION));           
                //Random image name 
                $NewImageName[$i] = uniqid() . '.' . $image_extension[$i];
                
                //check size 
                if($image_size[$i] < 10000){
                    $errors[] = "File is large size :D";
                }
                //check file is valid 
                if(!in_array($image_extension[$i], $allowedExtensions)){
                    $errors[] = "Invalid image extension";
                }
                //check if no errors 
                if(empty($errors)){
                    move_uploaded_file($image_tmp[$i], "../../uploads/$NewImageName[$i]");

                    //Save All Images in Array to Send to DB
                    $AllImages[] = $NewImageName[$i];
                }else{
                    $errors[] = "errors at file number (" . ($i + 1) . ")";
                }
            }
        }
        $finalImage = implode(",", $AllImages);
    
    }

    $insertProductQuery = "INSERT INTO products(name, price, cat_id) 
        VALUES ('$name','$price','$cat_id')";

    $insertProduct = $conn -> query($insertProductQuery);

    if(isset($insertProduct)){
        //select uploaded product
        $LastProductQuery = "SELECT MAX(id)  FROM products";
        
        $LastProduct = $conn -> query($LastProductQuery);
        $LastProductID =  $LastProduct -> fetch_assoc();
        // echo $LastProductID['MAX(id)'];
        $lastID =  $LastProductID['MAX(id)'];
        $insertImageQuery = "INSERT INTO images(img_name, product_id) 
            VALUES ('$finalImage','$lastID')";
        $insertImage = $conn -> query($insertImageQuery);

        if(isset($insertImage)){
            header("Location: ../../products.php");
            exit();
        }


    }
    else{
        $_SESSION["AddProductErrors"] = $errors;
        header("Location: ../../products.php?action=add");
        exit();
    }

?>