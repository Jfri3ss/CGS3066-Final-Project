<?php
$entreeName = $_POST['entreeName'];
$price = $_POST['price'];
$vegetarian = $_POST['vegetarian'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('Steves-iMac.local', 'user1', 'password12', 'db');

$stmt = $mysqli->prepare("INSERT INTO menu VALUES (?, ?, ?)");
$stmt->bind_param('sis', $entreeName, $price, $vegetarian);
$entreeName = $_POST['entreeName'];
$price = $_POST['price'];
$vegetarian = $_POST['vegetarian'];

$stmt->execute();
header("Refresh:0; url=menu.php");
?>
