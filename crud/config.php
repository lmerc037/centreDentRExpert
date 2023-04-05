<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'db5007312976.hosting-data.io');
define('DB_USERNAME', 'dbu2733651');
define('DB_PASSWORD', 'Dental2022$');
define('DB_NAME', 'dbs6025165');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

