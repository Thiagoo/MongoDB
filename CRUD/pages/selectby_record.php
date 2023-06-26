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
    echo 'View all records by a field and sort<br>';
    echo '<form action ="viewselectby.php" method="post">
        See all records by;
        <select name="field">
           <option value="name">Name</option>
           <option value="age">Age</option>
           <option value="role">Role</option>
        </select>
        <br>
        <input type="submit" value="search"> </input>
        </form>';
    ?>
    </div>
</body>
</html>