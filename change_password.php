<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chang Password Page</title>
</head>
<body>
    
    <div class="header">
        <h2>Chang Password</h2>
    </div>
    <!-- ดึงข้อมูลจากไฟล์ reset_db.php มาทำงาน-->
    <form action="change_password_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <!-- จบการทำงาน ของ function if-->
        <div class="input-group">
            <label for="username">Username</label>
            <input type="username" name="username">
        </div>
        <div class="input-group">
            <label for="$password_1">Old Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">New Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <label for="password_3">Confirm New Password</label>
            <input type="password" name="password_3">
        </div>

            <button type="submit" name="change_password_user" class="" >Change Password</button>
            <button type="reset" name="reset" >Cancel</button>
        </div>
        <p>Not yet a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>