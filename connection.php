<?php
function OpenCon()
{
  
    $servername = "db5007312976.hosting-data.io";
    $username = "dbu2733651";
    $password = "Dental2022$";
    $dbname = "dbs6025165";


$conn = new mysqli($servername, $username , $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>