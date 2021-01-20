<!DOCTYPE html>
<?php session_start() ?>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <title> TRIP PLAN PAGE</title>
</head>

<body>
<div class="base-container">
    <nav>
        <div class="small-logo">
            <img src="/public/image/logo.svg">
        </div>
        <header>
            <i class="fas fa-map-marked-alt"></i>
            <i><?=$_SESSION["title"]?></i>
        </header>
        <ul class="places">
            <?php $it = 1?>
            <?php foreach ($pins as $pin): ?>
            <li>
                <span class="place-number"><?=$it++?></span>
                <div class="time-container">
                    <div class="time">
                        <span><?= $pin->getHourArrival()?></span><span class="second"><?= $pin->getMinuteArrival()?></span>
                    </div>
                    <div class="podzielnik"></div>
                    <div class="time">
                        <span><?= $pin->getHourDeparture()?></span><span class="second"><?= $pin->getMinuteDeparture()?></span>
                    </div>
                </div>
                <a href="/trip_info/<?=$pin->getIdPin()?>" class="button"><?= $pin->getDestination()?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <main>
        <div class="buttons">
            <a href="/trips">
                <button class="listing">
                    <i class="far fa-arrow-alt-circle-left"></i>
                </button>
            </a>
            <a href="">
                <button class="add-trip">
                    <i class="fas fa-plus"></i>
                </button>
            </a>
            <a href="/add_pin/<?=$_SESSION["id_trip"]?>">
                <button class="add-pin">
                    <i class="fas fa-crosshairs"></i>
                </button>
            </a>
            <button class="log-off"><i class="far fa-times-circle"></i></button>
        </div>
        <section class="map">
            <img src="/public/image/map.svg">
        </section>
    </main>
</div>
</body>
