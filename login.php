<?php
    include 'connect.php';
    //require_once 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/loginstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Log in</h1>
    <div class="loginForm">
        <form method="post">
            <div class="text-input">
                <label for="username">Email or username</label>
                <input type="text" placeholder="Username" id="username" name="txtusername">
            </div>
            <div class="text-input">
                <label for="password">Password</label>
                <input type="text" placeholder="Password" id="password" name="txtpassword">
            </div>
            <?php
                
                if(isset($_POST['btnLogin'])){
                    $uname=$_POST['txtusername'];
                    $pwd=$_POST['txtpassword'];    
                    //check tbluseraccount if username is existing
                    $sql ="Select * from tbluseraccount where username='".$uname."'";
                    
                    $result = mysqli_query($connection,$sql);
                    
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_array($result);

                    $incorrect_input = "incorrect-input";
                    
                    if($count== 0){
                              echo "<p style='color:red;'>User does not exist.</p> <br>";
                    }else if($row[3] != $pwd) {
                              echo "<p style='color:red;'>Password is incorrect.</p> <br>";
                    }else{
                        $_SESSION['username']=$row[0];
                        header("location: dashboard.php");
                    }
                        
                    
                }
                    
            
            
                
            ?>
            <div class="password-option">
                <label for="remember-password"><input type="checkbox" id="remember-password">Remember me</label>
                <a>Forgot password?</a>
            </div>
            <div class="login-button">
                <button type="submit" name="btnLogin">Log In</button>
            </div>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>






