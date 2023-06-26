<?php
include('head.php');
include('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($db_connection, $sql);

if ($row = $result->fetch_assoc()) {
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['profile_picture'] = $row['profile_picture'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['department'] = $row['department'];
    $_SESSION['salary'] = $row['salary'];
    $_SESSION['FullName'] = $row['FullName'];
    header('Location: index.php');
} else {
    echo '<h1 class="text-danger text-center mt-5">Wrong Credentials</h1>';
}