<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #36393f;
            color: #dcddde;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #2f3136;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .button-link {
            background-color: #5865f2;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 150px;
            text-align: center;
        }

        .button-link:hover {
            background-color: #4752c4;
        }

        @media (max-width: 600px) {
            .button-container {
                flex-direction: column;
                gap: 10px;
            }
             .button-link{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Benvenuto!</h1>
        <div class="button-container">
            <a href="login.php" class="button-link">Login</a>
            <a href="registrazione.php" class="button-link">Registrati</a>
        </div>
    </div>
</body>
</html>