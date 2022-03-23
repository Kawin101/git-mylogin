<?php 
    // ดึงข้อมลูจากไฟล์ sever.php
    session_start();
    include('server.php');
    // ดึงข้อมลูการตรวจสอบ errors จากไฟล์ errors.php
    $errors = array();
    // ใส่ข้อมูล เข้า Database
    if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        // ตรวจสอบว่า แต่ละช่อง input ไม่ได้ว่างเปล่า
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }
        if (empty($phone)) {
            array_push($errors, "Phone is required");
            $_SESSION['error'] = "Phone is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($question)) {
            array_push($errors, "Question is required");
            $_SESSION['error'] = "Question is required";
        }
        if (empty($answer)) {
            array_push($errors, "Answer is required");
            $_SESSION['error'] = "Answer is required";
        }
        //ตั้งเงื่อนไข ว่า "1 username มีได้แค่ 1 email เท่านั้น"
        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($link, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        
        // ตรวจสอบ ถ้าผู้ใช้ออกจากระบบ
        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
        // ให้ตรวจสอบ ว่าไม่มี errors จึงแปลง password เป็น md5 
        if (count($errors) == 0) {
            // แปลง int เป็น md5
            $password = md5($password_1);
            $question = md5($question);
            $answer = md5($answer);
            // ใส่ข้อมูลลง from 
            $sql = "INSERT INTO user (username, password, phone, email, question, answer) 
            VALUES ('$username', '$password', '$phone', '$email', '$question', '$answer')";
            mysqli_query($link, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');
        } else {
            header("location: register.php");
        }
}   
?>