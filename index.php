<?php

require 'Routing.php';

session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', "DefaultController");
Routing::get("trips", "TripController");
Routing::get("registration", "DefaultController");
Routing::post('login', 'SecurityController');
Routing::get("trip_plan", 'TripController');
Routing::get("trip_info", 'TripController');
Routing::post("add_trip", 'TripController');
Routing::post("add_pin", 'TripController');
Routing::post("search_trip", 'TripController');
Routing::post("search_pin", 'TripController');
Routing::get('logout', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::get('ticket', 'TripController');

Routing::run($path);