<?php

session_start();
$_SESSION['id_stanza'] = 3;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Room Studio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <aside class="sidebar">
    <a href="generale.php">Generale</a>
    <a href="gaming.php">Gaming</a>
    <a href="studio.php" class="active">Studio</a>
  </aside>
  <main class="content">
    <header>
      <h1>Chat Room Studio</h1>
    </header>
    <section id="message-area">
      <!-- Messages will be displayed here -->
        <div class="message">
          <div class="username">adem7</div>
            <div class="message-text">oh @GiorgettiCyborg manda informatica</div>
        </div>
        <div class="message">
          <div class="username">GiorgettiCyborg</div>
          <div class="message-text">basta se non mi paghi non ti mando più nulla</div>
        </div>
    </section>
    <form id="message-form" action="gestisci_messaggi.php" method="post">
      <textarea id="message" name="message" rows="4" cols="50" placeholder="Scrivi il tuo messaggio..."></textarea>
      <button type="submit">Send</button>
    </form>
  </main>
</body>
</html>