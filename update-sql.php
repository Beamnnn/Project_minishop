<?php include "connect.php" ?>

<?php
    $stmt = $pdo->prepare("UPDATE item SET Item_price=?, Item_amount=?, Item_model=?, Type_item=?, Item_data=? WHERE Item_name=?");
    $stmt->bindParam(1, $_POST["Item_price"]);
    $stmt->bindParam(2, $_POST["Item_amount"]);
    $stmt->bindParam(3, $_POST["Item_model"]);
    $stmt->bindParam(4, $_POST["Type_item"]);
    $stmt->bindParam(5, $_POST["Item_data"]);
    $stmt->bindParam(6, $_POST["Item_name"]); // Add this line to bind the last parameter

    if ($stmt->execute())
        echo "แก้ไข " . $_POST["Item_name"] . " สำเร็จ";
?>
