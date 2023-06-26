<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';

$name = $_POST['name'];
$age = $_POST['age'];
$role = $_POST['role'];

$databaseCollection = 'content.names';
$result = insertComplexName($dbconnect, $name, $age, $role, $databaseCollection);
if($result){
    echo '<br> Record Added';
}
echo '<br><a href="../index.php">Return</a>';
?>
