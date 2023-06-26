<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';

$name = $_POST['name'];
$databaseCollection = 'content.names';
$result = insertName($dbconnect, $name, $databaseCollection);
if($result){
    echo '<br> Record Added';
}
echo '<br><a href="../index.php">Return</a>';
?>

