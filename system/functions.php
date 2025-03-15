<?php
/**
 * Register a new user.
 *
 * @param string $username The username provided by the user.
 * @param string $password The raw password provided by the user.
 * @return string "success" if registration is successful, error message otherwise.
 */
function registerUser($username, $password) {
    global $pdo;

    /**
     * Hash the password using bcrypt.
     */
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    /**
     * Insert user into the database.
     */
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashedPassword])) {
        return "success";
    }
    return "Registration failed.";
}

/**
 * Authenticate a user.
 *
 * @param string $username The username provided by the user.
 * @param string $password The raw password provided by the user.
 * @return string "success" if login is successful, error message otherwise.
 */
function loginUser($username, $password) {
    global $pdo;

    /**
     * Fetch user details from the database.
     */
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    /**
     * Verify password and log in the user.
     */
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        return "success";
    }
    return "Invalid credentials.";
}
?>
