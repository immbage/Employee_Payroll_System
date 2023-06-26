<?php
include('head.php');
include('db.php');
include('navbar.php'); ?>

<?php
$sql = 'SELECT department.department, users.FullName FROM department INNER JOIN users ON department.department = users.department';
$result = mysqli_query($db_connection, $sql);


?>

<div class="container mt-5 mb-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th>DEPARTMENT</th>
            </tr>
        </thead>
        <?php
        $num = 0;
        while ($row = $result->fetch_assoc()) {
            $department = $row['department'];
            $fullName = $row['FullName'];
            $num++;

            echo '<tr>
            <td>';
            echo $num;
            echo
            '</td>
            <td>';
            echo $fullName;
            echo '</td>
        <td>';
            echo $department;
            echo '</td>
        </tr>';
        }

        ?>


    </table>

</div>