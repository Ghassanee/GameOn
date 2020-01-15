<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
?>
<?php
include_once '../DataBaseConnection.php';

?>



<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
