<?php
/*
    Configuration for database connection.

*/

// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "task3";

$host = "sql6.freesqldatabase.com";
$user = "sql6469403";
$pass = "nMDMztqmfl";
$dbname = "sql6469403";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die("no connection". mysqli_connect_errno());
}


?>