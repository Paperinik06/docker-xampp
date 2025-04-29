<?php

session_start();
$_SESSION['id_stanza'] = 2;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Room Gaming</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <aside class="sidebar">
    <a href="generale.php">Generale</a>
    <a href="gaming.php" class="active">Gaming</a>
    <a href="studio.php">Studio</a>
  </aside>
  <main class="content">
    <header>
      <h1>Chat Room Gaming</h1>
    </header>
    <section id="message-area">
      
        <div class="message">
          <div class="username">SudatoSupremo</div>
            <div class="message-text">qualcuno su fort?</div>
        </div>
        <div class="message">
          <div class="username">zzCane96</div>
          <div class="message-text">5 min e rankiamo</div>
        </div>
    </section>
    <form id="message-form" action="gestisci_messaggi.php" method="post">
      <textarea id="message" name="message" rows="4" cols="50" placeholder="Scrivi il tuo messaggio..."></textarea>
      <button type="submit">Invia</button>
    </form>
  </main>
</body>
</html>