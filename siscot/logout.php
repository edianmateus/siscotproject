<?php
    $_SESSION['logged_in'] = false;
    session_destroy();
    header('Location: /siscot/index.php');
?>