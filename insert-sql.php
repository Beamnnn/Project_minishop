<?php include "connect.php" ?>
<?php
    $filename = $_POST["Image_item"].".jpg"; //เปลี่ยนชื่อ file ให่เป็น .jpg
    $tempname = $_FILES["image"]["tmp_name"];  //จะเก็บไว้ใน tempname
    $folder = "PRODUCT/img/" . $filename; //folder ที่เก็บรูป จะเอารูปมาเก็บไว้ที่ folder
    //print_r($_FILES["image"]);
    move_uploaded_file($tempname, $folder); //ย้ายไฟล์ จาก tempname ไปยัง folder
    $stmt = $pdo->prepare("INSERT INTO item VALUES (NULL,?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["Item_name"]);
    $stmt->bindParam(2, $_POST["Item_price"]);
    $stmt->bindParam(3, $_POST["Item_amount"]);
    $stmt->bindParam(4, $_POST["Item_model"]);
    $stmt->bindParam(5, $_POST["Image_item"]);
    $stmt->bindParam(6, $_POST["Type_item"]);
    $stmt->bindParam(7, $_POST["Item_data"]);
    $stmt->execute(); // เริ่มเพิ่มข้อมูล

?>
<html>
<head><meta charset="UTF-8">
<style>
    .Del{
    background-color: #8e44ad;
    border-radius: 8px;
    color: #DDD5F3;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border: 1px solid plum;
}
</style>
</head>
<body>
<a class="Del" href="index.php">Back</a>
</body>
</html>