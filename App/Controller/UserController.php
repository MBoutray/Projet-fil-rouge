<?php
namespace App\Controller;
use App\Model\UserModel;

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function Connect()
    {
        
    }

    /**
     * Method used to disconnect a user from their session
     *
     * @return void
     */
    public static function Disconnect()
    {
        session_unset();
        $_SESSION["loggedin"] = false;
    }

    public function Register()
    {
        
    }

    /**
     * Method used to redirect the user off of pages and towards the home page
     * 
     * @param boolean $mustBeLoggedIn
     * @return void
     */
    public static function Redirect(bool $mustBeLoggedInToAccess)
    {
        if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['loggedin'] != $mustBeLoggedInToAccess) {
            header("Location: index.php?page=accueil");
            exit;
        }
    }
}
