<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();
    }
    require_once("functions/connect.php");
    $id = $_SESSION['user_id'];
    $selectionQuery = "SELECT * FROM users WHERE id = $id";
    $selectionQuery = $conn -> query($selectionQuery);
    $selectUsername = $selectionQuery -> fetch_assoc();
    $user = $selectUsername['name'];
    $current = "products";
    require_once("includes/header.php");
    require_once("includes/sidebar.php");
    require_once("includes/navbar.php")

?>


<?php
    if(!isset($_GET['action'])){
        require_once("includes/productTable.php");
    }elseif($_GET['action'] == 'add'){
        require_once("design/products/addProduct.php");
    }elseif($_GET['action'] == 'edit'){
        require_once("design/products/editProduct.php");
    }
?>


<?php
    require_once("includes/footer.php");
?>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>