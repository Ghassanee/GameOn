<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content; ?>
<?php
include_once 'DataBaseConnection.php';

?>


<div class="container-fluid padding">



        <?php
        $search ="%". $_GET['search']."%";

        $stmt = $pdo->query("select * from Item WHERE NAME LIKE '$search' or Item.type like '$search' ; ");
        $i=0;
        if(!($row = $stmt->fetch())){
        echo "<p class='alert alert-danger text-center' > no data found </p>";

        }
        else{
            $stmt = $pdo->query("select * from Item WHERE NAME LIKE '$search'or Item.type like'$search' ; ");

            echo '<div  class="row padding">';

        while($row = $stmt->fetch() ){
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

        }}
        ?>
    </div>
</div>
<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
