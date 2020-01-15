<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
include_once 'DataBaseConnection.php';
?>


<p class="alert alert-success text-center" id="thanks" >Thank you for your purchase  ,  <br> please check your email for the key <br><br> <a href="HomePage.php">Back to Home Page</a></p>


<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
