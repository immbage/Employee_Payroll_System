<!DOCTYPE html>
<?php

include('db.php');
include('head.php');
include('navbar.php');

?>

<body>

    <div class="container mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1>Add Staff To Database</h1>
            </div>
            <form action="process_create.php" method="post" class="form-control">
                <div class="container mt-3">
                    <span>Full Name: </span>
                    <input type="text" name="full_name" class="form-control" required>
                </div>

                <div class="container mt-3">
                    <span>Username: </span>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="container mt-3">
                    <span>Password: </span>
                    <input type="password" name="password" required class="form-control">
                </div>
                <div class="container mt-3">

                    <span>Email: </span>
                    <input type="email" name="email" required class="form-control">
                </div>

                <div class="container mt-3">
                    <span>Age: </span>
                    <input type="number" name="age" class="form-control" required>
                </div>


                <div class="container mt-3">
                    <span>Profile picture</span>
                    <input type="file" name="profile_picture" class="form-control">
                </div>

                <div class="container mt-4">

                    <div class="row">
                        <div class="col">
                            <span>Department : </span>
                        </div>
                        <div class="col">
                            <select name="department" id="" class="form-control">
                                <?php
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($db_connection,  $sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="';
                                    echo $row['department'];
                                    echo '">';
                                    echo $row['department'];
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="container text-center mt-5 mb-5 ">
                            <input type="submit" name="submit" value="Add Staff" class="btn btn-primary">

                        </div>



            </form>
        </div>

    </div>

</body>
