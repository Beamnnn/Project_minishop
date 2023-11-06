<?php
    session_start();
    require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> REGISTER </title>

    <link rel="stylesheet" href="./CSS/Register.css">

</head>

<body>

    <div class="container">
        <h1> Register </h1>

        <form action="registerdb.php" method="post" name="registration" class="registartion-form" class="register-form">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert-danger" role="alert">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert-success" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['warning'])) { ?>
            <div class="alert-warning" role="alert">
                <?php
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
                ?>
            </div>
        <?php } ?>

        <table>

            <!-- Full Name -->
            <tr>
                <td> <label for="Username"> Full Name : </label> </td>
                <td> <input type="text" name="fullname" id="fullname" placeholder="Fullname" aria-describedby="fullname" style="border-radius: 5px;"> </td>
            </tr>

            <!-- User Name -->
            <tr>
                <td> <label for="Username"> User Name : </label> </td>
                <td> <input type="text" name="username" id="username" placeholder="Username" aria-describedby="username" style="border-radius: 5px;"> </td>
            </tr>

            <!-- Email -->
            <tr>
                <td> <label for="email"> Email : </label> </td>
                <td> <input type="email" class="form-control" id="email" name="email" placeholder="example@hotmail.com" aria-describedby="email" maxlength="30" style="border-radius: 5px;"> </td>
            </tr>

            <!-- Password -->
            <tr>
                <td> <label for="password"> Password : </label> </td>
                <td> <input type="password" class="form-control" id="password" name="password" placeholder="ความยาวไม่เกิน 6 ตัวอักษร" aria-describedby="password" maxlength="20" minlength="6" style="border-radius: 5px;"> </td>
            </tr>

            <!-- Mobile -->
            <tr>
                <td> <label for="tel"> Mobile : </label> </td>
                <td> <input type="tel" class="form-control" id="tel" name="tel" placeholder="Tel" aria-describedby="tel" pattern="[0]{1}[0-9]{9}" style="border-radius: 5px;"> </td>
            </tr>

            <!-- Register -->
            <tr>
                <td colspan="2"> <input type="submit" class="submit" value="Register" name="register" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 5px;"> </td>
            </tr>
            
            <!-- เป็นสมาชิกเเล้ว -->
            <tr>
                <td>
                    <p> เป็นสมาชิกเเล้ว &nbsp; <a href="login.php" class="form-control"> Log In </a></p>
                </td>
            </tr>
        </table>

        </form>

    </div>

</body>

</html>