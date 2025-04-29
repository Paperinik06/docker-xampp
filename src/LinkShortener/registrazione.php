<?php

// Include the database connection file
include 'db.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the username and password from the POST request
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Hash the password for security

    // Check if the username already exists in the database
    $result = $conn->query("SELECT * FROM utenti WHERE username = '$username'");
    /* 
    $check_query = "SELECT * FROM utenti WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result(); */

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Errore: username già esistente.";
    }
    else
    {
        // Check if the passwords match
        if ($_POST["password"] != $_POST["confirm-password"])
            echo "Errore: le password non corrispondono.";
        else
        {
            // Username does not exist, proceed with user creation
            $conn->query("INSERT INTO utenti (username, password) VALUES ('$username', '$password')");
            header("Location: login.php");

            /* $insert_query = "INSERT INTO utenti (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ss", $username, $password);
            echo($insert_query);
            if ($stmt->execute()) {
                // User creation successful, redirect to login.php
                header("Location: login.php");
                exit(); 
            } else {
                // Error during user creation
                echo "Errore durante la registrazione dell'utente.";
            } */
        }
    }
    //$stmt->close();
}

// Close the database connection
//$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="form" action="registrazione.php" method="post">
            <h2>Register</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="input-field" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="input-field" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" class="input-field" required>
            </div>
            <button type="submit" class="submit-button">Register</button>
        </form>
    </div>
</body>
</html>