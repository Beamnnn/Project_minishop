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
    
    <title> LOGIN </title>

    <script src="https://kit.fontawesome.com/e6f31724cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./CSS/Login.css">

</head>

<body>

    <div class="container">
        <h1> Log In </h1>

        <form name="registration" class="registartion-form" onsubmit="return formValidation()" action="logindb.php" method="post">
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

        <table>

            <!-- User name -->
            <tr>
                <td> <label for="name"> User Name : </label> </td>
                <td> <input type="text" name="username" id="username" placeholder="Your Name" aria-describedby="username"
                    value="<?php if (isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>" style="border-radius: 5px;">
                </td>
            </tr>

            <!-- Password -->
            <tr>
                <td> <label for="password"> Password : </label> </td>
                <td> <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="password"
                    value="<?php if (isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" style="border-radius: 5px;">
                </td>
            </tr>

            <!-- Remember Me -->
            <tr>
                <td> <input type="checkbox" name="remember" class="form-control" <?php if (isset($_COOKIE['username'])) { ?> checked <?php } ?>> Remember Me </td>
            </tr>

            <!-- Log In -->
            <tr>
                <td colspan="2"> <input type="submit" class="submit" value="Login" name="login" /> </td>
            </tr>

            <!-- สมัครสมาชิก -->
            <tr>
                <td>
                    <p class=""> สมัครสมาชิก <a href="register.php" class="form-control"> Register </a> </p>
                </td>
            </tr>
            
        </table>
        
        </form>

    </div>
    
</body>

</html>