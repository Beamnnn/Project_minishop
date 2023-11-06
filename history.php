<?php include('connect.php'); ?>

<?php
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: Index.php');
    }
    if (!($_SESSION['username'])) {
        header('location: Index.php');
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> HISTORY </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./CSS/History.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital@1&display=swap');
    </style>
</head>

<body>

    <?php
        if (isset($_SESSION['user_id'])) {
            $ID_User = $_SESSION['user_id'];
            $stmt = $pdo->prepare("SELECT * FROM user WHERE ID_User = $ID_User");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    ?>

    <?php
    if(!empty($_POST['submit'])) {
        $id_rec = $_POST['ID_Receipt'];
        $total_price = $_POST['Total_price'];
        $stmt = $pdo->prepare("UPDATE `receipt` SET Status = 'confired' , Total_price = $total_price WHERE ID_Receipt = $id_rec");
        $stmt->execute();
    }
    ?>

    <div class="Header" style="font-family: 'Mali', cursive;">
        <div class="Container">
            
            <!-- Menu Bar -->
            <div class="Menu-Bar">
                <div class="Logo">
                    <a href="./Index.php" class="logo">
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
                            <Li> <a href="#"> Brands </a> </Li>
                            <div class="Brand-Content">
                                <a href="./PRODUCT/Brands/pencil/pencil.php"> Pencil </a>
                                <a href="./PRODUCT/Brands/pen/pen.php"> Pen </a>
                                <a href="./PRODUCT/Brands/eraser/eraser.php"> Eraser </a>
                                <a href="./PRODUCT/Brands/Liquid_paper/Liquid_paper"> Liquid Paper </a>
                                <a href="./PRODUCT/Brands/pencil_click/pencil_click.php"> Pencil Click </a>
                                <a href="./PRODUCT/Brands/pencil_box/pencil_box.php"> Pencil Box </a>
                                <a href="./PRODUCT/Brands/ruler/ruler.php"> Ruler </a>
                                <a href="./PRODUCT/Brands/notebook/notebook.php"> NoteBook </a>
                                <a href="./PRODUCT/Brands/highlight_pen/highlight_pen.php"> Highlight Pen </a>
                            </div>
                        </div>

                        <!-- News -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./PRODUCT/News/News.php"> News </a> </Li>
                        </div>

                        <!-- Log In & Log Out -->
                        <div class="Dropdown-Brand">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <Li> <a href="./Index.php?logout='1'"> Logout </a> </Li>
                            <?php } else { ?>
                                <Li> <a href="./Login.php"> Login </a> </Li>
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
            <section>
                <div class="profile-component">
                    <?php
                        $us = $pdo->prepare("SELECT * FROM user WHERE ID_User = $ID_User");
                        $us->execute();

                        if ($us->rowCount() > 0) {
                            while ($row = $us->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <div action="" method="post" class="profilebox">
                            <br>
                                <h2>
                                    Account : 
                                    <?php echo $row['Username']; ?>
                                </h2>
                            <br>
                            <div class="">
                                <p> รหัสสมาชิก :
                                    <?php echo $row['ID_User']; ?>
                                </p>
                            </div> <br>

                            <ul class=".detail">
                                <li class="nav-item">
                                    <a class="button" href="./user.php"> Personal Information </a>
                                </li> <br>

                                <li class=".detail">
                                    <b> <h2> <a class="history" aria-current="page" href="./history.php"> ประวัติการสั่งซื้อ </a> </h2> </b>
                                </li>
                            </ul>
                            <?php 
                                $sql = $pdo->prepare("SELECT `order`.`ID_Item`,item.Item_name ,`order`.`ID_Order`,`order`.`ID_User`,`order`.`Item_amount`,receipt.Total_price ,`order`.`Time` , item.Item_price , receipt.ID_Receipt
                                FROM `order`INNER JOIN receipt ON `order`.`ID_Receipt` = receipt.ID_Receipt
                                INNER JOIN item ON item.ID_Item = order.ID_Item WHERE order.ID_User = $ID_User
                                ORDER BY order.Item_amount DESC ");
                                $sql->execute(); 
                            ?>
                            <div class="detail">
                                <table class="table">
                                    <th> Receipt </th>
                                    <th> Product </th>
                                    <th> Price </th>
                                    <th> Quantity </th>
                                    <th> YY:MM:DD </th>
                                    <?php while ($row = $sql->fetch()) { ?>
                                    <tr class="table-light">
                                    <td><?= $row["ID_Receipt"] ?></td>
                                        <td><?= $row["Item_name"] ?></td>
                                        <td><?= $row["Item_price"]*$row["Item_amount"] ?></td>
                                        <td><?= $row["Item_amount"] ?></td>
                                        <td><?= $row["Time"] ?></td>
                                       
                                    </tr>

                                    <?php } ?>
                                </table>
                            </div>

                        <?php
                            };
                        };
                    ?>
                </div>
            </section>
        </div>
      
    </div>
   
</body>

</html>