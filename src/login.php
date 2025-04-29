<?php

    if ($_GET != null)
        echo $_GET['username'];
        echo $_GET['pw'];
    else if ($_POST == null)
        echo "richiesta non tramite POST o parametri assenti";