<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #36393f;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #2f3136;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
        }

        .login-container h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            color: #b9bbbe;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #202225;
            background-color: #202225;
            border-radius: 3px;
            color: #fff;
            box-sizing: border-box;
        }

        .login-button {
            background-color: #5865f2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .login-button:hover {
            background-color: #4752c4;
        }
        .register-link {
          text-align: center;
          margin-top: 15px;
        }

        .register-link a {
          color: #00aff4;
          text-decoration: none;
        }

        .register-link a:hover {
          text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Indirizzo Email o Nome utente</label>
                <input type="text" id="username" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
            <div class="register-link">
              <a href="registrazione.php">Non hai un account? Registrati!</a>
            </div>
        </form>
    </div>
</body>
</html>


<?php

    

    require_once('db.php');

    


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST["email"]) && isset($_POST["password"]))
        {
            $email = $_POST["email"];
            $pw = $_POST["password"];

            // interrogzione db per vedere se le credenziali sono corrette
            $query = "SELECT * FROM utenti WHERE email ='$email' AND password='$pw'";

            $result = $conn->query($query);
            if ($result->num_rows >= 1)
            {
                

                echo '<meta http-equiv="refresh" content="0;url=stanze.html">';


                
            
            $_SESSION["email"] = $user;
            // quindi faccio la redirect alla pagina successiva (scelta stanza)            
            header(...);
            }
            else
            {
                echo "credenziali errate";
            }

        }
    }









