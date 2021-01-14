<?php

require_once "Pin.php";
class Trip
{
    private $title;
    private $pins = [];


    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function add_pin($pin) {
        $pins[] = $pin;
    }


}