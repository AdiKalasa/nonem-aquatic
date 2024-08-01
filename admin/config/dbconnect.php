<?php

$server = "localhost";
$user = "root";
$db_password = "";
$db = "nonemaquatic";

$conn = mysqli_connect($server,$user,$db_password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>