<?php
include('db.php');

?>


<!DOCTYPE html>
<html lang="en">


<?php include('head.php') ?>
<div class="container mt-5">
    <div class="border">
        <div class="row">
            <div class="col">
                <img src="<?php
                            if ($_SESSION['profile_picture'] == '') {
                                echo 'static/img/';
                                echo 'pp.jpeg';
                            } else {
                                echo 'static/img/';
                                echo $_SESSION['profile_picture'];
                            }
                            ?>" alt="NO PROFILE PICTURE" class="img-thumbnail mt-3 mb-3">

            </div>
            <div class="col">
                <div class="container mt-3">
                    <table class="table table-border table-primary table-striped">
                        <tr>
                            <td>Full Name: </td>
                            <td> <?php echo $_SESSION['FullName'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:
                            </td>
                            <td><span><?php echo $_SESSION['email'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td> <span><?php echo $_SESSION['age'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td> <span><?php echo $_SESSION['department'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Salary: </td>
                            <td> <?php
                                    if ($_SESSION['salary'] == '') {
                                        echo '<p class="text-danger">NOT SET</p>';
                                    } else {
                                        echo '<span>$';
                                        echo $_SESSION['salary'];
                                        echo '</span>
                                ';
                                    } ?>

                            </td>
                        </tr>
                    </table>

                </div>


            </div>

        </div>

    </div>

</div>

</html>
