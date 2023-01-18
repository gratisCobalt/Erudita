<?php

require_once('credentials.php');

// Database Credentials
//TODO: please create a 'credentials.php' file and add your credentials
define('DB_HOST', $DB_HOST);
define('DB_PORT', $DB_PORT);
define('DB_NAME', $DB_NAME);
define('DB_USER', $DB_USER);
define('DB_PASS', $DB_PASS);

try {
  $pdo = new PDO("pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
  die('Konnte keine Verbindung zur Datenbank aufbauen: ' . $e->getMessage());
}

// Google reCAPTCHA
//TODO: please create your site key here
$site_key = '6Lc_dwkkAAAAAF2kAxNHhhTU_quWVPM4C214vEiB';

?>
