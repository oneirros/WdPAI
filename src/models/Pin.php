<?php


class Pin
{
    private $destination;
    private $arrival_time;
    private $departure_time;
    private $description;
    private $ticket;


    public function __construct(string $destination, string $arrival_time,
                                string $departure_time, string $description, string $ticket)
    {
        $this->destination = $destination;
        $this->arrival_time = $arrival_time;
        $this->departure_time = $departure_time;
        $this->description = $description;
        $this->ticket = $ticket;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination)
    {
        $this->destination = $destination;
    }

    public function getArrivalTime(): string
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(string $arrival_time)
    {
        $this->arrival_time = $arrival_time;
    }

    public function getDepartureTime(): string
    {
        return $this->departure_time;
    }

    public function setDepartureTime(string $departure_time)
    {
        $this->departure_time = $departure_time;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getTicket(): string
    {
        return $this->ticket;
    }

    public function setTicket(string $ticket)
    {
        $this->ticket = $ticket;
    }

}