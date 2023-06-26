<?php
    include_once('../functions/functions.php');
    $dbconnect = dbLink();
   
    if ($dbconnect) 
        echo '<br>Connection Established<br>';
        echo '<br><a href="../index.php">Return</a><br>';

$name = $_POST['name'];
$filter = ['name'=>$name];
$options = ['limit'=>100];
$id = displaySingleDocument($dbconnect, 'content','names', $filter, $options);
echo '<hr>';
echo 'Update<br>
<form action="urecord.php" method="post">
    <select name="field">
        <option value="name">Name</option>
        <option value="age">Age</option>
        <option value="role">Role</option>
    </select>
    <input type="hidden" name="id" value="'.$id.'">
    <input type="hidden" name="name" value="'.$name.'">
    <input type="text" name="data" placeholder="Enter updated information">
    <input type="submit" value="Update"<br>
</form>
<hr>
';
?>