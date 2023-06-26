<!DOCTYPE html>
<html lang="en">
<title>Edit Profile - Payroll App</title>
<?php
include('head.php');
include('db.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>


<?php include('navbar.php'); ?>
<div class="container">
    <form action="process_edit_staff.php" method="post" class="form-control" enctype="multipart/form-data">
        <div class="container text-center mb-5 mt-5">
            <h1>
                <?php echo strtoupper($_SESSION['username']); ?> Profile
            </h1>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Full Name:</span>
                </div>
                <div class="col">
                    <input type="text" name="full_name" class="form-control"
                        value="<?php echo strtoupper($_SESSION['FullName']) ?>">

                </div>

            </div>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Username: </span>

                </div>
                <div class="col">
                    <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>">

                </div>

            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Password: </span>

                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" value="<?php echo $_SESSION['password'] ?>">

                </div>

            </div>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Email: </span>

                </div>
                <div class="col">
                    <input type="text" class="form-control" name="email" class="form=control"
                        value="<?php echo $_SESSION['email'] ?>">

                </div>

            </div>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Age: </span>

                </div>
                <div class="col">
                    <input type="number" name="age" class="form-control" value="<?php echo $_SESSION['age'] ?>">

                </div>

            </div>


        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Profile Picture: </span>
                </div>
                <div class="col">
                    <input type="file" name="file" value="<?php echo $_SESSION['profile_picture'] ?>"
                        class="form-control">

                </div>

            </div>

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

            </div>


        </div>
        <div class="container mt-5 mb-5">
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Save Changes">

            </div>

        </div>


    </form>


</div>




</html>