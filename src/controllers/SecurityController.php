<?php

require_once 'AppController.php';
require_once __DIR__."/../models/User.php";

class SecurityController extends AppController
{
    public function login() {

        $user = new User("jacek@jacek.com", "jacek5", "jacek");

//        if ($this->isPost()) {
//            return $this->login("login");
//        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            return $this->render("login", ['messages' => ["Incorrect password or email!"]]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render("login", ['messages' => ["Incorrect password or email!"]]);
        }

        return $this->render("trips");

    }

}