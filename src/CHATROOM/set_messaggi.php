<?php
session_start();
header('Content-Type: application/json');

$host = 'db';
$dbname = 'chatroom';
$user = 'user';
$password = 'user';
$port = 3306;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connessione fallita: " . $conn->connect_error]));
}

$id_stanza = $_SESSION['id_stanza'];
