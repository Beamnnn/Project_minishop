<?php include "connect.php" ?>

<?php
session_start();
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];

    if (empty($fullname)) {
        $_SESSION['error'] = "กรุณากรอกชื่อ";
        header('location:register.php');
    } else if (empty($username)) {
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
        header('location:register.php');
    } else if (empty($email)) {
        $_SESSION['error'] = "กรุณากรอกอีเมล";
        header('location:register.php');
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "รูปเเบบอีเมลไม่ถูกต้อง";
        header('location:register.php');
    } else if (empty($password)) {
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header('location:register.php');
    } else if (empty($tel)) {
        $_SESSION['error'] = "กรุณากรอกเบอร์โทรศัพท์";
        header('location:register.php');
    } else {
        try {
            $check_email = $pdo->prepare("SELECT email FROM user WHERE email = ?");
            $check_email->bindParam(1, $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['email'] == $email) {
                $_SESSION['warning'] = "อีเมลนี้มีผู้ใช้งานแล้ว";
                header('location:register.php');
            } else if (!isset($_SESSION['error'])) {
                $stmt = $pdo->prepare("INSERT INTO user(Fullname,Username,email,Password,tel) VALUES(?,?,?,?,?)");
                $stmt->bindParam(1, $fullname);
                $stmt->bindParam(2, $username);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $password);
                $stmt->bindParam(5, $tel);
                $stmt->execute();   /* เพิ่มข้อมูลลงในฐานข้อมูล */

                /* เมื่อเพิ่มข้อมูลลงในฐานข้อมูลแล้ว ให้เก็บข้อมูลลงในตัวแปร session */
                $_SESSION['success'] = "สมัครสมาชิกสำเร็จ ! <a href='login.php' class='alert_link'>เข้าสู่ระบบ</a>";
                header('location:login.php');
            } else {
                $_SESSION['error'] = 'มีบางอย่างผิดพลาด';
                header('location: signUp.php');
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header('location:register.php');
        }
    }
}