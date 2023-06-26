<?php 
    function dbLink() {
        $host = 'localhost:';
        $port = '27017';
        $connectionString = 'mongodb://'.$host.$port;

   Try {
       $db = new MongoDB\Driver\Manager("$connectionString");
   } catch (exception $e){
       echo 'Error with connection: <br>'.$e;
   }
        return $db;
    }

    function insertName($dbConnect, $field, $databaseCollection) {
        /**********
        * $dbConnect - Passed in database
        * $databaseCollection - User choice of database and collection from server
        * $fiel - Class field containing dasta
        **********/

        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $doc = ['name' => $field];  //collection document will only contain the nasme field
        $bulkWrite ->insert($doc);
        $result = $dbConnect->executeBulkWrite($databaseCollection, $bulkWrite);
        return $result;
    }
        
        //insert single documents with multiple fields
        function insertComplexName($dbConnect, $name, $age, $role, $databaseCollection) {
            /**********
            * $dbConnect - Passed in database
            * $databaseCollection - User choice of database and collection from server
            * $name, $age, $role - User data into fields in collection, so the document has 3
            **********/
    
            $bulkWrite = new MongoDB\Driver\BulkWrite(['ordered' => true]); 
            $bulkWrite ->insert(['name' => $name, 'age' => $age, 'role' => $role]);
            $result = $dbConnect->executeBulkWrite($databaseCollection, $bulkWrite);
            return $result;
    }

    //read a single record from MongoDB
    function displaySingleDocument($dbConnect, $database, $collection, $filter, $options) {
        /**********
        * $dbConnect - Passed in database
        * $database - User choice of database from server
        * $collection - user choice of collecftion to examine
        * $filter - find command e.g. $filter =['storeLocation' => 'London']
        * $options - additional options for command e.g. $options = ['limit' =>2];
        **********/

        $query = new MongoDB\Driver\Query($filter, $options);
        $dbCollection = $database.'.'.$collection;
        $cursor = $dbConnect->executeQuery($dbCollection, $query);
        $cursor->setTypeMap(['root' => 'array']); //Converts class to array
        echo '<table style="border:1px solid black; width:40vw;">';
        echo '<tr><th>Unique id</th><th>Name</th><th>Age</th><th>Role</th></tr>';
        foreach($cursor as $document){
            error_reporting(0);
        echo '<tr><td></td>';
            echo '<td>'.$document['name'].'</td></tr>';
        }
        echo '</table>';
}

    //Read from MongoDB display data based off name
    function displayAllData($dbConnect, $database, $collection, $filter, $options, $field) {
        /**********
        * $dbConnect - Passed in database
        * $database - User choice of database from server
        * $collection - user choice of collecftion to examine
        * $filter - find command e.g. $filter =['storeLocation' => 'London']
        * $options - additional options for command e.g. $options = ['limit' =>2];
        * $field - class field containing data
        **********/

        $query = new MongoDB\Driver\Query($filter, $options);
        $dbCollection = $database.'.'.$collection;
        $cursor = $dbConnect->executeQuery($dbCollection, $query);
        $cursor->setTypeMap(['root' => 'array']); //Converts class to array
        echo '<table style="border:1px solid black; width:40vw;">';
        echo '<tr><th>Unique id</th><th>Name</th><th>Age</th><th>Role</th></tr>';
        foreach($cursor as $document){
            error_reporting(0);
        echo '<tr><td></td>';
            echo '<td>'.$document['_id'].'</td>';
            echo '<td>'.$document['name'].'</td>';
            echo '<td>'.$document['age'].'</td>';
            echo '<td>'.$document['role'].'</td></tr>';
        }
        echo '</table>';
}

    //read from MongoDB
    function displayData($dbConnect, $database, $collection, $filter, $options, $field) {
        $count = 0;
        $query = new MongoDB\Driver\Query($filter, $options);
        $dbCollection = $database.'.'.$collection;
        $cursor = $dbConnect->executeQuery($dbCollection, $query);
        foreach($cursor as $document){
            $x = $document->$field;
            echo $count.'  '.$x.'<br>';
            $count++;
            //print_r($document);
        }
        echo 'Records count: '.$count;
}

    //read from MongoDB
    function displayComplexData($dbConnect, $database, $collection, $filter, $options, $field1, $field2, $field3) {
        $count = 0;
        $query = new MongoDB\Driver\Query($filter, $options);
        $dbCollection = $database.'.'.$collection;
        $cursor = $dbConnect->executeQuery($dbCollection, $query);
        $cursor->setTypeMap(['root' => 'array']); //Converts class to array

        echo '<table style="border:1px solid black; width:40vw;">';
        echo '<tr><th>Unique id</th><th>Name</th><th>Age</th><th>Role</th></tr>';
        foreach($cursor as $document){
            error_reporting(0);
            echo '<tr><td></td>';
            echo '<td>'.$document['_id'].'</td>';
            echo '<td>'.$document[$field1].'</td>';
            echo '<td>'.$document[$field2].'</td>';
            echo '<td>'.$document[$field3].'</td></tr>';
            $count++;
        }
        echo '</table>';
        echo 'Records count:'.$count;
}

function displayAllFields($dbConnect, $database, $collection, $filter, $options, $field) {
    $count = 0;
    $query = new MongoDB\Driver\Query($filter, $options);
    $dbCollection = $database.'.'.$collection;
    $cursor = $dbConnect->executeQuery($dbCollection, $query);
    $cursor->setTypeMap(['root' => 'array']); //Converts class to array
    foreach($cursor as $document){
        echo $document['_id'].' --';
        echo $document['name'].' --';
        echo $document[$field].'<br>';
        // print_r($field);
    }
}

function displayAllDataForDelete($dbConnect, $database, $collection, $filter, $options) {
    $query = new MongoDB\Driver\Query($filter, $options);
    $dbCollection = $database.'.'.$collection;
    $cursor = $dbConnect->executeQuery($dbCollection, $query);
    $cursor->setTypeMap(['root' => 'array']); //Converts class to array
    echo '<table style="border:1px solid black; width:40vw;">';
    echo '<tr><th>Unique id</th><th>Name</th><th>Delete</th></tr>';


    foreach($cursor as $document){
        echo '<tr><td></td>';
        echo '<td>'.$document['_id'].'</td>';
        echo '<td>'.$document['name'].'</td>';
        echo '<td><a href="delete.php?id='.$document['_id'].'&name='.$document['name'].'">Delete</a></td></tr>';
    }
    echo '</table>';
}

function delete($dbConnect, $name, $id, $databaseCollection) {
    $bulkWrite = new MongoDB\Driver\BulkWrite;
    $id_filter = ['_id'=> $id];
    $filter = ['name'=> $name];
    $options = ['limit'=> 1];
    if($id_filter['_id'] == $id){
        $bulkWrite->delete($filter, $options);
        $dbConnect->executeBulkWrite($databaseCollection, $bulkWrite);
    }
}

function updateContent($dbConnect, $id, $field, $data, $name, $databaseCollection) {
    /**
    * $dbConnect - Passed in database
    * $databaseCollection - User choice of database and collection from server
    * $id - document id - used to determine unique document
    * $data - element to be updated
    * $name - name within document. Used for filter
     */
    $convertid= 'ObjectId("'.$id.'")';
    $bulkWrite = new MongoDB\Driver\BulkWrite(['ordered' => true]);
    $id_filter = ['_id'=> $id];
    $filter = ['name'=> $name];
    $options = ['limit'=> 1];
    if($id_filter['_id'] == $id){
        $bulkWrite->update(
            ['name' => $name],
            ['$set' => [$field => $data]],
            ['multi' => false, 'upsert' => false]

        );
        $result = $dbConnect->executeBulkWrite($databaseCollection, $bulkWrite);
    }
}

?>


