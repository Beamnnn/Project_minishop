<?php
    session_start();
    require_once('../../../connect.php');
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: Index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> ruler </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"> </script>
    
    <link rel="stylesheet" href="../../../CSS/Brands.css">

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
                    <a href="../../../Index.php" style="display: flex; align-items: flex-start;">
                        <img src="../../img/logo/logo.png" class="logonav" style="width: 100px; height: auto;">
                    </a>
                </div>

                <Nav>
                    <Ul>

                        <!-- List JSON -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../JsonBrand.php"> List </a> </Li>
                        </div>

                        <!-- Brands -->
                        <div class="Dropdown-Brand">
                            <Li> <a href=""> Brands </a> </Li>
                            <div class="Brand-Content">
                                <a href="../../Brands/pencil/pencil.php"> Pencil </a>
                                <a href="../../Brands/pen/pen.php"> Pen </a>
                                <a href="../../Brands/eraser/eraser.php"> Eraser </a>
                                <a href="../../Brands/Liquid_paper/Liquid_paper.php"> Liquid Paper </a>
                                <a href="../../Brands/pencil_click/pencil_click.php"> Pencil Click </a>
                                <a href="../../Brands/pencil_box/pencil_box.php"> Pencil Box </a>
                                <a href="../../Brands/ruler/ruler.php"> Ruler </a>
                                <a href="../../Brands/notebook/notebook.php"> Notebook </a>
                                <a href="../../Brands/highlight_pen/highlight_pen.php"> Highlight pen </a>
                            </div>
                        </div>

                        <!-- News -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../../News/News.php"> News </a> </Li>
                        </div>

                        <!-- Log In & Log Out -->
                        <div class="Dropdown-Brand">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <Li> <a href="../../../Index.php?logout='1'"> Log Out </a> </Li>
                            <?php } else { ?>
                                <Li> <a href="../../../Login.php"> Log In </a> </Li>
                            <?php } ?>
                        </div>

                        <!-- Cart -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../../../cart.php"> <i class="fa-sharp fa-solid fa-bag-shopping"></i> </a> </Li>
                        </div>
                
                        <!-- User -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../../../user.php"> <i class="fa-solid fa-user"> </i> </a> </Li>
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
    </div>

    <div class="Layout" style="font-family: 'Mali', cursive;">
    
        <br>
        <div class="Brands">
            <h2> Ruler </h2><br>
        </div>

        <div class="display-section">
            <?php
                $items = $pdo->prepare("SELECT * FROM item where Type_item = 'ruler' ");
                $items->execute();
                if ($items->rowCount() > 0) {
                    while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="box">
                <form action="../../../cart.php" method="post">
                    <div class="img-shoe">
                        <img src="../ruler/imgruler/<?php echo $row['Image_item']; ?>.jpg" width="320px" height="200px">
                    </div>
                    <div class="item-name">
                        <?php echo $row['Item_name']; ?>
                    </div>
                    <div class="item-price">
                        <b> <?php echo $row['Item_price']; ?> ฿ </b>
                    </div>
                    <input type="hidden" name="ID_Item" value=<?php echo $row["ID_Item"]; ?>>
                    <input type="submit" name="add" value="Addtocart" class="add-to-cart">
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