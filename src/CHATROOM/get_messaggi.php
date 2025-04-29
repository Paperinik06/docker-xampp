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
$query = "SELECT email, contenuto_messaggio FROM messaggi WHERE id_stanza = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_stanza);
$stmt->execute();
$result = $stmt->get_result();

$messaggi = [];
while ($row = $result->fetch_assoc()) {
    $messaggi[] = $row;
}
echo json_encode($messaggi);