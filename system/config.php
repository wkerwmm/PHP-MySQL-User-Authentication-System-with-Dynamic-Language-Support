<?php
/**
 * Start a PHP session.
 */
session_start();

/**
 * Default language setting.
 */
$language = 'tr';

if (isset($_SESSION['language'])) {
    $language = $_SESSION['language'];
}

/**
 * Database connection details.
 */
$host = 'localhost';
$db = 'php_auth';
$user = 'root';
$pass = '';
$charset = 'utf8';

/**
 * DSN (Data Source Name) for PDO connection.
 */
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    /**
     * Establish a PDO database connection.
     */
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

?>
