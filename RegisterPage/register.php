<?php
    include 'connect.php';
    //require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <div class="loginForm">
        <form method="post>
            <div class="text-input">
                <label for="username">Email or username</label>
                <input type="text" placeholder="Username" id="username">
            </div>
            <div class="text-input">
                <label for="password">Password</label>
                <input type="text" placeholder="Password" id="password">
            </div>
            <div class="text-input">
                <label for="password">Confirm Password</label>
                <input type="text" placeholder="Confirm Password" id="password">
            </div>
            
            <div class="login-button">
                <button type="submit">Register</button>
            </div>
            <p>Already have an account? <a>Log in here</a>.</p>
        </form>
    </div>
</body>
</html>