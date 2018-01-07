<?php
$servername = "localhost";
$username = "tommarst_ceneo";
$password = "szarek";
$dbname = "tommarst_ceneo";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "Delete FROM Opinie";
$result = $conn->query($sql);
$sql1 = "Delete FROM Ceneo";
$result1 = $conn->query($sql1);
?>