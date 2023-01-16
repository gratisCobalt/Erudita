<?php

require_once('credentials.php');

// Database Credentials
//! please check if your credentials are the same
define('DB_HOST', 'manny.db.elephantsql.com'); // localhost
define('DB_PORT', 5432); // 5432
define('DB_NAME', 'xdncrrtq'); // Erudita
define('DB_USER', 'xdncrrtq'); // postgres
define('DB_PASS', $DB_PASS); // add your database password here

try {
  $pdo = new PDO("pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
  die('Konnte keine Verbindung zur Datenbank aufbauen: ' . $e->getMessage());
}

// Google reCAPTCHA
$site_key = '';

?>
