<?php
session_start();
require_once('db.php');


if (!isset($_SESSION['email'])) {
    
    header("Location: login.php"); 
    exit();
}


$current_room = isset($_GET['room']) ? $_GET['room'] : 'generale';


if (isset($_POST['message'])) {
    $message = $_POST['message']; 
    $email = $_SESSION['email'];
    $stanza = $_GET['room'];
    $stmt = "INSERT INTO messaggi (contenuto_messaggio, email, id_stanza) VALUES (?, ?, ?)"; 
    $result = $conn->query($stmt);
    if ($result)
    {
        $room = $result->fetch_assoc();
        
        
        if (!$room) {
            
            var_dump($current_room);
            
            exit();
        }
        $id_stanza = $room['id_stanza'];
    
        $result = $conn->query($query);
        if (!$result)
        {
            echo "Sei un cojone!";
        }
    
        header("Location: " . $current_room . ".php");
        exit();
    }
    
    
}
?>