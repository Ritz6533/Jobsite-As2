<?php
//connecting to the database
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'job';

$pdo = new PDO('mysql:dbname='.$schema.';host='.$server,$username,$password);

?>