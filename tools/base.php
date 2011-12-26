<?php
require ("settings.php");
$CONNECTED = false;
$com = mysql_connect(SERVER, USER, PASSWORD);
    if (!$com)
    {
    die (header('Location: errordb.php'));
    $CONNECTED = false;
    }

    else {
    mysql_select_db(DB, $com);
    $CONNECTED = true;
    }
?>
