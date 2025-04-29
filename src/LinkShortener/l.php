<?php

if (isset($_GET['link']))
{
    // Create database connection
    require_once('db.php');

    $short = $_GET['link'];
    $res = $conn->query("SELECT * FROM link WHERE link_short = '$short'");
    if($res->num_rows === 1)
    {
        $row = $res->fetch_assoc();
        $long = $row['link_orig'];
        header("Location: $long");
    }
    else
        echo "Ndo vai!!! Se nsai fa cu l'informadiga... lassa gi!!!!!!!";
}