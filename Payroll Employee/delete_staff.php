<?php

include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($db_connection, $sql);
header("Location: index.php");