<?php
include('db.php');
$staff_id = $_POST['staff'];
$salary = $_POST['salary_save'];


echo $staff_id . " " . $salary;

$sql = "UPDATE users SET salary = '$salary' WHERE id = '$staff_id'";
$result = mysqli_query($db_connection, $sql);
header("Location: index.php");