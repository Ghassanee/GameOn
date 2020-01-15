<?php


include_once 'DataBaseConnection.php';

$cookie_name = "activity";


if(isset($_POST["submitS"])){  


    $passWord = $_POST['passWord'];
    $userName = $_POST['userName'];
    $stmt = $pdo->query("select count(*) as count from User WHERE (Username='$userName'  or Email='$userName') and Password='$passWord'; ");
    $row = $stmt->fetch();
    if($row['count'] !=0){

        $cookie_value =  md5(rand(1,100));
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30) ,'/');

        $activity = $cookie_value;

        $stmt = $pdo->query("UPDATE User SET Activity='$activity'  WHERE Username='$userName' or Email='$userName' and Password='$passWord'; ");
        header("Location: ./HomePage.php?signup=success");

    }
    else
        header("Location: ./SignInUp.php?signup=failed");

}