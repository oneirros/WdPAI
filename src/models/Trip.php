<?php

require_once "Pin.php";


class Trip
{
    private $id_trip;
    private $title;
    private $pins = [];


    public function __construct(?int $id_trip, string $title)
    {
        $this->id_trip = $id_trip;
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

    public function getPins(): array
    {
        return $this->pins;
    }

    public function getID(): int
    {
        return $this->id_trip;
    }

}