<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <title> LOGIN PAGE </title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="public/image/logo.svg">
    </div>
    <div class="login-container">
        <div class="failure-message">
            <?php if (isset($messages)) {

                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>gt
        </div>
        <div class="login-logup">
            <a href="/registration">
                <i class="fas fa-circle-notch"></i>
                <button class="sign-up-button">Sign up</button>
            </a>
        </div>
        <form action="login" method="POST">
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <button class="log-button" type="submit">login</button>
        </form>
    </div>
</div>
</body>