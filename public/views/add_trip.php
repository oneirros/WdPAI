<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <title> TRIPS PAGE</title>
</head>

<body>
<div class="base-container">
    <nav>
        <div class="small-logo">
            <img src="public/image/logo.svg">
        </div>
    </nav>
    <main>
        <section class="add_trip_form">
            <h1>ADD NEW TRIP</h1>
            <form action="add_trip" method="POST">
                <input name="title" type="text" placeholder="title">
                <button class="log-button" type="submit">send</button>
            </form>

        </section>
    </main>
</div>
</body>
