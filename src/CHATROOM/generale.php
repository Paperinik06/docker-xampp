<?php

session_start();
$_SESSION['id_stanza'] = 1;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Room Generale</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <aside class="sidebar">
    <a href="generale.php" class="active">Generale</a>
    <a href="gaming.php">Gaming</a>
    <a href="studio.php">Studio</a>
  </aside>
  <main class="content">
    <header>
      <h1>Chat Room Generale</h1>
    </header>
    <section id="message-area">
    </section>
      <script>
        function aggiornaChat() 
        {
            console.log('esisto');
            fetch("get_messaggi.php")
            .then(response => 
            {
              return response.json();
            })
            .then(data => 
            {
                //console.log(data);
                const chat = document.getElementById("message-area");
                chat.innerHTML = ""; // Svuota la chat

                // Aggiungi ogni messaggio
                data.forEach(msg => 
                {
                    let email = msg.email;
                    let messaggio = msg.contenuto_messaggio;
                    const msgDiv = document.createElement("div");
                    msgDiv.innerHTML = email + ":" + messaggio;
                    chat.appendChild(msgDiv);
                });
            })
            .catch(err => console.error("Errore:", err));
        }

        setInterval(aggiornaChat, 1000);
        aggiornaChat();
      </script>
    
    <form id="message-form" action="gestisci_messaggi.php" method="post">
      <textarea id="message" name="message" rows="4" cols="50" placeholder="Scrivi il tuo messaggio..."></textarea>
      <button type="submit">Send</button>
    </form>
  </main>
</body>
</html>