<?php

session_start();

require_once 'AppController.php';
require_once __DIR__."/../models/Trip.php";
require_once __DIR__."/../models/Pin.php";
require_once __DIR__."/../repository/TripRepository.php";


class TripController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "application/pdf"];
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

        if($_SESSION["login"] == true)
        {
            $this->render("trips", ["trips" => $this->tripRepository->getTrips()]);
        }
        else $this->render("login");


    }

    public function trip_plan($trip_ID) {

        if($_SESSION["login"] == true)
        {
            $this->render("trip_plan", ["pins" => $this->tripRepository->getPins($trip_ID)]);
        }
        else $this->render("login");

    }

    public function trip_info(int $id_pin) {

        if($_SESSION["login"] == true)
        {
            $this->render("trip_info", ["pin" => $this->tripRepository->getPin($id_pin)]);
        }
        else $this->render("login");


    }


    public function add_trip() {

        if($this->isPost()) {

            $this->trip = new Trip(null, $_POST["title"]);
            $this->tripRepository->addTrip($this->trip);

            return $this->render("trips", ["trips" => $this->tripRepository->getTrips()]);
        }


        $this->render("add_trip");
    }

    public function search_trip()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->tripRepository->getTripByTitle($decoded['search']));
        }
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

    public function search_pin()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->tripRepository->getTripByTitle($decoded['search_pin']));
        }
    }

    public function ticket()
    {
        $this->render("ticket");
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