<?php

$host = "localhost" ;
$username = "root" ;
$password = "" ; 
$database = "phpadminpanel";

// Connections
$con = mysqli_connect( $host, $username, $password, $database);

// Check Connection
if(!$con)
{
    header ("Location: ../db.php");
    die();
}
?>