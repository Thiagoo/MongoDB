<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';
        echo '<br><a href="../index.php">Return</a><br>';

$name = $_POST['name'];

//Read from mongo one record
$filter = ['name' => $name];
$options = ['limit' => 100];
displayAllData($dbconnect, 'content','names', $filter, $options, 'name');
?>

