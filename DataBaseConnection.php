<?php
$servername = "127.0.0.1";
$username = "pmauser";
$password = "ghassane";
$dbname = "WebProject" ;

try{
    $conn = "mysql:host=".$servername.";dbname=".$dbname;
    $pdo = new PDO($conn , $username , $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
   
}

catch(PDOException $e){
    echo "Connection failed : ".$e->getMessage();

}

?> 