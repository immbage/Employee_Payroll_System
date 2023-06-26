<?php
include('head.php');
include('db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<?php include('navbar.php'); ?>
<div class="conainer mt-5 mb-5">
    <div class="text-center mb-4">
        <h1>Salary Calculator</h1>

    </div>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-5">
            <form action="salary.php" method="post" class="form-control">
                <div class=" container">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-1">
                                <p>$</p>

                            </div>
                            <div class="col">
                                <input type="number" name="salary_amount" class="form-control" required>

                            </div>
                            PER
                            <div class="col">
                                <select name="time_pay" id="" class="form-control">
                                    <option value="hour">Hour</option>
                                    <option value="day">Day</option>
                                </select>


                            </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="container mt-2">
                                <p>Hours per Week</p>

                            </div>

                        </div>

                        <div class="col">
                            <input type="number" placeholder="In Hours" class="form-control" name="hour" required>

                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="container mt-2">
                                <p>Days per Week</p>

                            </div>

                        </div>

                        <div class="col">
                            <input type="number" placeholder="In Days" class="form-control" name="days" required>

                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="container mt-2">
                                <p>Holidays per Year</p>

                            </div>

                        </div>

                        <div class="col">
                            <input type="number" class="form-control" name="holidays" placeholder="In Days" required>

                        </div>

                    </div>


                    <div class="text-center mt-5 mb-5">
                        <input type="submit" class="btn btn-success" value="Calculate >" name="submit">

                    </div>

                </div>
            </form>

        </div>
        <div class="col">

        </div>

    </div>
    <?php
    if (isset($_POST['submit'])) {
        include('process_salary.php');
        echo '<div class="container mt-5 mb-5">
        <div class="text-center">
            <h1>Result</h1>
        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th>-----</th>
                        <th>Unadjusted</th>
                        <th>Holidays Days Adjusted</th>
                    </tr>
                </thead>
                <tbody class="table-group-devider">
                    <tr>

                        <td>Hourly: </td>
                        <td>$ ';
        echo $hourly;
        echo '</td> <td>$ 
        ';
        echo $hol_hourly;
        echo '
        </td>
                    </tr>
                    <tr>
                        <td>Daily: </td>
                        <td>$ ';
        echo $daily;
        echo  '</td> <td>$ ';
        echo $hol_daily;
        echo ' </td>
                    </tr>
                    <tr>
                        <td>Weekly: </td>
                        <td>$ ';
        echo $weekly;
        echo '</td> <td>$ ';
        echo $hol_weekly;
        echo '
        </td>
                    </tr>
                    <tr>
                        <td>Bi - Weekly: </td>
                        <td>$ ';
        echo $bi_weekly;
        echo '</td>';
        echo '<td>$ ';
        echo $hol_bWeekly;
        echo '</td>
                    </tr>
                    <tr>
                        <td>Monthly: </td>
                        <td>$ ';
        echo $monthly;
        echo '</td> 
        <td>$ ';
        echo $hol_monthly;
        echo '
        </td>
                    </tr>
                    <tr>
                        <td>Annual: </td>
                        <td>$ ';
        echo $annual;
        echo ' <td>
            $ ';
        echo $hol_annual;
        echo '
        </td>
                    </tr>
                </tbody>

            </table>
        </div>


    </div>
    
    
    ';
    }

    ?>
    <?php
    if (isset($_POST['submit'])) {
        if ($_SESSION['username'] == 'admin') {
            echo '
        <form action="saved_salary.php" method="post">
        <div class="container">
            <div class="text-center">
                <select name="staff" id="" class="form-control">';
            $sql = "SELECT id,username FROM users";
            $result = mysqli_query($db_connection, $sql);

            while ($row = $result->fetch_assoc()) {
                echo
                '<option value="';
                echo $row['id'];
                echo '">';
                echo $row['username'];
                echo '</option>';
            }
            echo '</select>
    <input type="text" name="salary_save" value="';
            echo $hol_annual;
            echo '" class="hidden" style="display: none;">
    <div class="d-grid gap-2 mt-3">
        <input type="submit" class="btn btn-primary" value="Saved total salary to designated staff">
    </div>
</div>
</div>
</form>';
        }
    }

    ?>

</div>