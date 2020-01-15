<?php
include_once '../DataBaseConnection.php';


session_start();

$_SESSION["Fullname"]=$_SESSION["EmailAddress"]=
$_SESSION["username"]=$_SESSION["password"]
    =$_SESSION["Rpwd"]=$_SESSION["year"]=$_SESSION["day"]
    =$_SESSION["month"]=$_SESSION["gender"]=$_SESSION["userName"]=$_SESSION["passWord"]="";
if(isset($_POST["submit"])) {
    $_SESSION["Fullname"] = $_POST["Fullname"];
    $_SESSION["EmailAddress"] = $_POST["EmailAddress"];
    $var2 = $_POST["EmailAddress"];

    $_SESSION["username"] = $_POST["username"];
    $var1 = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["Rpwd"] = $_POST["Rpwd"];
    $_SESSION["year"] = $_POST["year"];
    $_SESSION["month"] = $_POST["month"];
    $_SESSION["day"] = $_POST["day"];
    $_SESSION["gender"] = $_POST["gender"];
    $_SESSION["noError"]=1;
    $_SESSION["a"]=0;
    $_SESSION['nameErr']=
    $_SESSION['mailErr']=
    $_SESSION['userErr']=
    $_SESSION['passErr']=
    $_SESSION['RpassErr']="";
    $stmt1 = $pdo->query("select count(*) as count from User WHERE Username='$var1'; ");
    $row1 = $stmt1->fetch();
    $stmt2 = $pdo->query("select count(*) as count from User WHERE Email='$var2'; ");
    $row2 = $stmt2->fetch();

    if (!preg_match('/[^A-Za-z. ]/', $_POST['Fullname']) == 0 && !empty($_POST['Fullname'])) {
        $_SESSION["noError"] = 0;
        $_SESSION['nameErr']="*No special characters in name  "."<br>" ;
        $_SESSION["a"] = 1;
    }
    if ( $row1['count'] !=0 && !empty($_POST['username'])) {

        $_SESSION['userErr']="*user name already exist"."<br>";
        $_SESSION["noError"] = 0;
        $_SESSION["a"] = 1;
    }
    if ( $row2['count'] !=0 && !empty($_POST['EmailAddress'])) {
        $_SESSION["noError"] = 0;

        $_SESSION['mailErr']="*Email Address already exist "."<br>";
        $_SESSION["a"] = 1;
    }
    if ( strlen($_POST["password"])<8 && !empty($_POST['password'])) {
        $_SESSION["noError"] = 0;

        $_SESSION['passErr']= "*password at least 8 characters"."<br>";
        $_SESSION["a"] = 1;
    }if ( $_POST["password"] != $_POST["Rpwd"] && !empty($_POST["password"]) && !empty($_POST["Rpwd"])) {
        $_SESSION["noError"] = 0;

        $_SESSION['RpassErr']="*password doesn't match"."<br>";
        $_SESSION["a"] = 1;
    }


    if ($_SESSION["a"]){
        header ("Location: ../SignInUp.php?signup=failed");
    }

    if($_SESSION["noError"]==1) {
        $name = $_SESSION["Fullname"];
        $email = $_SESSION["EmailAddress"];
        $username = $_SESSION["username"];
        $pwd = $_SESSION["password"];
        $year = $_SESSION["year"];
        $day = $_SESSION["day"];
        $month = $_SESSION["month"];
        $gender = $_SESSION["gender"];
        $date = "'" . $day . ',' . $month . ',' . $year . "'";

        $sql = "INSERT INTO User (FullName, Email, Password , Birthday , Gender , Username) VALUES (?,?,?,STR_TO_DATE($date,'%d,%m,%Y'),?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $pwd, $gender ,  $username]);
        session_destroy();
        session_start();

        $_SESSION['success'] = "<p" . " class='alert alert-success text-center'>you have sign up successfully please sign in now " . "</p>";
        $_SESSION['successErr'] = 'style="display: none"';
        header("Location: ../SignInUp.php?signup=success");


    }}
if(isset($_POST["submitSS"])) {
    $activity = $_COOKIE["activity"];
    $stmt = $pdo->query("UPDATE User SET Activity=false  WHERE Activity = '$activity'; ");
    header("Location: ../SignInUp.php");

}

if(isset($_POST["submitAdd"])) {




    $Name = $_POST["Name"];
    $Price = $_POST["Price"];
    $Stock = $_POST["Stock"];
    $Release_Date = $_POST["ReleaseD"];
    $Rating = $_POST["Rating"];
    $Genre = $_POST["Genre"];
    $Publisher= $_POST["Publisher"];
    $Version = $_POST["Version"];
    $Title = $_POST["Title"];
    $type = $_POST["Type"];
    $Details = $_POST["Details"];


    $sqlD = "INSERT INTO Item ( Name ,type ,  Price , Stock , Release_Date , Rating , Genre , Publisher , Version , Title , Details) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmtD = $pdo->prepare($sqlD);
    $stmtD->execute([$Name,$type ,  $Price, $Stock,$Release_Date, $Rating ,  $Genre , $Publisher , $Version , $Title , $Details ]);
    $stmt12 = $pdo->query("select * from Item ; ");
    $idg = '';
    while ($row12 = $stmt12->fetch()){
        $idg = "game".$row12['Id'] ;

    }

    $Image = $_FILES['Image'];
    $Video = $_FILES['Video'];
    $ImageDestination = '/var/www/html/WebProject/css/GameImg/'.$idg . ".jpg";
    move_uploaded_file($Image['tmp_name'] , $ImageDestination);

    $VideoDestination = '/var/www/html/WebProject/css/GameTriler/'.$idg . ".mp4";
    move_uploaded_file($Video['tmp_name'] , $VideoDestination);
     header("Location: ../AddItem.php?AddItem=success");


}



