<?php
$conn = conn();

$id = $_GET['id'];

$sql = "SELECT * FROM teacher WHERE id = $id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$gender = $row['gender'];
$name = $row['name'];
$lastname = $row['lastname'];
$username = $row['username'];
$password = $row['password'];
$role = $row['role'];
$level = $row['level'];
$room = $row['room'];
?>
