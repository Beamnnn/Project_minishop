<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
            function confirmDelete(Item_name) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
                var ans = confirm("ต้องการลบ" + Item_name); // แสดงกล่องถามผู้ใช ้
                if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
                document.location = "delete-sql.php?Item_name=" + Item_name; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
            }
        </script>
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
<?php
    $stmt = $pdo->prepare("SELECT * FROM item ");
    $stmt->execute(); // เริ่มค ้นหา
?>

<?php while ($row = $stmt->fetch()) : ?>
    <div style="padding: 15px; text-align: center">
        <img src='PRODUCT/img/<?=$row["Image_item"]?>.jpg' width='100'><br>
        name <?=$row ["Item_name"]?><br>
        price <?=$row ["Item_price"]?><br>
        amount <?=$row ["Item_amount"]?><br>
        model <?=$row ["Item_model"]?><br>
        item <?=$row ["Image_item"]?><br>
        item <?=$row ["Type_item"]?><br>
        data <?=$row ["Item_data"]?><br>
        <?php

            echo "<a href='#' onclick='confirmDelete(`" . $row["Item_name"] . "`)'>ลบ</a>"
        ?>
    </div>
    
<?php endwhile; ?>
<a class="Del" href="index.php">Back</a>
</body>
</html>