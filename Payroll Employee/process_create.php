<?php
include('db.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$profile_picture = $_POST['profile_picture'];
$department = $_POST['department'];
$id = $_SESSION['id'];

$sql = "INSERT INTO users (username,password,email,age,profile_picture,department,fullname) VALUES ('$username','$password','$email','$age','$profile_picture','$department','$full_name')";
$result = mysqli_query($db_connection, $sql);
header("location: index.php");