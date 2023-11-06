<?php include('../../connect.php'); ?>

<?php
session_start();
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

    <title> NEWS </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"> </script>

    <!-- Dom 1 -->
    <script>
        function myFunction() {
            var x = document.getElementById("myNew");
            x.querySelector(".name").innerHTML = "ปากกาหมึกเจล เพนเทลBLN77 Energel 0.7 มม. ";
        }
    </script>

    <!-- Dom 2 -->
    <script>
        function over() {
            var titleObject = document.getElementById("new");
            titleObject.style.fontSize = "30px";
        }

        function out() {
            var titleObject = document.getElementById("new");
            titleObject.style.fontSize = "20px";
        }
    </script>

    <link rel="stylesheet" href="../../CSS/News.css">

    <style>
        .show {
            background-color: antiquewhite;
            border-radius: 8px;
            color: black;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .Contain{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

    </style>

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
                            <Li> <a href="../Brands/JsonBrand.php"> List </a> </Li>
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
                                <a href="../Brands/notebook/notebook.php"> Notebook </a>
                                <a href="../Brands/highlight_pen/highlight_pen.php"> Highlight pen </a>
                            </div>
                        </div>

                        <!-- News -->
                        <div class="Dropdown-Brand">
                            <Li> <a href="./News.php"> News </a> </Li>
                        </div>

                        <!-- Log In & Log Out -->
                        <div class="Dropdown-Brand">
                            <?php if (isset($_SESSION['username'])) { ?>
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
                            <?php if (isset($_SESSION['username'])) {
                            ?> <li> <b> <?php echo $_SESSION['username']; ?> </b> </li>
                            <?php } ?>
                        </div>

                    </Ul>
                </Nav>
            </div>

        </div>

        <div class="Layout">

            <div class="News">
                <br>
                <h2> News Product </h2> <br>

                <!-- Dom 1-->
                <div id="myNew">
                    <b class="name" style="font-size: 20px;"> Product </b> 
                    <button class="show" onclick="myFunction()"> Show Name Product </button>
                </div>

                <div class="Contain" >
                        <img src="../News/Photo/ex.jpg" width="500" height="500" > <br>
                        <img src="../News/Photo/the best seller.jpg" width="1080" height="200" >
                </div>


                <!-- Dom 2 -->
                <div class="Right" id="new" onmouseover="over()" onmouseout="out() " > 
              <p style="font-family: 'Mali', cursive; text-align:right ;  color:black" > 
                     สินค้าดีสินค้าดังต้อง สอสอ store <a href="../../Index.php">คลิ๊ก</a>
                    </p>
                </div>
            </div>

        </div>

    </div>
    </div>

</body>

</html>