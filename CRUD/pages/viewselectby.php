<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';
        echo '<br><a href="../index.php">Return</a><br>';

$field = $_POST['field'];
$filter = [];
$options = ['sort'=>array('_id'=>1),'name'=>1];
displayAllFields($dbconnect, 'content','names', $filter, $options, $field);
?>

