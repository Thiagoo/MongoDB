<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';

$databaseCollection = 'content.names';

echo '<br><a href="../index.php">Return</a>';
$id = $_GET['id'];
$name = $_GET['name'];
$id = 'ObjectId("'.$id.'")';

delete($dbconnect, $name, $id, $databaseCollection);

