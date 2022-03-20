<?php 
    /// ************* COPY CODE FROM registeraction.php *****************
    // ดึงข้อมลูจากไฟล์ sever.php
    session_start();
    include('server.php');

    // ดึงข้อมลูการตรวจสอบ errors จากไฟล์ errors.php
    $errors = array();

    // ใส่ข้อมูล เข้า Database
    if (isset($_POST['change_password_user'])) {
        //ดึงข้อมูลจาก การสมัครมาใช้ในการเปลี่ยนรหัสผ่าน
        //include('registeraction.php');
        //กำหนด username แทน ไอดี เพราะ ลองดึง id มาเทียบแล้ว ไม่สามารถทำงานได้ 
        //เพราะ เป็นตัวเลขอัตโนมัติ +1 ขึ้นเรื่อยๆ จึงยากต้องการดึงมาใช้
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $password_3 = $_POST['password_3'];

        // ตรวจสอบว่า แต่ละช่อง input ไม่ได้ว่างเปล่า
        if (empty($password_1)) {
            array_push($errors, "Old Password is required");
            $_SESSION['error'] = "Old Password is required";
        } 
        if (empty($password_2)) {
            array_push($errors, "New Password is required");
            $_SESSION['error'] = "New Password is required";
        } 
        
        // ตรวจสอบ ว่า รหัสผ่าน กับ Confirm รหัสผ่าน ต้องเหมือนกัน
        if ($password_2 != $password_3) {
            array_push($errors, "New passwords & Confirm New Password  do not match");
            $_SESSION['error'] = "New passwords & Confirm New Password  do not match";
        }
         
        // ให้ตรวจสอบ ว่าไม่มี errors จึงแปลง password เป็น md5 
        if (count($errors) == 0) {

            $password_1 = md5($password_1);
            $password_2 = md5($password_2);
            $sql = "SELECT password FROM user WHERE username = '$username' AND password = '$password_1' ";
            $result = mysqli_query($link, $sql);
            
            if(mysqli_num_rows($result) == 1) {
            // ใส่ข้อมูลลง from 
            $sql_2 = "UPDATE user SET password='$password_2' WHERE username = '$username' ";
            mysqli_query($link, $sql_2);
            header('location: login.php?Your password has been changed successfully!'); 
            }
        } else {
            array_push($errors, "Wrong Username or Old Password");
            $_SESSION['error'] = "Wrong Username or Old Password!";
            header("location: change_password.php");
        }
    }   
    else {
        array_push($errors, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: change_password.php");
    }
?>





