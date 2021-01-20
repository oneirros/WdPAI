<?php

session_start();

require_once 'AppController.php';
require_once __DIR__."/../models/Trip.php";
require_once __DIR__."/../models/Pin.php";
require_once __DIR__."/../repository/TripRepository.php";


class TripController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpeg"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";

    private $messages = [];
    private $trip;
    private $tripRepository;


    public function __construct()
    {
        parent::__construct();
        $this->tripRepository = new TripRepository();
    }

    public function trips() {

        $this->render("trips", ["trips" => $this->tripRepository->getTrips()]);
    }

    public function trip_plan(int $trip_ID) {

        $this->render("trip_plan", ["pins" => $this->tripRepository->getPins($trip_ID)]);
    }

    public function trip_info(int $id_pin) {
        $this->render("trip_info", ["pin" => $this->tripRepository->getPin($id_pin)]);
    }


    public function add_trip() {

        if($this->isPost()) {

            $this->trip = new Trip(null, $_POST["title"]);
            $this->tripRepository->addTrip($this->trip);

            return $this->render("trips", ["trips" => $this->tripRepository->getTrips()]);
        }


        $this->render("add_trip");
    }

    public function add_pin($trip_ID) {

        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])) {

            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["name"]
            );

            $pin = new Pin($_POST["destination"], $_POST["arrival-time"], $_POST["departure-time"],
                $_POST["description"], $_FILES["file"]["name"]);

            $this->tripRepository->addPin($pin);

            return $this->render("trip_plan", ["pins" => $this->tripRepository->getPins($_SESSION["id_trip"])]);
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