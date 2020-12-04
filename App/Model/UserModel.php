<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{
    /**
     * Method to get a user's data from their email
     *
     * @param string $email
     * @return bool
     */
    public function SelectUserFromEmail(string $email) {
        return $this->query("SELECT * FROM user WHERE email='$email'", true);
    }

    /**
     * Method to get a user's data from their username
     *
     * @param string $pseudo
     * @return bool
     */
    public function SelectUserFromUsername(string $pseudo) {
        return $this->query("SELECT * FROM user WHERE username='$pseudo'", true);
    }

    /**
     * Method to add a new user to the database
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     * @return void
     */
    public function AddUser(string $username, string $email, string $password, string $firstName = null, string $lastName = null) {
        $this->prepare("INSERT INTO user(username, email, password) VALUES(:username, :email, :password);", array(":username" => $username, ":email" => $email, ":password" => $password));

        $lastId = $this->getLastInsertId();

        //If the optional parameters are given, they will be added to the database
        if (!is_null($firstName)) {
            $this->prepare("UPDATE user SET first_name = '$firstName' WHERE user_id = $lastId");
        }
        if (!is_null($lastName)) {
            $this->prepare("UPDATE user SET last_name = '$lastName' WHERE user_id = $lastId");
        }
    }
}