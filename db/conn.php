<?php
// we will use pdo for connecting to database
// declare a variable and assign server
$host = 'localhost';
$db = 'attendance_db';
$user = 'root';
$pass = '';
// root does not have pass. Other wise we provide our credentials
$charset = 'utf8mb4';
// terminology we use for connectivity in pdo. 1st its the driver(mysql)--im about to connecto to where.
// with the above parameters.
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // the above line helps us to see if there is an error before continuing
} catch (PDOException $e) {
    echo "<h1 class = 'text-danger'>No Database Found</h1>";
    // throw new PDOException($e->getMessage());
}

require_once 'crud.php';
$crud = new crud($pdo);

?>