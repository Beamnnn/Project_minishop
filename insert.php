<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/Insert.css">

</head>
<body>

<form action="insert-sql.php" method="post" enctype="multipart/form-data">
    Item_name : <input type="text" name="Item_name"><br>
    Item_price : <input type="text" name="Item_price"><br>
    Item_amount : <input type="text" name="Item_amount"><br>
    Item_model : <input type="text" name="Item_model"><br>
    Image_item	 : <input type="text" name="Image_item"><br>
    Type_item : <input type="text" name="Type_item"><br>
    Item_data : <input type="text" name="Item_data"><br>
    image : <input type="file" name="image"><br>
    <input type="submit" value="add" class="Del">
   
</form>
    <a href="delete.php"><button class="Del">delete</button></a>
    <br>
    <br> <a href="update.php"><button class="Del">update</button></a>
    <a class="Del" href="index.php">Back</a>
</body>
</html>