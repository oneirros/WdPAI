<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <title> TRIPS PAGE</title>
</head>

<body>
<div class="base-container">
    <nav>
        <div class="small-logo">
            <img src="/public/image/logo.svg">
        </div>
        <div class="trip-place">
            <span class="place-number"></span>
            <div class="time-container">
                <div class="time">
                    <span><?=$pin->getHourArrival()?></span><span class="second"><?=$pin->getMinuteArrival()?></span>
                </div>
                <div class="podzielnik"></div>
                <div class="time">
                    <span><?=$pin->getHourDeparture()?></span><span class="second"><?=$pin->getMinuteDeparture()?></span>
                </div>
            </div>
            <i><?=$pin->getDestination()?></i>
        </div>
        <div class="trip-info">
            <textarea rows="41" cols="30">
                <?=$pin->getDescription()?>
            </textarea>

        </div>
        <div>
            <button class="ticket-button">
                <a href="/ticket">Ticket</a>
            </button>
        </div>
    </nav>
    <main>
        <div class="buttons">
            <a href="/trip_plan/<?=$_SESSION["id_trip"]?>">
                <button class="listing">
                    <i class="far fa-arrow-alt-circle-left"></i>
                </button>
            </a>
            <a>
                <button class="">
                    <i class="fas fa-plus"></i>
                </button>
            </a>
            <a>
                <button class="add-pin">
                    <i class="fas fa-crosshairs"></i>
                </button>
            </a>
            <a href="/logout">
                <button class="log-off">
                    <i class="far fa-times-circle"></i>
                </button>
            </a>
        </div>
        <section class="map">
            <img src="/public/image/map.svg">
        </section>
    </main>
</div>
</body>
