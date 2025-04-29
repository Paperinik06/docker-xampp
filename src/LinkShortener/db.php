<?php



$host = 'db';
$dbname = 'linkshortener';
$user = 'user';
$password = 'user';
$port = 3306;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Errore di connessione " . $conn->connect_error);
}