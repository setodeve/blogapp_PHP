<?php

define('DSN', 'mysql:host=localhost;dbname=keiblog;charset=utf8mb4');
define('DB_USER', 'root');
define('DB_PASS', '');
define('SITE_URL', 'http://localhost/myblog/index.php');
  
  function setDB(){
    try{
      if(!isset($pdo)){
        $pdo = new PDO
        (
          DSN,
          DB_USER,
          DB_PASS,
          [
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false
          ]
        );
      }
      return $pdo ;
    }catch(Exception $e){
      echo $e->getMessage();
      exit ;
    }
  }

?>