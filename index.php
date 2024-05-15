<?php require_once 'inc/header.php';?>

<?php 
    if (isset($_SESSION['message'])) { 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>


<?php require_once 'inc/footer.php';?>