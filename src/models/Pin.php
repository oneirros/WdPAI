<?php


class Pin
{
    private $title;
    private $destination;
    private $hour_arrival;
    private $minute_arrival;
    private $hour_departure;
    private $minute_departure;
    private $description;
    private $ticket;
    private $id_pin;


    public function __construct(?string $destination, ?string $arrival_time,
                                ?string $departure_time, ?string $description, ?string $ticket)
    {
        $this->destination = $destination;
        $this->description = $description;
        $this->ticket = $ticket;

        $time = explode(":", $arrival_time);
        $this->hour_arrival = $time[0];
        $this->minute_arrival = $time[1];

        unset($time);

        $time = explode(":", $departure_time);
        $this->hour_departure = $time[0];
        $this->minute_departure = $time[1];
    }



    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination)
    {
        $this->destination = $destination;
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

    public function getHourArrival(): string
    {
        return $this->hour_arrival;
    }

    public function setHourArrival(string $hour_arrival)
    {
        $this->hour_arrival = $hour_arrival;
    }

    public function getMinuteArrival(): string
    {
        return $this->minute_arrival;
    }

    public function setMinuteArrival(string $minute_arrival)
    {
        $this->minute_arrival = $minute_arrival;
    }

    public function getHourDeparture(): string
    {
        return $this->hour_departure;
    }

    public function setHourDeparture(string $hour_departure)
    {
        $this->hour_departure = $hour_departure;
    }

    public function getMinuteDeparture(): string
    {
        return $this->minute_departure;
    }

    public function setMinuteDeparture(string $minute_departure)
    {
        $this->minute_departure = $minute_departure;
    }

    public function getIdPin(): ?int
    {
        return $this->id_pin;
    }

    public function setIdPin(?int $id_pin): void
    {
        $this->id_pin = $id_pin;
    }


}