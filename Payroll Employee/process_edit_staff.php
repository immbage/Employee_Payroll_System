<?php
include('db.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$department = $_POST['department'];
$id = $_GET['id'];
$picture_name = $_FILES['file']['name'];
$pictue_tmp = $_FILES['file']['tmp_name'];
$dir = "static/img/";



if ($_SESSION['username'] == 'admin') {
    $sql_admin = "UPDATE users SET username = '$username', password = '$password', email = '$email', age = '$age', department = '$department', FullName = '$full_name'  WHERE id = '$id'";

    if ($result = mysqli_query($db_connection, $sql_admin)) {
        echo 'Upload Sucessfully!!';
        $db_connection->close();
        header("Location: index.php");
    }
} else {
    $id = $_SESSION['id'];
    $sql = "UPDATE users SET username = '$username', password = '$password', email = '$email', age = '$age', department = '$department', FullName = '$full_name', profile_picture = '$picture_name'  WHERE id = '$id'";
    if ($result_1 = mysqli_query($db_connection, $sql)) {

        move_uploaded_file($pictue_tmp, $dir . $picture_name);

        echo 'Update Sucessfully!';
        session_destroy();
        header("Location: index.php");
    }
}