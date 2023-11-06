<?php include "connect.php" ?>
<?php
    // 1. ก าหนดค าสง่ SQL ให้ดึงสนค้าตามรหัสส ิ นค้า ิ
    $stmt = $pdo->prepare("SELECT * FROM item ");  
    $stmt->execute(); // 3. เริ่มค้นหา
?>
<html>
<head><meta charset="utf-8">
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
<?php while ($row = $stmt->fetch()) : ?>
    <form action="update-sql.php" method="post">
    name : <input type="hidden" name="Item_name" value="<?=$row["Item_name"]?>"><br>
    price : <input type="text" name="Item_price" value="<?=$row["Item_price"]?>"><br>
    amount : <input type="text" name="Item_amount" value="<?=$row["Item_amount"]?>"><br>
    model : <input type="text" name="Item_model" value="<?=$row["Item_model"]?>"><br>
    item : <input type="text" name="Type_item" value="<?=$row["Type_item"]?>"><br>
    data : <input type="text" name="Item_data" value="<?=$row["Item_data"]?>"><br>
<input type="submit" value="แก้ไข">
</form>
<?php endwhile; ?>
<a class="Del" href="index.php">Back</a>

</body>
</html>