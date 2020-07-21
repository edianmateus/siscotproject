<?php
    $servidor = $_SERVER['HTTP_HOST'];
    $local   = 'localhost';
    $existe = strpos($servidor, $local);
    $titulo_site = "Siscot";
    $URL_ATUAL = $_SERVER['PHP_SELF'];
    $URL_ATUAL = str_replace("lista.php", "", $URL_ATUAL); 

    if($existe === false){
        define('DB_HOST', 'localhost');
        define('DB_PORT', '35795');
        define('DB_USER', 'system');
        define('DB_PASS', 'AM^ym#Iw3ccF');
        define('DB_NAME', 'siscot');  
        ini_set('display_errors', true);
    }else{
        define('DB_HOST', 'localhost');
        define('DB_PORT', '3306');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'siscot'); 
        ini_set('display_errors', true);
    }
    define('CHARSET', 'utf8');
    date_default_timezone_set('America/Sao_Paulo');
    ini_set('error_reporting', E_ALL);
    session_start();
    require_once('functions.php');
?>