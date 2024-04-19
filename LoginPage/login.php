<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Log in</h1>
    <div class="loginForm">
        <form>
            <div class="text-input">
                <label for="username">Email or username</label>
                <input type="text" placeholder="Username" id="username">
            </div>
            <div class="text-input">
                <label for="password">Password</label>
                <input type="text" placeholder="Password" id="password">
            </div>
            <div class="password-option">
                <label for="remember-password"><input type="checkbox" id="remember-password">Remember me</label>
                <a>Forgot password?</a>
            </div>
            <div class="login-button">
                <button type="submit">Log In</button>
            </div>
            <p>Don't have an account? <a>Register</a></p>
        </form>
    </div>
</body>
</html>