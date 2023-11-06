<?php include "connect.php" ?>

<?php
if ($_POST['edit'] == "+") {
    $stmt = $pdo->prepare("SELECT Item_amount FROM `order` WHERE ID_Item = (?) AND ID_Order =(?) ");
    $stmt->bindParam(1, $_POST['ID_Item']);
    $stmt->bindParam(2, $_POST['ID_Order']);

    $stmt->execute();
    $item_amount = $stmt->fetch()[0] + 1;

    $stmt = $pdo->prepare("UPDATE `order` SET Item_amount =? WHERE ID_Item=?  and ID_Order =(?) ");
    $stmt->bindParam(1, $item_amount);
    $stmt->bindParam(2, $_POST['ID_Item']);
    $stmt->bindParam(3, $_POST['ID_Order']);

    $stmt->execute();
}
if ($_POST['edit'] == "-") {
    $stmt = $pdo->prepare("SELECT Item_amount FROM `order` WHERE ID_Item = (?)  and ID_Order =(?)");
    $stmt->bindParam(1, $_POST['ID_Item']);
    $stmt->bindParam(2, $_POST['ID_Order']);
    $stmt->execute();
    $item_amount = $stmt->fetch()[0] - 1;
    if ($item_amount == 0) {
        $stmt = $pdo->prepare("DELETE FROM `order` WHERE ID_Item =?  and ID_Order =(?)");
        $stmt->bindParam(1, $_POST['ID_Item']);
        $stmt->bindParam(2, $_POST['ID_Order']);
        $stmt->execute();
    } else {
        $stmt = $pdo->prepare("UPDATE `order` SET Item_amount =? WHERE ID_Item =?  and ID_Order =(?)");
        $stmt->bindParam(1, $item_amount);
        $stmt->bindParam(2, $_POST['ID_Item']);
        $stmt->bindParam(3, $_POST['ID_Order']);
        $stmt->execute();
    }
}
header('location:cart.php');
?>