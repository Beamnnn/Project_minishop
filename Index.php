<?php include('connect.php'); ?>

<?php
    session_start();
    if(isset($_GET['logout']))
    {
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

    <title> MAIN </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./CSS/Sheet.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital@1&display=swap');
    </style>

</head>

<body>

    <div class="Header">
        <div class="Container">

            <!-- Menu Bar -->
            <div class="Menu-Bar">
                <div class="Logo">
                    <a href="index.php">
                        <img src="./PRODUCT/img/logo/logo.png" width="100%" height="100vh">
                    </a>
                </div>

                <script>
                    var xmlHttp;

                    function searchproduct(str) 
                    {
                        if (str.length == 0) {
                            document.getElementById("display").innerHTML = "";
                            document.getElementById("display").style.border = "0px";
                            return;
                        }
                        xmlHttp = new XMLHttpRequest();
                        xmlHttp.onreadystatechange = showshoenameStatus;

                        var shoename = document.getElementById("shoename").value;
                        var url = "searchproduct.php?shoename=" + shoename;
                        console.log(url)
                        xmlHttp.open("GET", url);
                        xmlHttp.send();
                    }

                    function showshoenameStatus()
                    {
                        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                        document.getElementById("display").innerHTML = this.responseText;
                        document.getElementById("display").style.color = "black";
                        }
                    }
                </script>

                <!-- Search --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <div id="search">
                    <form> 
                        <input class="box-search" id="shoename" name="us_fullname" type="text" placeholder="Search" onkeyup="searchproduct(this.value)">
                        <div id="display"> </div>
                    </form>
                </div>
                
                       
                    
                <Nav> <Ul>

                    <!-- List JSON -->
                    <div class="Dropdown-Brand" style="font-family: 'Mali', cursive;"> 
                        <Li> <a href="./PRODUCT/Brands/JsonBrand.php"> List </a> </Li>
                    </div>

                    <!-- Brands -->
                    <div class="Dropdown-Brand"  style="font-family: 'Mali', cursive;">
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
                    <div class="Dropdown-Brand"style="font-family: 'Mali', cursive;">
                        <Li> <a href="./PRODUCT/News/News.php"> News </a> </Li>
                    </div>

                    <div class="Dropdown-Brand"style="font-family: 'Mali', cursive;">
                    <li><a href="./data.php">Data</a></li>
                    </div>

                    <div class="Dropdown-Brand"style="font-family: 'Mali', cursive;">
                    <li><a href="./insert.php">Insert</a></li>
                    </div>

                    <!-- Log In & Log Out -->
                    <div class="Dropdown-Brand"style="font-family: 'Mali', cursive;">
                        <?php if(isset($_SESSION['username'])) { ?>
                            <Li> <a href="./Index.php ?logout='1'"> Log Out </a> </Li>
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
                    <div class="Dropdown-Brand" style="font-family: 'Mali', cursive;">
                        <?php if(isset($_SESSION['username'])) {
                            ?> <li> <b> <?php echo $_SESSION['username'];?> </b> </li>
                        <?php } ?>
                   

                    </div>
                    
                </Ul> </Nav>
                
            </div>

            <!-- Welcome -->
            
            <div class="Subsection" style="font-family: 'Mali', cursive; font-size: 18px;">
                <div class="Content-1">
                    <h1 style="font-size: 30px; text-shadow:deeppink 5px 0 30px; color:crimson; text-align: center;">สอ สอ store</h1> 
                    <h1  style="font-size: 22px; text-shadow:mediumpurple 1px 0 10px; color:darkslateblue; text-align: center;"> ร้านเครื่องเขียนเป็นร้านค้าที่มีการจำหน่ายและขายเครื่องเขียนและอุปกรณ์ที่เกี่ยวข้องกับการเขียนและงานสำนักงาน 
                        ร้านเครื่องเขียนมักมีสินค้าหลากหลายประเภทที่ออกแบบมาเพื่อตอบสนองความต้องการของลูกค้า
                        ที่มีความสนใจในเรื่องการเขียนและสิ่งที่เกี่ยวข้องกับการใช้งานในสำนักงานหรือในชีวิตประจำวันของพวกเรา </h1>
                    
                    
                </div>

                <div class="Content-1">
                <img src="./PRODUCT/img/logo/ex.jpg" alt="" style="width: 500px; height: 550px;">

                </div>
            </div>
            
        </div>
    </div>

</body>

</html>