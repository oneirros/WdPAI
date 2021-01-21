<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

session_start();

class UserRepository extends Repository
{
    public function getUser(string $user_email): ?User
    {

        $stmt = $this->database->connect()->prepare('
            SELECT u.id_users, u.email, u.password, d.name  FROM users u JOIN users_details d
    on u.id_user_details = d.id_users_details WHERE email = :user_email

        ');
        $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $_SESSION["id_users"] = $user['id_users'];

        return new User(
            $user['email'],
            $user['password'],
            $user['name']
        );
    }

    public function addUser(string $name, string $email, string $password)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare("
            INSERT INTO users_details (name, phone)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $name,
            null
        ]);

        $stmt = null;

        $stmt = $this->database->connect()->prepare("
            SELECT * FROM users_details ORDER BY id_users_details DESC LIMIT 1
        ");

        $stmt->execute();

        $users_details = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = null;

        $stmt = $this->database->connect()->prepare("
            INSERT INTO users (email, password, enabled, created_tm, id_user_details)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $email,
            $password,
            true,
            $date->format("Y-m-d"),
            $users_details["id_users_details"]
        ]);


    }

}