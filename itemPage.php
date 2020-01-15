<?php
session_start();
$file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content; ?>
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$Id = end(explode('?id=', $actual_link ));
include_once 'DataBaseConnection.php';
$stmt = $pdo->query("select * from Item WHERE Id=$Id; ");
$row = $stmt->fetch();
$_SESSION['IdG'] = $Id;



?>



<div class="container">

    <h1 class="my-4"><?php
        echo $row[Name];?>
        <small><?php
            echo $row['Version'];?></small>
    </h1>


    <div class="row">

        <div class="col-md-8" id="gameVideoDiv">
            <iframe width="750px" id="gameVideo" class="embed-responsive-item" height="424px" src="css/GameTriler/game<?php echo $row['Id']; ?>.mp4"></iframe>
        </div>

        <div class="col-md-4">
            <h3 class="my-3"><?php
                echo $row['Title'];?></h3>
            <p><?php
                echo $row['Details'];?></p>
            <h3 class="my-3">Game Details</h3>
            <ul id="details">
                <li><b>Release Date </b> : <?php
                    echo $row['Release_Date'];?></li>
                <li><b>Rating </b>:<?php
                    echo $row['Rating'];?></li>
                <li><b>Genre</b>:<?php
                    echo $row['Genre'];?></li>
                <li><b>Publisher</b>:<?php
                    echo $row['Publisher'];?></li>
            </ul>
            <?php
            $activity = $_COOKIE["activity"];
            $stmt1 = $pdo->query("select count(*) as count from User where Activity='$activity'; ");
            $row1 = $stmt1->fetch();
            if($row1["count"]!=0) {
                echo '<'.'form action="BuyPage.php" method="post" >
                     <input type="submit" id="buybtn" name="submit" class="btn btn-outline-secondary" value="' .
                    $row["Price"] . '$"></form> ';

            }
            else {
                echo '<'.'a href="SignInUp.php" id="buybtn" name="submit" class="btn btn-outline-secondary">'.$row["Price"] .'$</a>';
            }
            ?>


        </div>

    </div>

    <h3 class="my-4">Related Projects</h3>

    <div class="row">

        <?php
        $stmt = $pdo->query("select count(*) as countg from Item  ");
        $row = $stmt->fetch();
        $random_number_array = range(1, $row['countg']);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,1,4);

        $j=0;
        while($j < 4){

            $r = $random_number_array[$j];
            $stmt = $pdo->query("select * from Item where Id= $r  ");
            $row = $stmt->fetch() ;
            echo '
<div class="col-md-3">
            <div class="card" style="margin: 5px !important;">
            <img class="card-img-top" src="css/GameImg/game'.$row['Id'].'.jpg">
                <div class="card-body">
           
             <h4 class="card-title">'.$row['Name'].'</h4>
                    <a href="itemPage.php?id='.$row['Id'].'" class="btn btn-outline-secondary"';
            if($row['Stock'] == 0 ) { echo 'style=" pointer-events: none;" >Out of Stock  ' ; }  else  echo  '> ' .$row['Price']. '$ ' ;
            echo '</a>
                </div>
            </div>
    </div>';
            $j= $j+1;
        }
        ?>

    </div>

</div>

<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>


