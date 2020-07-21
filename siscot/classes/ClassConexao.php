<?php 
 
 require_once('init.php');  

 class Conexao {  
 
   /*  
    * Atributo estático para instância do PDO  
    */  
   private static $pdo;
 
   /*  
    * Escondendo o construtor da classe  
    */ 
   private function __construct() {  
     //  
   } 
 
   /*  
    * Método estático para retornar uma conexão válida  
    * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */  
   public static function getInstance() {  
     if (!isset(self::$pdo)) {  
       try {  
         $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
         self::$pdo = new PDO("mysql:host=" . DB_HOST . "; port=" . DB_PORT . "; dbname=" . DB_NAME . "; charset=" . CHARSET . ";", DB_USER, DB_PASS, $opcoes);  
       } catch (PDOException $e) {  
         http_response_code(500);
         print "Erro: " . $e->getMessage();  
       }  
     }  
     return self::$pdo;  
   }  
 }