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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function addPin(Pin $pin)
    {
        $pins[] = $pin;
    }

    public function getPin(int $key): Pin
    {
        return pins[$key];
    }

}