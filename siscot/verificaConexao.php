<?php
    if(!isLoggedIn() || $_SESSION['c_bd'] != "4"){ 
        header('Location: /siscot/index.php');
    }
?>