<?php
$serverName = "localhost";
$username = "root";
$password = "";
$db = "bookclub";

$conn = new mysqli($serverName,$username,$password,$db);

if ($conn->connect_error) {
    die("nepavyko prisijungti: ".$conn->connect_error);
}
echo "Huston, im in.<br>";
?>