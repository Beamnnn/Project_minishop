<?php include "connect.php" ?>

<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $us_id = $_SESSION['user_id'];
}

if (isset($_POST["confirm"])) {
    $stmt = $pdo->prepare("UPDATE `user` SET  Fullname=?, Password=?,Tel=?,email=? WHERE ID_User = $us_id");
    $stmt->bindParam(1, $_POST['us_fullname']);
    $stmt->bindParam(2, $_POST['us_password']);
    $stmt->bindParam(3, $_POST['us_tel']);
    $stmt->bindParam(4, $_POST['us_email']);

    if ($stmt->execute()) {
        echo "Complete editing " . $_POST["us_id"];
        header("location:user.php");
    }
}
?>