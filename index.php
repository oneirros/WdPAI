<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', "DefaultController");
Routing::get("registration", "DefaultController");
Routing::get('projects', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::get("trip_plan", 'DefaultController');
Routing::get("trip_info", 'DefaultController');
Routing::post("add_trip", 'TripController');
Routing::post("add_pin", 'TripController');

Routing::run($path);