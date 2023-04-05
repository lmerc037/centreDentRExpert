<?php
function OpenCon()
{
  
    $servername = "localhost";
    $username = " ";// add your database username;
    $password = " ";// add your database password;
    $dbname = " ";// add your database name;


$conn = new mysqli($servername, $username , $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
