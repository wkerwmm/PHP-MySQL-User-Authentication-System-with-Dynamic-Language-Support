<?php
require __DIR__ . '/../../system/functions.php';

/**
 * Class AuthController
 * Handles user authentication requests (login & registration).
 */
class AuthController {

    /**
     * Register a new user.
     *
     * @return void
     */
    public static function register() {
        /**
         * @var string $username User's input username.
         * @var string $password User's input password.
         */
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Please fill in all fields!";
            return;
        }

        echo registerUser($username, $password);
    }

    /**
     * Log in a user.
     *
     * @return void
     */
    public static function login() {
        /**
         * @var string $username User's input username.
         * @var string $password User's input password.
         */
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Please fill in all fields!";
            return;
        }

        echo loginUser($username, $password);
    }
}
?>
