<?php
session_start();
    require_once('db.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST["username"]) && isset($_POST["password"]))
        {
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
             

            $result = $conn->query("SELECT * FROM utenti WHERE username = '$username'");
            
            
            if ($result->num_rows === 1)
            {
                $result = $conn->query("SELECT * FROM utenti WHERE username ='$username' AND password='$password'");
                
                if($result->num_rows === 1)
                {
                    $user = $result->fetch_assoc();
                    
                    
                    $_SESSION["username"] = $user;
                    $_SESSION["id_user"] = $user["id_utente"];
                    
                    header("Location: accorcialink.php");
                }
                else
                    echo "password sbagliata";
            }
            else
                echo "username inesistente";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>
                <button type="submit" class="form-button">Login</button>
            </form>
            <p>Non possiedi un account? <a href="registrazione.php">Registrati qui!</a></p>
        </div>
    </div>
</body>
</html>