<!DOCTYPE html>
<html lang="en">
<title>Edit Profile - Payroll App</title>
<?php
include('head.php');
include('db.php');
session_start();

if (!$_SESSION['username'] == 'admin') {
    header('Location: login.php');
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($db_connection, $sql);
$row = $result->fetch_assoc();
?>

<?php include('navbar.php'); ?>
<div class="container mt-5">
    <form action="process_edit_staff.php?id=<?php echo $id; ?>" method="post" class="form-control">
        <div class="container text-center mb-5 mt-5">

            <h1>
                <?php echo $row['username'] ?>
                Profile
            </h1>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Full Name:</span>
                </div>
                <div class="col">
                    <input type="text" name="full_name" class="form-control" value="<?php echo $row['FullName'] ?>">

                </div>

            </div>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Username: </span>

                </div>
                <div class="col">
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">

                </div>

            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Password: </span>

                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ?>">

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
                        value="<?php echo $row['username'] ?>">

                </div>

            </div>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <span>Age: </span>

                </div>
                <div class="col">
                    <input type="number" name="age" class="form-control" value="<?php echo $row['age'] ?>">

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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    DELETE STAFF
                </button>
            </div>

        </div>


    </form>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this particular staff?
                    <p class="text-danger">(Changes cannot be undo)</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="delete_staff.php?id=<?php echo $_GET['id'] ?>">DELETE</a>
                </div>
            </div>
        </div>
    </div>

</div>




</html>