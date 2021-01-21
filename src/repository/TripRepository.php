<?php

require_once "Repository.php";
require_once __DIR__."/../models/Trip.php";
require_once __DIR__."/../models/Pin.php";

session_start();

class TripRepository extends Repository
{
    private $result = [];

    public function getTrip(int $id_trip): ?Trip
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM trips WHERE id_trip = :id_trip
        ');
        $stmt->bindParam(':id_trip', $id_trip, PDO::PARAM_INT);
        $stmt->execute();

        $trip = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($trip == false) {
            return null;
        }

        return new Trip(
            $trip['title']
        );
    }

    public function getTrips(): ?array
    {
        $result = [];
        $id_users = $_SESSION["id_users"];
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM trips WHERE id_assigned_by = $id_users;
        ");

        $stmt->execute();
        $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($trips == false) {
            $result[] = new Trip(
                0,
                "Add the first trip"
            );

            return $result;
        }

        foreach ($trips as $trip) {


            $this->result[] = new Trip(
                $trip['id_trip'],
                $trip['title']
            );
        }

        return $this->result;
    }

    public function addTrip(Trip $trip): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare("
            INSERT INTO trips (id_assigned_by, title, created_tm)
            VALUES (?, ?, ?)
        ");

        $assignedByID = $_SESSION["id_users"];

        $stmt->execute([
            $assignedByID,
            $trip->getTitle(),
            $date->format("Y-m-d")
        ]);

    }

    public function getPins(int $id_trip): ?array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM pins WHERE id_trip = $id_trip
        ");

        $stmt->execute();
        $pins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $this->database->connect()->prepare("
            SELECT t.title FROM trips t WHERE id_trip = $id_trip
        ");

        $stmt2->execute();
        $trip = $stmt2->fetch(PDO::FETCH_ASSOC);

        $_SESSION["id_trip"] = $id_trip;
        $_SESSION["title"] = $trip["title"];

        if ($pins == false) {
            $result[] = new Pin(
                "Add the first pin",
                ":",
                ":",
                "",
            ""
            );

            return $result;
        }

        foreach ($pins as $pin)
            {
                $result[] = new Pin(
                  $pin["destination"],
                  $pin["hour_arrival"].":".$pin["minute_arrival"],
                  $pin["hour_departure"].":".$pin["minute_departure"],
                  $pin["description"],
                  $pin["ticket"]
                );
                end($result)->setIdPin($pin["id_pin"]);
            }


        return $result;
    }

    public function getPin(int $id_pin): ?Pin
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM pins WHERE id_pin = :id_pin
        ');
        $stmt->bindParam(':id_pin', $id_pin, PDO::PARAM_INT);
        $stmt->execute();

        $pin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pin == false) {
            return null;
        }

        $new_pin =  new Pin(
            $pin["destination"],
            $pin["hour_arrival"].":".$pin["minute_arrival"],
            $pin["hour_departure"].":".$pin["minute_departure"],
            $pin["description"],
            $pin["ticket"]
        );

       $new_pin->setIdPin($id_pin);

        return $new_pin;

    }

    public function addPin(Pin $pin){
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare("
            INSERT INTO pins (destination, hour_arrival, minute_arrival, hour_departure,
                               minute_departure, description, ticket, created_tm, id_trip)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $pin->getDestination(),
            $pin->getHourArrival(),
            $pin->getMinuteArrival(),
            $pin->getHourDeparture(),
            $pin->getMinuteDeparture(),
            $pin->getDescription(),
            $pin->getTicket(),
            $date->format("Y-m-d"),
            $_SESSION["id_trip"]
        ]);

    }

    public function getTripByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $assignedByID = $_SESSION["id_users"];

        $stmt = $this->database->connect()->prepare("
            SELECT * FROM trips WHERE LOWER(title) LIKE :search AND id_assigned_by = $assignedByID
        ");
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPinByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $assignedByID = $_SESSION["id_users"];

        $stmt = $this->database->connect()->prepare("
            SELECT * FROM pins WHERE LOWER(destination) LIKE :search AND id_assigned_by = $assignedByID
        ");
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTicket(int $id_pin)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM pins WHERE id_pin = :id_pin
        ');
        $stmt->bindParam(':id_pin', $id_pin, PDO::PARAM_INT);
        $stmt->execute();

        $pin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pin == false) {
            return null;
        }

        return $pin["ticket"];
    }
}

