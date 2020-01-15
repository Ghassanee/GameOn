<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
?>
<?php
include_once 'DataBaseConnection.php';

?>
<div class="container" id="seconde">

    <div id="slides" class="carousel slide" data-ride="carousel" >
        <ul class="carousel-indicators" style="margin-left: auto !important;  margin-right: auto !important;">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1" ></li>
            <li data-target="#slides" data-slide-to="2" ></li>
        </ul>
        <div class="carousel-inner">
            <?php
            $stmt = $pdo->query("select * from Item WHERE Item.type='game' ORDER BY RAND()   ; ");
            $i=0 ;


            while(($row = $stmt->fetch()) && ($i<3)){

                if ($i==0) echo'<div class="carousel-item active">';
                else echo '<div class="carousel-item ">';

                echo '
                <img src="css/GamePoster/game'.$row['Id'].'.jpg" >
                <div class="carousel-caption">
                    <h1 class="display-2" id="slideName" style=" font-family: \'Righteous\',cursive !important; font-weight: 400 !important;" >'.$row['Name'].'</h1>
                    <h3></h3>
                    <button type="button" id="slideBtn"  style="width: 200px"   class="btn btn-primary btn-lg "><a style=" width: 20px !important;  color: white !important; text-decoration: none "  href="itemPage.php?id='.$row['Id'].'">'.$row['Price'].'$</a> </button>
                </div>
                </div>
                
                
                ';

                $i++;
            }




            ?>
        </div>
    </div>


</div>

<div class="container-fluid"  >
    <?php
    $activity = $_COOKIE["activity"];
    $stmt = $pdo->query("select count(*) as count from User WHERE Activity='$activity'; ");
    $row = $stmt->fetch();
    if ($row['count'] == 0) {

        echo '


        <div class="row jumbotron" id="jumbtron">
        <div  class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="lead" style="color: black !important;"> Create a new account and take a 10% off coupon on your first purchase !!!! </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
            <a href="SignInUp.php"> <button type="button " class="btn btn-outline-secondary btn-lg">Sign up now </button></a>
        </div>
    </div>';

    }?>
</div>
<div class="container-fluid padding" >
    <div class=" row  text-center padding"  id="icons">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-truck"></i>
            <h3>Fast Shipping</h3>
            <p>you will get your product instantly  </p>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-credit-card"></i>
            <h3>Safe transactions</h3>
            <p>your bank account details are safe NO WORRIES !!! </p>

        </div>
        <div class="col-sm-12  col-md-4">
            <i class="far fa-handshake"></i>
            <h3>Beast Deals Ever</h3>
            <p>Our team is always giving best deals out there  </p>

        </div>

    </div>
</div>
<hr class="my-4">

<div  class="container-fluid padding">
    <div class="row padding">
        <div class="col-lg-5">
<?php
$stmtR = $pdo->query("select * from Item WHERE Item.type='game' ORDER BY RAND()  LIMIT 1 ; ");
$rowR = $stmtR->fetch();
echo '            <h2><b>'.$rowR['Name'].'</b>   Have you tried it.. </h2>';
echo '<p class="aboutgame" >'.$rowR[Details] .'</p>';
echo '<br>';
echo '<a href="itemPage.php?id='.$rowR['Id'].'" class="btn btn-primary aboutbtn">Buy Now</a>' ;
echo '<button type="button" class="btn btn-outline-light btn-lg aboutgame "><a href="itemPage.php?id='.$rowR['Id'].'  " style="text-decoration: none"> See Triller</a></button>';
?>
           </div>

        <?php
    echo '    <div class="col-lg-7">
            <img src="css/GamePoster/game'.$rowR['Id'].'.jpg" class="img-fluid">
        </div>
    ';
        ?>
    </div>

</div>
<hr class="my-4">
<figure>
    <div class="fixed-wrap">
        <div id="fixed">

        </div>
    </div>
</figure><div id="deals">
    <button class="fun" data-toggle="collapse" style="width: auto ;" data-target="#gamemore">Daily Deals</button>
</div>
<div id="gamemore" class="collapse">
    <div class="contaier-fluid padding">
        <div class="row text-center" style="padding-right: 0 !important; margin-right: 0 !important;">
            <?php
            $random_number_array = range(1, 6);
            shuffle($random_number_array );
            $random_number_array = array_slice($random_number_array ,1,4);

            $j=0;
            while($j < 4){

                $r = $random_number_array[$j];
                $stmt = $pdo->query("select * from Item where Id= $r  ");
                $row = $stmt->fetch() ;
                echo
                    '
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="css/GameImg/game'.$row['Id'].'.jpg">
                    <div class="card-body">
                        <h4 class="card-title">'.$row['Name'].'</h4>
                        <a href="itemPage.php?id='.$row['Id'].'"  class="btn btn-outline-secondary"';
                if($row['Stock'] == 0 ) { echo 'style=" pointer-events: none;" >Out of Stock  ' ; }  else  echo  '> ' .$row['Price']. '$ ' ;
                echo '</a>
                
                    </div>
                </div>
           
            
        </div>' ;
                $j= $j+1;
            }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Best Games this month</h1>
        </div>
        <hr>

    </div>
</div>

<div class="container-fluid padding">
    <div  class="row padding">
        <?php

        $stmt = $pdo->query("select * from Item  where Item.type='game' ; ");
        $i=0;

        while($row = $stmt->fetch()){
            if($i == 4 ){
                $i=0 ;
                echo '</div>
        <hr class="my-4">
         <div  class="row padding">';
            }
            echo  '<div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="css/GameImg/game'.$row['Id'].'.jpg">
                <div class="card-body">
                    <h4 class="card-title">'.$row['Name'].'</h4>
                    <a href="itemPage.php?id='.$row['Id'].'" class="btn btn-outline-secondary" ' ;
            if($row['Stock'] == 0 ) { echo 'style=" pointer-events: none;" >Out of Stock  ' ; }  else  echo  '> ' .$row['Price']. '$ ' ;
            echo '</a>
                </div>
            </div>
    </div>';
            $i = $i +1 ;

        }
        ?>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Need a Console !?</h1>
        </div>
        <hr>

    </div>
</div>

<div class="container-fluid padding">
    <div  class="row padding">
        <?php

        $stmt = $pdo->query("select * from Item where Item.type='console' ; ");
        $i=0;

        while($row = $stmt->fetch()){
            if($i == 4 ){
                $i=0 ;
                echo '</div>
        <hr class="my-4">
         <div  class="row padding">';
            }
            echo  '<div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="css/GameImg/game'.$row['Id'].'.jpg">
                <div class="card-body">
                    <h4 class="card-title">'.$row['Name'].'</h4>
                    <a href="itemPage.php?id='.$row['Id'].'" class="btn btn-outline-secondary" ' ;
            if($row['Stock'] == 0 ) { echo 'style=" pointer-events: none;" >Out of Stock  ' ; }  else  echo  '> ' .$row['Price']. '$ ' ;
            echo '</a>
                </div>
            </div>
    </div>';
            $i = $i +1 ;

        }
        ?>
    </div>
</div>
<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
