<!DOCTYPE html>
<html lang="en">
<head>
<script>
    var ca = document.cookie.split(';');
    var a = ca[0].replace("clicked=",'');
    var b = ca[0].replace("="+a,'');

    if(b!="clicked") {
        document.cookie = "clicked=0";
    }

</script>
<?php


include_once 'DataBaseConnection.php';




?>

    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/HomePageStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


    <link  rel="shortcut icon"  type="image/gif/png" href="css/img/go.png" sizes="16x16">
    <title>GameOn</title>

</head>

<body id="body" class="hero-bkg-animated" style="text-align: left !important; "  >
<div style="border-bottom: 1px solid black" class="container-fluid">
    <div class="row" id="bar">
        <div class="col-12 col-md-3" style=" text-align: center !important;">
            <a href="HomePage.php" id="logo"><img id="logof" src="css/img/logoA.png">
            </a>

        </div>



        <div class=" col-12 col-md-9 " style="margin:  20px 0px 30px 0   !important;" >
            <div class="row">

                <div class=" col-12  col-md-9" >
                    <form class="form-inline md-form form-sm mt-0" id="searchbox" method="GET" action="SearchPage.php">

                        <input class="form-control form-control-sm ml-3 w-75" id="search" type="text" placeholder="Search"
                               aria-label="Search" name="search">
                        <input type="submit" style="display: none;">
                    </form>
                </div>
                <div class="col-12 col-md-3" style="text-align: center !important; margin-top: 5px">
                    <button id="nightmod" onclick="nightMode()"  class="btn  btn-outline-secondary  " style="     height: 30px ; padding-top: 0px" >Night Mode </button>

                </div>
            </div>
        </div>

    </div>

</div>
<style id=style-id >

    .hero-bkg-animated {
        width: 100%;
        margin: 0;
        text-align: center;


        box-sizing: border-box;
        -webkit-animation: slide 50s linear infinite;
    <?php

if($_COOKIE['clicked'] != 0) {
echo 'background: black url("css/img/polygon-1.4s-1084px.png") repeat 0 0;
color: white !important; }  .card{
        background-color : #3f3f3f ; 
    } ';
}
else {
echo '  background: black url("css/img/polygon-1s-1084px.png") repeat 0 0;}
 .card{
       background-color : white ; 
    }
';
}

?>
    }

    .hero-bkg-animated h1 {
        font-family: sans-serif;
    }

    @-webkit-keyframes slide {
        from { background-position: -400px 0; }
        to { background-position: -400px 0; }
    }

</style >

<script>
    elements = document.getElementsByClassName('card');


    function nightMode () {
        var ca = document.cookie.split(';');
        var a = ca[0].replace("clicked=",'');

        if(a == 0){ document.cookie = "clicked=1"; a=1 ; }
        else  {document.cookie = "clicked=0" ; a=0}


        if(a == 1) {
            document.getElementById('nightmod').style.color = "white";
            document.getElementById('body').style.color = "white";
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.backgroundColor="#3f3f3f";
            }

            document.getElementById('style-id').innerHTML =".hero-bkg-animated {  background: black url(css/img/polygon-1.4s-1084px.png) repeat 0 0;width: 100%;margin: 0;text-align: center;box-sizing: border-box;-webkit-animation: slide 50s linear infinite;}.hero-bkg-animated h1 {font-family: sans-serif;}@-webkit-keyframes slide {from { background-position: -400px 0; }to { background-position: -400px 0; } }";
        }

        else {
        
            document.getElementById('nightmod').style.color = "black";
            document.getElementById('body').style.color = "black";
            for ( i = 0; i < elements.length; i++) {
                elements[i].style.backgroundColor="white";
            }
            document.getElementById('style-id').innerHTML =".hero-bkg-animated {  background: black url('css/img/polygon-1s-1084px.png') repeat 0 0;width: 100%;margin: 0;text-align: center;box-sizing: border-box;-webkit-animation: slide 50s linear infinite;}.hero-bkg-animated h1 {font-family: sans-serif;}@-webkit-keyframes slide {from { background-position: -400px 0; }to { background-position: -400px 0; } }";
        }
    }

</script>


<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style=" border: 0px solid transparent !important;  padding: 0 !important;">
    <div class="container-fluid d-flex justify-content-end " style="padding: 0 !important; ">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style=" z-index: 2001 ; margin-right: 0 !important; padding-right: 0 !important;">


            <ul class="navbar-nav mx-auto">
                <li class="nav-item  active">
                    <a class="nav-link" href="SearchPage.php?search=console">Consoles</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="SearchPage.php?search=game">Games</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo "?id=32" ?>">Special offers</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="PlayAndWin.php">Play and win </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="SearchPage.php?search=others">Others</a>
                </li>


            </ul>
            <a id="signIcon" href="SignInUp.php"  class="btn btn-outline-secondary" style="height: 30px ; padding-top: 0px ; margin-bottom: 5px  !important; margin-right : 10px ; ">Sign In/Up</a>
            <?php


            $activit = $_COOKIE["activity"];
            echo $_REQUEST["activity"] ;
            $stmt = $pdo->query("select count(*) as count from User WHERE Activity='$activit'; ");
            $row = $stmt->fetch();
            $stmt1 = $pdo->query("select count(*) as countU from User WHERE UserPrivileges ='Root' and Activity='$activit'; ; ");
            $row1 = $stmt1->fetch();

            if($row['count'] !=0   ){
                if ($row1['countU']!=0){
                    echo "<"."style>
                #signIcon {
                    display: none ;
                }
                </style> "
                        .'
                <a href="AddItem.php" class="btn btn-outline-secondary"  style="height: 30px ; padding-top: 0px ; margin-bottom: 5px !important;  "  >Add Item</a>
                <form action="includes/form.inc.php" method="post">
                         <input id="button" class="btn btn-outline-secondary" style="height: 30px ; margin-bottom: 5px !important; margin-right: 5px !important; padding-top: 0px  ; margin-left : 10px ; " name="submitSS" type="submit" value="Log out" > </form>
            '
                    ;

                }

                else {
                    echo "<"."style>
                #signIcon {
                    display: none ;
                }
                </style> "
                        .'
                <a href="BuyPage.php" class="btn btn-outline-secondary"  style="height: 30px ;margin-bottom: 5px !important; ; padding-top: 0px "  >Shopping cart</a>
                <form action="includes/form.inc.php" method="post">
                         <input id="button" class="btn btn-outline-secondary" style="height: 30px ; margin-bottom: 5px !important; margin-right: 5px !important; padding-top: 0px ; margin-left : 10px " name="submitSS" type="submit" value="Log out" > </form>
            '
                    ;}

            }




            ?>

        </div>
    </div>
</nav>
