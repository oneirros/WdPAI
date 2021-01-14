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
        <div class="trip-place">
            <span class="place-number">1</span>
            <div class="time-container">
                <div class="time">
                    <span>8</span><span class="second">00</span>
                </div>
                <div class="podzielnik"></div>
                <div class="time">
                    <span>9</span><span class="second">00</span>
                </div>
            </div>
            <i>Zamek Ksiaz</i>
        </div>
        <div class="trip-info">
            <textarea rows="41" cols="30">
                Pierwsza pisemna wzmianka o dzisiejszym Zamku Książ (po niem. Fürstenstein). W tych latach trwa budowa jednego z wielu zamków obronnych księcia świdnicko - jaworskiego Bolka I Surowego o ważnym znaczeniu strategicznym, który to obiekt wówczas uważano także za „klucz do Śląska”. Nowo wybudowana warownia, zwana na początku „Książęcą Górą”, wyróżniała się spośród innych tego rodzaju budowli nie tylko dogodnym położeniem pod względem wojennym, ale i malowniczą lokalizacją w sercu lasów. Bolko I nadał też sobie tytuł „pana na Książu”, który zachowali jego następcy.
            </textarea>

        </div>
        <div>
            <button class="ticket-button">
                <a href="#">Ticket</a>
            </button>
        </div>
    </nav>
    <main>
        <div class="buttons">
            <button class="listing"><i class="fas fa-list-ul"></i></button>
            <button class="add-trip"><i class="fas fa-plus"></i></button>
            <button class="add-pin"><i class="fas fa-crosshairs"></i></button>
            <button class="log-off"><i class="far fa-times-circle"></i></button>
        </div>
        <section class="map">
            <img src="public/image/map.svg">
        </section>
    </main>
</div>
</body>
