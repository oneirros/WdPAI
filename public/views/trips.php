<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/e812991b72.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title> TRIPS PAGE</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <div class="small-logo">
                <img src="public/image/logo.svg">
            </div>
            <ul class="trips">
                <?php foreach ($trips as $trip): ?>
                <li>
                    <i class="fas fa-map-marked-alt"></i>
                    <a href="/trip_plan/<?=$trip->getID()?>" class="button"> <?= $trip->getTitle()?> </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <main>
            <div class="buttons">
                <div class="search-bar">
                    <input placeholder="search trip">
                </div>
                <a href="/trips">
                    <button class="listing">
                        <i class="far fa-arrow-alt-circle-left"></i>
                    </button>
                </a>
                <a href="/add_trip">
                    <button class="add-trip">
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
                <img src="public/image/map.svg">
            </section>
        </main>
    </div>
</body>

<template id="trip-template">
    <li>
        <i class="fas fa-map-marked-alt"></i>
        <a href="" class="button"> title </a>
    </li>
</template>