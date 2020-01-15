
    <?php
    include_once 'DataBaseConnection.php';
    if(isset($_POST['submitD'])){
        $value = $_POST['submitD'];

      $sql = "DELETE FROM ShoppingCart  WHERE Id = $value ; ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        header("Location: http://localhost/WebProject/BuyPage.php");

    }
    else
    header("Location: http://localhost/WebProject/BuyPage.php?failed");

?>