<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title> REGISTRATION PAGE </title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="public/image/logo.svg">
    </div>
    <div class="registration-container">
        <div class="login-logup">
            <a href="/">
                <i class="fas fa-circle-notch"></i>
                <button class="sign-up-button">Log in</button>
            </a>
        </div>
        <form action="register" method="POST">
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <input name="confirm-password" type="password" placeholder="confirm password">
            <button class="log-button" type="submit">register</button>
        </form>
    </div>
</div>
</body>

