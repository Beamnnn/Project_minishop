<?php include('../../connect.php'); ?>

<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: Index.php');
    }
?>
<?php
    $currentPage = 0; // กำหนดค่าเริ่มต้น

    if (isset($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    } else {
        // หากไม่มี 'page' ใน URL ให้เปลี่ยนไปหน้าแรก
        header('Location: JsonBrand.php?page=0');
        exit; // ออกจากการทำงานของสคริปต์
    }
    
    $itemsPerPage = 13; // กำหนดจำนวนรายการต่อหน้า
    $offset = $currentPage * $itemsPerPage;

    // ปรับ SQL เพื่อเลือกข้อมูลที่จะแสดง
    $stmt = $pdo->prepare("SELECT * FROM item LIMIT $itemsPerPage OFFSET $offset");
    $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> SHOE BRANDS </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"> </script>

    <link rel="stylesheet" href="../../CSS/Brands.css">

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
                    <a href="../../Index.php">
                        <img src="../img/logo/logo.png" width="100%" height="100vh">
                    </a>
                </div>
                
                <Nav>
                    <Ul>

                        <!-- List JSON -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./JsonBrand.php"> List </a> </Li>
                        </div>

                        <!-- Brands -->
                            <div class="Dropdown-Brand">
                            <Li> <a href=""> Brands </a> </Li>
                            <div class="Brand-Content">
                                <a href="../Brands/pencil/pencil.php"> Pencil </a>
                                <a href="../Brands/pen/pen.php"> Pen </a>
                                <a href="../Brands/eraser/eraser.php"> Eraser </a>
                                <a href="../Brands/Liquid_paper/Liquid_paper.php"> Liquid Paper </a>
                                <a href="../Brands/pencil_click/pencil_click.php"> Pencil Click </a>
                                <a href="../Brands/pencil_box/pencil_box.php"> Pencil Box </a>
                                <a href="../Brands/ruler/ruler.php"> Ruler </a>
                                <a href="../Brands/notebook/notebook.php"> NoteBook </a>
                                <a href="../Brands/highlight_pen/highlight_pen.php"> Highlight Pen </a>
                            </div>
                        </div>

                        <!-- News -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../News/News.php"> News </a> </Li>
                        </div>

                        <!-- Log In & Log Out -->
                        <div class="Dropdown-Brand">
                            <?php if(isset($_SESSION['username'])) { ?>
                                <Li> <a href="../../Index.php?logout='1'"> Log Out </a> </Li>
                            <?php } else { ?>
                                <Li> <a href="../../Login.php"> Log In </a> </Li>
                            <?php } ?>
                        </div>

                        <!-- Cart -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../../cart.php"> <i class="fa-sharp fa-solid fa-bag-shopping"></i> </a> </Li>
                        </div>

                        <!-- User -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="../../user.php"> <i class="fa-solid fa-user"> </i> </a> </Li>
                        </div>

                        <!-- Name -->
                        <div class="Dropdown-Brand">
                            <?php if(isset($_SESSION['username'])) { ?>
                                <li>
                                    <b>
                                        <?php echo $_SESSION['username'];?>
                                    </b>
                                </li>
                            <?php } ?>
                        </div>
                        
                    </Ul>
                </Nav>   
            </div>

        </div>
    </div>

    <div class="Layout">
        
        <section class="Content_Space" style="font-size: 17px; text-align: center; font-family: 'Mali', cursive;">
            <br> <b> <div id="Content_Title"> LIST </div> </b> <br>
        
            <div class="display-section" style="font-family: 'Mali', cursive;">
                <div class="box">
                    <?php
                        $stmt = $pdo->prepare("SELECT * FROM item LIMIT $itemsPerPage OFFSET " . ($currentPage * $itemsPerPage));
                        $stmt->execute();
                        $row =$stmt->fetch();
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {   
                                $jsondata = $row['Item_data'];  
                                $myJSON = json_decode($jsondata);    
                    ?>
            
                    <b> <div div id="Content"><?= $myJSON->Brand ?></div> </b>
                    <div id="Content"><?= $myJSON->Item_name ?></div>
                    <div id="Content"><?= $myJSON->Price ?></div><br>
                    <?php
                        }
                        }
                    ?>
                </div>
            </div>
            <div class="pagination">
                    <?php if ($currentPage > 0) : ?>
                        <a href="JsonBrand.php?page=<?= $currentPage - 1 ?>">ก่อนหน้า</a>
                    <?php endif; ?>

                    <?php if ($stmt->rowCount() == $itemsPerPage) : ?>
                        <a href="JsonBrand.php?page=<?= $currentPage + 1 ?>">ถัดไป</a>
                    <?php endif; ?>
                </div>
        </section>
        <br>

    </div>

</body>

</html>