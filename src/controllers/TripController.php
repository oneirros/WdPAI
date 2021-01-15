<?php

require_once 'AppController.php';
require_once __DIR__."/../models/Trip.php";
require_once __DIR__."/../models/Pin.php";

class TripController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpeg"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";

    private $messages = [];
    private $trip;


    public function add_trip() {

        if($this->isPost()) {

            $this->trip = new Trip($_POST["title"]);

            return $this->render("trips", ["trip" => $this->trip]);
        }


        $this->render("add_trip");
    }

    public function add_pin() {

        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])) {

            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["name"]
            );

            $pin = new Pin($_POST["destination"], $_POST["arrival-time"], $_POST["departure-time"],
                $_POST["description"], $_FILES["file"]["name"]);

            $this->trip->addPin($pin);

            return $this->render("trip_plan", ["pin" => $this->trip->getPin(0)]); //czy ty powinno być wyświetlanie całej listy pinów
        }

        $this->render("add_pin", ["messages" => $this->messages]);
    }

    private function validate(array $file): bool {

        if (!$file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File is too large for destination file system";
            return false;
        }

        if (isset($file["type"]) && !in_array($file["type"], self::SUPPORTED_TYPES)) {
            $this->messages[] = "File type is not supported";
            return false;
        }

        return true;
    }

}