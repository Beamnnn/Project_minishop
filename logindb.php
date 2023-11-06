<?php
    session_start();
    require_once('connect.php');

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

    if (empty($username)) {
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
        header('location:login.php');
    } else if (empty($password)) {
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header('location:login.php');
    } else {
        try {
                $check_data = $pdo->prepare("SELECT * FROM user WHERE Username = ?");
                $check_data->bindParam(1, $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {
                    if ($username == $row['Username']) {
                        if ($password == $row['Password']) {
                            $_SESSION['user_id'] = $row['ID_User'];
                         $_SESSION['username'] = $row['Username'];
                        header("location: index.php");
                        } else {
                            $_SESSION['error'] = 'Password Valid !';
                            header('location:login.php');
                        }
                    }
                } else {
                    $_SESSION['error'] = 'UserName valid !';
                    header('location:login.php');
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
                header('location:register.php');
            }
        }
    }