<?php 
    session_start();
    include('server.php'); 
?>
<!-- UI -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form  action="registeraction.php" method="post" >
        
        <!--
        Name:<input type="text" name="textname"> 
        Phone:<input type="text" name="textphone"> 
        <input type="submit" value="insert friend">
        -->
        <!-- คำสั่ง ดึงข้อมูลจากไฟล errors.php มาทำงานในหน้านี้ -->
        <?php include('errors.php'); ?>
        <!-- เริ่ม การทำงานของ if -->
        <?php if (isset($_SESSION['error'])) : ?>
            <!-- สร้าง class เพื่อง่ายต่อการทำ UI ในไฟล์ style.css -->
            <div class="error"> 
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <!-- ปิดการทำงานของ if -->
        <?php endif ?>  

        <div class="input-group">
            <label for="username">Username</label>
            <input type="username" name="username">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <label for="phone">Phone</label>
            <input type="phone" name="phone">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="question">Question about you?</label>
            <input type="question" name="question">
        </div>
        <div class="input-group">
            <label for="answer">Answer in Question!</label>
            <input type="answer" name="answer">
        </div>

        <!-- Button -->
        <div class="input-group">
            <button type="submit" name="reg_user" >Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>