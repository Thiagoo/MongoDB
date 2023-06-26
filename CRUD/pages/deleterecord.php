<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';

echo '<hr> Link to delte record';
$filter = [];
$options = ['sort' => array('_id'=>-1), 'limit'=>20];
displayAllDataForDelete($dbconnect, 'content','names', $filter, $options);
?>