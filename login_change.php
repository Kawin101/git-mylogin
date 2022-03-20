<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Chang Password Page</title>
</head>
<body>
    
    <div class="header">
        <h2>Login Chang Password</h2>
    </div>
    <!-- ดึงข้อมูลจากไฟล์ reset_db.php มาทำงาน-->
    <form action="login_change_db.php" method="post">
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
            <label for="question">Question about you?</label>
            <input type="question" name="question">
        </div>
        <div class="input-group">
            <label for="answer">Answer in Question!</label>
            <input type="answer" name="answer">
        </div>

            <button type="submit" name="login_change" >Complete</button>
            <button type="reset" name="reset" >Cancel</button>
        </div>
        <p>Not yet a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>