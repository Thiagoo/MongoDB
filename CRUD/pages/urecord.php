<?php
    include_once('../functions/functions.php');
    $dbConnect = dbLink();
   
    if ($dbConnect) 
        echo '<br>Connection Established<br>';
        echo '<br><a href="../index.php">Return</a>';

$id = $_POST['id'];
$field = $_POST['field'];
$data = $_POST['data'];
$name = $_POST['name'];
$databaseCollection = 'content.names';
updateContent($dbConnect, $id, $field, $data, $name, $databaseCollection);
?>
