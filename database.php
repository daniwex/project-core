<?php
// $dsn = 'mysql:host=localhost;port=3306;dbname=CIS525';
// $username = 'root';
// $password = '';
$dsn = 'mysql:host=d-adenikinju-cis525.clmqm3rhtlqg.us-east-2.rds.amazonaws.com;port=3306;dbname=CIS525';
$username = 'admin';
$password = 'Adedamola1!';
// creates PDO object
try{
    $db = new PDO($dsn, $username, $password);
}catch(Exception $e){
    echo $e->getMessage();
}
?>