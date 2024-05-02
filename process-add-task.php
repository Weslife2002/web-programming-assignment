<?php
// search-task.php
include_once('./includes/connect_database.php');
// Database connection and other necessary includes

$name = $_POST['name'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$department = $_POST['department'];
$assignedTo = $_POST['assignedTo'];
$createdBy = $_SESSION['id'];


$sql = "INSERT INTO tasks (name, description, deadline, department, assignedTo, createdBy)
        VALUES ('$name', '$description', '$deadline', '$department', '$assignedTo', '$createdBy')";
mysqli_query($conn, $sql);
$userId = mysqli_insert_id($conn);

header('Content-type: application/xml');
$xml = new SimpleXMLElement('<response/>');
$xml->addChild('isSuccess', true);

echo $xml->asXML();
?>