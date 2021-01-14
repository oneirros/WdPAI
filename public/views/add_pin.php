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
        <ul>
            <li>
                <i class="fas fa-map-marked-alt"></i>
                <a href="/trip_plan" class="button" >Architektura Slask</a>
            </li>
            <li>
                <i class="fas fa-map-marked-alt"></i>
                <a href="#" class="button" >Trasa Rowerowa</a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="add_trip_form">
            <h1 class="">ADD PIN</h1>
            <form action="add_pin" method="POST" ENCTYPE="multipart/form-data">
                <div class="failure-message">
                    <?php if (isset($messages)) {

                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="destination" type="text" placeholder="destination">
                <input name="arrival-time" type="text" placeholder="arrival time (e.g. 12:30)">
                <input name="departure-time" type="text" placeholder="departure time (e.g. 14:00)">
                <textarea name="description" rows="10" placeholder="description"></textarea>

                <input name="file" type="file" class="upload-button">
                <button class="log-button" type="submit">send</button>
            </form>

        </section>
    </main>
</div>
</body>
