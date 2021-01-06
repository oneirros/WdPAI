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
            <div class="message">
                <?php if (isset($messages)) {

                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <div class="login-logup">
                <i class="fas fa-circle-notch"></i>
                <button class="log-button">Log in</button>
<!--                <a href="login.php">Log in</a>-->
                <i class="fas fa-circle-notch"></i>
                <button class="log-button" >Log up</button>
<!--                <a href="public/views/registration.php">Log up</a>-->

            </div>
            <form action="login" method="POST">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">login</button>
            </form>
        </div>
    </div>
</body>

