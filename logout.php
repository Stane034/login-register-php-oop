<?php

    require_once 'inc/header.php';

    $rezultat = $user->logout();

    if ($rezultat) { 
        header("Location: index.php");
    }else { 
        header("Location: index.php");
    }

    require_once 'inc/footer.php';
?>