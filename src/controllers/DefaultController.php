<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {

        $this->render("login");
    }

    public function registration() {

        $this->render("registration");
    }

    public function trip_plan() {

        $this->render("trip_plan");
    }

    public function trip_info() {
        $this->render("trip_info");
    }

}