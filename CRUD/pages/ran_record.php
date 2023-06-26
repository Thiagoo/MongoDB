<?php
    include_once('../functions/functions.php');
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
        <a href="../index.php">Return to index</a>
    </div>

    <div class="row">
        <?php
        //Read all records by a field and sort
        echo 'Read All records by a field(name) and sort<br>';
        $filter = [];
        $options = ['sort'=>array('_id'=>-1),'limit'=>20];

        displayData($dbconnect,'content','names',$filter, $options, 'name');
        echo '<hr>';

        //Read all with multiple fields
        echo 'Read all with multiple fields';
        $filter =[];
        $options = ['sort'=>array('_id'=>-1),'limit'=>20];
        displayComplexData($dbconnect,'content','names',$filter, $options,'name', 'age', 'role');
        ?>
    </div>
</body>
</html>