<?php 
    // ดึงข้อมลูจากไฟล์ sever.php
    session_start();
    include('server.php');
    // ดึงข้อมลูการตรวจสอบ errors จากไฟล์ errors.php
    $errors = array();
    if (isset($_POST['login_change'])) {
        $username = $_POST['username'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($question)) {
            array_push($errors, "Question is required");
        }

        if (empty($answer)) {
            array_push($errors, "Answer is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $question = md5($question);
            $answer = md5($answer);
            $query = "SELECT * FROM user WHERE username = '$username' AND question = '$question' AND answer = '$answer' ";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) == 1) {
                
                $_SESSION['username'] = $username;
                $_SESSION['answer'] = $answer;
                header("location: change_password.php");
            } else {
                array_push($errors, "Wrong Username or Answer");
                $_SESSION['error'] = "Wrong Username or Answer!";
                header("location: login_change.php");
            }
        } else {
            array_push($errors, "Username & Answer is required");
            $_SESSION['error'] = "Username & Answer is required";
            header("location: login_change.php");
        }
    }
?>