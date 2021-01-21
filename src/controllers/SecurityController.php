<?php

require_once 'AppController.php';
require_once __DIR__."/../models/User.php";
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TripRepository.php';

session_start();

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render("login");
        }

        $email = $_POST["email"];
        $password = md5(md5($_POST["password"]));

        $email = htmlentities($email, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render("login", ['messages' => ["User not exist!"]]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render("login", ['messages' => ["Incorrect password or email!"]]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render("login", ['messages' => ["Incorrect password or email!"]]);
        }

        $_SESSION["login"] = true;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/trips");

    }

    public function logout()
    {
        session_unset();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }

    public function register(){

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render("registration");
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5(md5($_POST["password"]));

        $userRepository->addUser($name, $email, $password);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");

    }

}