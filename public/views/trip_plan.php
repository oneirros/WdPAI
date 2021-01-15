<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <title> TRIP PLAN PAGE</title>
</head>

<body>
<div class="base-container">
    <nav>
        <div class="small-logo">
            <img src="public/image/logo.svg">
        </div>
        <header>
            <i class="fas fa-map-marked-alt"></i>
            <i><?= $trip->getTitle()?></i>
        </header>
        <ul class="places">
            <li>
                <span class="place-number">1</span>
                <div class="time-container">
                    <div class="time">
                        <span><?= $pin->getHourArrival()?></span><span class="second"><?= $pin->getMinuteArrival()?></span>
                    </div>
                    <div class="podzielnik"></div>
                    <div class="time">
                        <span><?= $pin->getHourDeparture()?></span><span class="second"><?= $pin->getMinuteDeparture()?></span>
                    </div>
                </div>
                <a href="/trip_info" class="button"><?= $trip->getDestination()?></a>
            </li>
<!--            <li>-->
<!--                <span class="place-number">2</span>-->
<!--                <div class="time-container">-->
<!--                    <div class="time">-->
<!--                        <span>9</span><span class="second">45</span>-->
<!--                    </div>-->
<!--                    <div class="podzielnik"></div>-->
<!--                    <div class="time">-->
<!--                        <span>10</span><span class="second">30</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#" class="button">Zamek w Mosznej</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <span class="place-number">3</span>-->
<!--                <div class="time-container">-->
<!--                    <div class="time">-->
<!--                        <span>11</span><span class="second">15</span>-->
<!--                    </div>-->
<!--                    <div class="podzielnik"></div>-->
<!--                    <div class="time">-->
<!--                        <span>12</span><span class="second">00</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#" class="button">Zamek Lancut</a>-->
<!--            </li>-->
        </ul>
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
