<?php
include_once 'DataBaseConnection.php';

session_start();
$email = $_SESSION['email'];
echo $email;
echo $_SESSION['i'];
if ( isset($_POST["submitB"])){
    for($i=1 ; $i< $_SESSION['i'];$i++){
        if($_POST['sum'.$i]!=0){
            $stock = $_POST['sum'.$i];
            $id = $_SESSION["id".$i];
            

            $stmt = $pdo->query("UPDATE Item SET stock=stock - $stock  WHERE Id = $id; ");
            $stmt = $pdo->query("DELETE from  ShoppingCart WHERE IdGame=$id  and Email='$email'  ");


        }

    }
    header("Location: http://localhost/WebProject/ChekingOut.php");


}

session_destroy();

