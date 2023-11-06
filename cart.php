<?php include('connect.php'); ?>

<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: Index.php');
}
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Cart </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/Cart.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital@1&display=swap');
    </style>
</head>

<body>

    <div class="Header" style="font-family: 'Mali', cursive;">
        <div class="Container">

            <!-- Menu Bar -->
            <div class="Menu-Bar">
                <div class="Logo">
                    <a href="./Index.php">
                        <img src="./PRODUCT/img/logo/logo.png" width="100%" height="100vh">
                    </a>
                </div>

                <Nav>
                    <Ul>

                        <!-- List JSON -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./PRODUCT/Brands/JsonBrand.php"> List </a> </Li>
                        </div>

                        <!-- Brands -->
                        <div class="Dropdown-Brand">
                            <Li> <a href=""> Brands </a> </Li>
                            <div class="Brand-Content">
                                <a href="PRODUCT/Brands/pencil/pencil.php"> Pencil </a>
                                <a href="PRODUCT/Brands/pen/pen.php"> Pen </a>
                                <a href="PRODUCT/Brands/eraser/eraser.php"> Eraser </a>
                                <a href="PRODUCT/Brands/Liquid_paper/Liquid_paper.php"> Liquid Paper </a>
                                <a href="PRODUCT/Brands/pencil_click/pencil_click.php"> Pencil Click </a>
                                <a href="PRODUCT/Brands/pencil_box/pencil_box.php"> Pencil Box </a>
                                <a href="PRODUCT/Brands/ruler/ruler.php"> Ruler </a>
                                <a href="PRODUCT/Brands/notebook/notebook.php"> Notebook </a>
                                <a href="PRODUCT/Brands/highlight_pen/highlight_pen.php"> Highlight pen </a>
                            </div>
                        </div>

                        <!-- News -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./PRODUCT/News/News.php"> News </a> </Li>
                        </div>

                        <!-- Log In & Log Out -->
                        <div class="Dropdown-Brand">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <Li> <a href="./Index.php?logout='1'"> Log Out </a> </Li>
                            <?php } else { ?>
                                <Li> <a href="./Login.php"> Log In </a> </Li>
                            <?php } ?>
                        </div>

                        <!-- Cart -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./cart.php"> <i class="fa-sharp fa-solid fa-bag-shopping"></i> </a> </Li>
                        </div>

                        <!-- User -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./user.php"> <i class="fa-solid fa-user"> </i> </a> </Li>
                        </div>

                        <!-- Name -->
                        <div class="Dropdown-Brand">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <li>
                                    <b>
                                        <?php echo $_SESSION['username']; ?>
                                    </b>
                                </li>
                            <?php } ?>
                        </div>

                    </Ul>
                </Nav>
            </div>
        </div>

        <div class="Layout">
            <?php
            if (!empty($_POST['add'])) {
                if ($_POST['add'] === "Addtocart") {
                    if (empty($_COOKIE['order'])) {
                        $stmt = $pdo->prepare("SELECT * FROM `order` INNER JOIN `receipt` ON order.ID_Receipt = receipt.ID_Receipt
                        WHERE order.ID_Item = ? AND order.ID_User = ? AND receipt.Status = 'order'");
                        $stmt->bindParam(1, $_POST['ID_Item']);
                        $stmt->bindParam(2, $_SESSION['user_id']);

                        $stmt->execute();
                        $row = $stmt->fetch();

                        if ($row > 0) {
                            $item_amount = $row['Item_amount'] + 1;
                            $stmt = $pdo->prepare("UPDATE `order` SET Item_amount =? WHERE ID_Item=? AND ID_User = ?");
                            $stmt->bindParam(1, $item_amount);
                            $stmt->bindParam(2, $_POST['ID_Item']);
                            $stmt->bindParam(3, $_SESSION['user_id']);
                            $stmt->execute();
                        } else {
                            $id_receipt = 0;
                            $stmt = $pdo->prepare("SELECT * FROM `receipt` WHERE ID_User = ? AND Status = 'order'");
                            $stmt->bindParam(1, $_SESSION['user_id']);
                            $stmt->execute();
                            $row = $stmt->fetch();
                            if($row == 0){
                                $stmt = $pdo->prepare("INSERT INTO `receipt` (Total_price,ID_User,Status) VALUES (0,?,'order')");
                                $stmt->bindParam(1, $_SESSION['user_id']);
                                $stmt->execute();
                                $stmt = $pdo->prepare("SELECT * FROM `receipt` WHERE ID_User = ? AND Status = 'order'");
                                $stmt->bindParam(1, $_SESSION['user_id']);
                                $stmt->execute();
                                $row = $stmt->fetch();
                                $id_receipt = $row["ID_Receipt"];
                            }
                            else{
                                $id_receipt = $row["ID_Receipt"];
                            }
                            $a = Date("Y-m-d H:i:s");
                            $stmt = $pdo->prepare("INSERT INTO `order` (ID_Item,ID_User,Item_amount,`Time`,ID_Receipt) VALUES (?,?,1,?,?)");
                            $stmt->bindParam(1, $_POST['ID_Item']);
                            $stmt->bindParam(2, $_SESSION['user_id']);
                            $stmt->bindParam(3, $a);
                            $stmt->bindParam(4, $id_receipt);
                            $stmt->execute();
                            $stmt = $pdo->prepare("SELECT * FROM `order` WHERE ID_Item = ? AND ID_User = ?");
                            $stmt->bindParam(1, $_POST['ID_Item']);
                            $stmt->bindParam(2, $_SESSION['user_id']);

                            $stmt->execute();
                            $row = $stmt->fetch();
                            $ID_Order = $row["ID_Order"];
                            setcookie("order", $ID_Order, time() + 3600 * 24);
                        }

                        $total_price = 0;
                        $id_receipt = 0;
                        $ID_User = $_SESSION["user_id"];

                        $stmt = $pdo->prepare("SELECT item.ID_Item ,item.Image_item,item.Item_name ,item.Item_price ,order.Item_amount ,order.ID_Order,order.ID_Receipt
                        FROM `order` INNER JOIN `item` ON order.ID_Item = item.ID_Item INNER JOIN `receipt` ON order.ID_Receipt = receipt.ID_Receipt
                        WHERE order.ID_User = $ID_User AND receipt.Status = 'order'");

                        $stmt->execute();
                        while ($row = $stmt->fetch()) {
                            $total_price += ($row["Item_amount"] * $row["Item_price"]);
                            $id_receipt = $row["ID_Receipt"];
                            ?>

                            <div class="shopping-cart">
                                <h1 class="heading"> </h1> <br>
                                <table>
                                    <thead> <br>
                                        <th> IMAGE </th>
                                        <th> NAME </th>
                                        <th> PRICE </th>
                                        <th> AMOUNT </th>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <!-- IMAGE -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <img src="PRODUCT/img/<?php echo $row['Image_item']; ?>.jpg" width="250px" height="150px">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- NAME -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?= $row["Item_name"] ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- PRICE -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?= $row["Item_price"] ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- AMOUNT -->
                                            <td>
                                                <form method="post" action="edit.php">
                                                    <input type="submit" name="edit" class="btn" value="-">
                                                        <?php echo $row["Item_amount"] ?>
                                                     <input type="submit" name="edit" class="btn" value="+">
                                                    <input type="hidden" name="ID_Item" value=<?php echo $row['ID_Item']; ?>>
                                                    <input type="hidden" name="ID_Order" value=<?php echo $row['ID_Order'] ?>>
                                                </form>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        <?php
                        } ?>
                        
                        <div class="table-button">
                            <b> <a id="sum_price"> <?= " Total : " . $total_price . " ฿ " ?> </a> </b>
                            <form method="post" action="history.php"> <br>
                                <input type="hidden" name="ID_Receipt" value=<?php echo $id_receipt; ?>>
                                <input type="hidden" name="Total_price" value=<?php echo $total_price; ?>>
                                <input type="submit" name="submit" class="button" value=" Buy Now "/>
                            </form>
                        </div>
                        <?php               
                    }
                    if (isset($_COOKIE["order"])) {
                        // function submit()
                        // {
                        //     setcookie("order", "", time() + 3600 * 24);
                        //     header('location:home.php');
                        // }
                        // if (array_key_exists('submit', $_POST)) {
                        //     submit();
                        // }
                        $stmt = $pdo->prepare("SELECT * FROM `order` INNER JOIN `receipt` ON order.ID_Receipt = receipt.ID_Receipt
                        WHERE order.ID_Item = ? AND order.ID_User = ? AND receipt.Status = 'order'");
                        $stmt->bindParam(1, $_POST['ID_Item']);
                        $stmt->bindParam(2, $_SESSION['user_id']);

                        $stmt->execute();
                        $row = $stmt->fetch();
                        if ($row > 0) {
                            $item_amount = $row['Item_amount'] + 1;
                            $stmt = $pdo->prepare("UPDATE `order` SET Item_amount =? WHERE ID_Item=? AND ID_User = ?");
                            $stmt->bindParam(1, $item_amount);
                            $stmt->bindParam(2, $_POST['ID_Item']);
                            $stmt->bindParam(3, $_SESSION['user_id']);
                            $stmt->execute();
                        } else {
                            if (!empty($_COOKIE['order'])) {
                                unset($_COOKIE['order']);
                            }
                            $id_receipt = 0;
                            $stmt = $pdo->prepare("SELECT * FROM `receipt` WHERE ID_User = ? AND Status = 'order'");
                            $stmt->bindParam(1, $_SESSION['user_id']);
                            $stmt->execute();
                            $row = $stmt->fetch();
                            if($row == 0){
                                $stmt = $pdo->prepare("INSERT INTO `receipt` (Total_price,ID_User,Status) VALUES (0,?,'order')");
                                $stmt->bindParam(1, $_SESSION['user_id']);
                                $stmt->execute();
                                $stmt = $pdo->prepare("SELECT * FROM `receipt` WHERE ID_User = ? AND Status = 'order'");
                                $stmt->bindParam(1, $_SESSION['user_id']);
                                $stmt->execute();
                                $row = $stmt->fetch();
                                $id_receipt = $row["ID_Receipt"];
                            }
                            else{
                                $id_receipt = $row["ID_Receipt"];
                            }
                            $a = Date("Y-m-d H:i:s");
                            $stmt = $pdo->prepare("INSERT INTO `order` (ID_Item,ID_User,Item_amount,`Time`,ID_Receipt) VALUES (?,?,1,?,?)");
                            $stmt->bindParam(1, $_POST['ID_Item']);
                            $stmt->bindParam(2, $_SESSION['user_id']);
                            $stmt->bindParam(3, $a);
                            $stmt->bindParam(4, $id_receipt);
                            $stmt->execute();
                            $stmt = $pdo->prepare("SELECT * FROM `order` WHERE ID_Item = ? AND ID_User = ?");
                            $stmt->bindParam(1, $_POST['ID_Item']);
                            $stmt->bindParam(2, $_SESSION['user_id']);

                            $stmt->execute();
                            $row = $stmt->fetch();
                            $ID_Order = $row["ID_Order"];
                            // setcookie("order", $ID_Order, time() + 3600 * 24);
                        }
                        
                        $total_price = 0;
                        $ID_User = $_SESSION["user_id"];
                        $id_receipt = 0;
                        $stmt = $pdo->prepare("SELECT item.ID_Item ,item.Image_item,item.Item_name ,item.Item_price ,order.Item_amount ,order.ID_Order,order.ID_Receipt
                        FROM `order` INNER JOIN `item` ON order.ID_Item = item.ID_Item INNER JOIN `receipt` ON order.ID_Receipt = receipt.ID_Receipt
                        WHERE order.ID_User = $ID_User AND receipt.Status = 'order'");

                        $stmt->execute();

                        while ($row = $stmt->fetch()) {
                            $total_price += ($row["Item_amount"] * $row["Item_price"]);
                            $id_receipt = $row["ID_Receipt"];
                            ?>

                            <div class="shopping-cart">
                                <h1 class="heading"> </h1>

                                <table>
                                    <thead> <br>
                                        <th> IMAGE </th>
                                        <th> NAME </th>
                                        <th> PRICE </th>
                                        <th> AMOUNT </th>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <!-- IMAGE -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <img src="PRODUCT/img/<?php echo $row['Image_item']; ?>.jpg" width="250px" height="150px">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- NAME -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?= $row["Item_name"] ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- PRICE -->
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?= $row["Item_price"] ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <!-- AMOUNT -->
                                            <td>
                                                <form method="post" action="edit.php">
                                                    <input type="submit" name="edit" class="btn" value="-">
                                                        <?php echo $row["Item_amount"] ?>
                                                     <input type="submit" name="edit" class="btn" value="+"> 
                                                    <input type="hidden" name="ID_Item" value=<?php echo $row['ID_Item']; ?>>
                                                    <input type="hidden" name="ID_Order" value=<?php echo $row['ID_Order'] ?>>
                                                </form>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                    </tbody>

                                </table>

                            </div>

                        <?php
                        } ?>

                        <div class="table-button">
                            <b> <a id="sum_price"> <?= " Total : " . $total_price . " ฿ " ?> </a> </b>
                            <form method="post" action="history.php"> <br>
                                <input type="hidden" name="ID_Receipt" value=<?php echo $id_receipt; ?>>
                                <input type="hidden" name="Total_price" value=<?php echo $total_price; ?>>
                                <input type="submit" name="submit" class="button" value=" Buy Now "/>
                            </form>
                        </div>
                    <?php
                    }
                }
            } else {
                if(!isset($_COOKIE["order"])) {
                    ?>
                    <div class="choose">
                        <p text-align: center;> Choose Product </p>
                    </div>
                    <?php
                } else {

                    $total_price = 0;
                    $id_receipt = 0;
                    $ID_User = $_SESSION["user_id"];

                    $stmt = $pdo->prepare("SELECT item.ID_Item ,item.Image_item,item.Item_name ,item.Item_price ,order.Item_amount ,order.ID_Order,order.ID_Receipt
                    FROM `order` INNER JOIN `item` ON order.ID_Item = item.ID_Item INNER JOIN `receipt` ON order.ID_Receipt = receipt.ID_Receipt
                    WHERE order.ID_User = $ID_User AND receipt.Status = 'order'");

                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        $total_price += ($row["Item_amount"] * $row["Item_price"]); 
                        $id_receipt = $row["ID_Receipt"];
                        ?>

                        <div class="shopping-cart">
                            <h1 class="heading"> </h1>
                            <table>
                                <thead> <br>
                                    <th> IMAGE </th>
                                    <th> NAME </th>
                                    <th> PRICE </th>
                                    <th> AMOUNT </th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <!-- IMAGE -->
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <img src="PRODUCT/img/<?php echo $row['Image_item']; ?>.jpg" width="250px" height="150px">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td> &nbsp;

                                        <!-- NAME -->
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?= $row["Item_name"] ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td> 

                                        <!-- PRICE -->
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?= $row["Item_price"] ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>

                                        <!-- AMOUNT -->
                                        <td>
                                            <form method="post" action="edit.php">
                                                <input type="submit" name="edit" class="btn" value="-">
                                                    <?php echo $row["Item_amount"] ?> 
                                                <input type="submit" name="edit" class="btn" value="+"> 
                                                <input type="hidden" name="ID_Item" value=<?php echo $row['ID_Item']; ?>>
                                                <input type="hidden" name="ID_Order" value=<?php echo $row['ID_Order'] ?>>
                                            </form>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>

                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    <?php
                    } ?>
                    <div class="table-button">
                        <b> <a id="sum_price"> <?= "Total : " . $total_price . " ฿ " ?> </a> </b>
                        <form method="post" action="history.php"> <br>
                            <input type="hidden" name="ID_Receipt" value=<?php echo $id_receipt; ?>>
                            <input type="hidden" name="Total_price" value=<?php echo $total_price; ?>>
                            <input type="submit" name="submit" class="button" value=" Buy Now "/>
                        </form>
                    </div>
                    <?php
                        }
                        }
                    ?>
        </div>
    </div>

</body>

</html>