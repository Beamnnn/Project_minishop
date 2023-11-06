
<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("DELETE FROM item WHERE Item_name=?");
    $stmt->bindParam(1, $_GET["Item_name"]); // ก าหนดค่าลงในต าแหน่ง ?
    if ($stmt->execute()) // เริ่มลบข้อมูล
    header("location:delete.php"); // กลับไปแสดงผลหน้าข้อมูล
?>