<?php
session_start();
$id = $_SESSION['IdG'] ;
$file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
include_once 'DataBaseConnection.php';
s

?>


        <?php
        $activity = $_COOKIE["activity"];

        $stmt1 = $pdo->query("select Email from User where Activity='$activity' ; ");
        $row1 = $stmt1->fetch();


        $email = $row1["Email"];

echo '<div class="card " id="itemCheck">
    <div class="card-header">
        Game On
    </div>
    <div class="card-body text-center  ">
        <h5 class="card-title">Your Shopping Cart :</h5>

';
        if(isset($_POST["submit"]) && $id!=null ){
            $stmt = $pdo->query("select count(*) as count from ShoppingCart WHERE IdGame=$id  and Email='$email' ");
            $row = $stmt->fetch();
            if ($row['count']==0) {
                $sql = "INSERT INTO ShoppingCart(Email, IdGame) VALUES (?,?)";
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute([$email, $id]);

            }
        }

        $stmta = $pdo->query("select count(*) as counta from ShoppingCart WHERE  Email='$email' ");
        $rowa = $stmta->fetch();

        if ($rowa['counta']!=0){
            echo '    
        <div class="container">
  
   <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                        <tr>
                            <th scope="col">Num</th>
                            <th scope="col">Game Image</th>
                            <th scope="col">Game Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price($)</th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>
 <form method="post" id="stockNum" action="stockNum.php"></form>
 <form method="post" id="deleteRow" action="deleteRow.php" ></form> 

 ';


            $stmt = $pdo->query("select * from ShoppingCart  where Email='$email'; ");
            $i=1;

            while($row = $stmt->fetch()){
                $st = $pdo->query("select * from Item WHERE Id=$row[IdGame]; ");
                $ro = $st->fetch();
                echo '<tr>
                         <th scope="row">'. $i .'</th> 
                         <td class="w-25">
                            <img src="css/GameImg/game'.$ro[Id].'.jpg" width="100" height="150" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>'.
                    '<td>'. $ro[Name]. '</td>
                        <td> <div id="Stock"  onfocusout="sumTotal()" onclick="sumTotal()" class="md-form text-center">
                      
                         <input form="stockNum" type="number" name ="sum'.$i.'" id="sum'.$i.'" class="form-control" value="0" onkeydown="return false" min="0"  max="'.$ro[Stock].'">
                         </div>
                      </td>
                        <td id="price'.$i.'" >'.$ro[Price].'</td>
                        <td  > 
                        <button form="deleteRow" type="submit"  name="submitD" value="'.$row[Id].'"  class="btn  btn-outline-secondary alert alert-danger " style="height: 30px ; padding-top: 0px" >delete</button>
                        
                         </td>
                        </tr>  ';
                $_SESSION['id'.$i]=$ro['Id'];
                $i++;
            }
            echo '</tbody>
        </table></div>
</div></div>

    <input form="stockNum" type="submit" name="submitB" href="ChekingOut.php" class="btn btn-primary " id="btnCheck" value="0$">
';
            
            $_SESSION['email'] = $email;
            $_SESSION['i'] = $i;
        }
        else {
            echo ' <p class="alert alert-danger text-center"  >No item in shopping cart   </p>
                        ' ;
        }
        ?>

        </a>
    </div>
    <div class="card-footer text-muted">
        Powered By PayPal
    </div>
</div>
<script>

    function sumTotal() {
        var sum = 0 ;
        <?php
        for ($j=1 ; $j<$i ;$j++){
        echo '
    sum += (document.getElementById("sum'.$j.'").value)*(document.getElementById("price'.$j.'").textContent);
     ';
    }
     
        ?>
    document.getElementById('btnCheck').value = sum.toFixed(2)  +"$" ;
    }

</script>
<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
