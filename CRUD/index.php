<?php
    session_start();
    include_once('functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="row">
        <ul>
            <li><a href="pages/singleaddrecord.php">Add a single record</a></li>
            <li><a href="pages/singlecomplexrecord.php">Add a single complex record</a></li>
            <li><a href="pages/searchonerecord.php">Search for one record by name</a></li>
            <li><a href="pages/sr_onerecord.php">Search by name - retrieve the document</a></li>
            <li><a href="pages/ran_record.php">Retrieve all names - indexes search</a></li>
            <li><a href="pages/selectby_record.php">Retrieve all - indexes search</a></li>
            <li style="list-style:none; width:10vw;"><hr></li>
            <li><a href="pages/deleterecord.php">Delete Record</a></li>
            <li><a href="pages/updaterecord.php">Search record for</a></li>
        </ul>
    </div>
</body>
</html>