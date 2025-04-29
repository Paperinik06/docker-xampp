<?php

session_start();

if (!isset($_SESSION["id_user"]))
{
    echo("ciao");
    die();
}
$id_utente = $_SESSION["id_user"];


/* class LinkShortener {
    private $db;
    private $baseUrl;

    public function __construct($db, $baseUrl) {
        $this->db = $db;
        $this->baseUrl = $baseUrl;
    }

    public function shortenLink($longUrl, $id_user) {
        $shortCode = $this->generateShortCode();
        $this->saveLink($longUrl, $shortCode, $id_user);
        $this->db->commit();
        return $this->baseUrl . '/' . $shortCode;
    }

    public function getLongUrl($shortCode) {
        $stmt = $this->db->prepare("SELECT link_orig FROM link WHERE link_short = ?");
        $stmt->bind_param("s", $shortCode);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['long_url'];
        }
        return null;
    }

    private function generateShortCode() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $shortCode = '';
        for ($i = 0; $i < 6; $i++) {
            $shortCode .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $shortCode;
    }

    private function saveLink($longUrl, $shortCode, $id_user) {
        $stmt = $this->db->prepare("INSERT INTO link (link_orig, link_short, id_utente) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $longUrl, $shortCode, $id_user);
        $stmt->execute();
    }
}
 */


// Create database connection
require_once('db.php');



 // Base URL of your service
$baseUrl = 'https://3000-idx-docker-xamppgit-1736234995175.cluster-rz2e7e5f5ff7owzufqhsecxujc.cloudworkstations.dev/LinkShortener/l.php?link='; // Replace with your actual base URL
/*
// Instantiate the LinkShortener class
$linkShortener = new LinkShortener($conn, $baseUrl);

// Handle shortening request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['long_url'])) {
    $longUrl = $_POST['long_url'];
    $shortenedUrl = $linkShortener->shortenLink($longUrl, $id_utente);
    echo "Shortened URL: <a href='" . $shortenedUrl . "'>" . $shortenedUrl . "</a><br>";
    echo "<a href='/'>go to home page</a>";

}

// Handle redirect request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])) {
    $shortCode = $_GET['code'];
    $longUrl = $linkShortener->getLongUrl($shortCode);
    if ($longUrl) {
        header("Location: " . $longUrl);
        exit;
    } else {
        echo "Link not found.";
    }
} */

if (isset($_POST['long_url']))
{
    $longUrl = $_POST['long_url'];
    $shortenedUrl = md5($id_utente . $longUrl);

    $res = $conn->query("SELECT * FROM link WHERE link_short = '$shortenedUrl'");
    if($res->num_rows === 0)
        $res = $conn->query("INSERT INTO link (link_orig, link_short, id_utente) VALUES ('$longUrl', '$shortenedUrl', '$id_utente')");
    else
        echo "Link già esistente";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Link Shortener</title>
</head>
<body>
    <h1>Link Shortener</h1>
    <form method="post" action="">
        <label for="long_url">Enter URL:</label>
        <input type="url" name="long_url" id="long_url" required>
        <button type="submit">Shorten</button>
    </form>
    <br><br>
    <?php
    $links = $conn->query("SELECT link_orig, link_short FROM link WHERE id_utente = '$id_utente'");
    if($links->num_rows > 0)
    {
        while($row = $links->fetch_assoc())
        {
            $long = $row['link_orig'];
            $short = $baseUrl . $row['link_short'];

            echo "<h2>Link originale: <a href=\"$long\">$long</a> </h2>";
            echo "<h2>Link corto: $short </h2>";
            echo "<br>";
        }
    }
    ?>
</body>
</html>
