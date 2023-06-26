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
        <form action ="viewcompleterecord.php" method="post">
            <label> Data is going into content.names</label><br>
            <input type="text" name="name" placeholder="Enter Full Name"> </input>
            <input type="submit" value="Search"> </input>
        </form>
    </div>
</body>
</html>