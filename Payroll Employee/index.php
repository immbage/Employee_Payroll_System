<?php
session_start();
include('db.php');
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container text-center mt-5">
        <div id="border" class="container border">
            <div class="mt-5">
                <?php
        if (isset($_SESSION['username'])) {
          echo '                <h1 class="text-primary border-bottom pb-3 mb-5">User Profile</h1>
                  ';
        } else {
          echo '                <h1 class="text-primary">All Staff</h1>
';
        }
        ?>
            </div>
            <?php

      //ini buat biar kalo user yg admin aja yg bisa cek all staff. kalo yg bukan staff cuman bisa cek salar dia doang
      // Ganti make session yg diatas

      if (isset($_SESSION['username'])) {

        if ($_SESSION['username'] == 'admin') {


          echo '<div class="container">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Option</th>
                    </tr>
                    ';

          $sql = "SELECT * FROM users";
          $result = mysqli_query($db_connection, $sql);

          $limit = 5;
          $pages = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
          $first_page = ($pages > 1) ? ($pages * $limit) - $limit : 0;

          $previous = $pages - 1;
          $next = $pages + 1;
          $total_data = mysqli_num_rows($result);
          $total_pages = ceil($total_data / $limit);
          $sql_1 = "SELECT * FROM users limit $first_page, $limit";
          $num = $first_page;
          $data_staff = mysqli_query($db_connection, $sql_1);
          while ($row = $data_staff->fetch_assoc()) {
            $num++;
            $id = $row['id'];
            $name = $row['username'];
            $age = $row['age'];
            $email = $row['email'];
            $salary = $row['salary'];
            $department = $row['department'];
            echo '<tr>
          <td>';
            echo $num;
            echo '</td>
                        <td>';
            echo $name;
            echo '</td>
                        <td>';
            echo $department;
            echo '</td>
                        <td>';
            echo $age;
            echo '</td>
                        <td>';
            echo $email;
            echo
            '</td>
            ';
            echo '
                        <td> ';
            if ($salary == '') {
              echo '    <p class="text-danger">NOT SET</p>
              ';
            } else {
              echo '<p class="text-success">$';
              echo $salary;
              echo ' </p>';
            }
            echo '</td>';
            echo '<td>';
            echo '<a href="edit_admin_priv.php?id=';
            echo $id;
            echo '';
            echo '" class="btn btn-warning">Setting Profile</a>
            ';
            echo '</td>';
            echo '<td>';
            echo '</td>';
            echo '
                    </tr>';
          }

          echo '</table>

            </div><nav aria-label="Page navigation example">
            <ul class="pagination">';


          for ($x = 1; $x <= $total_pages; $x++) {
            echo '              <li class="page-item ms-1"><a class="page-link" href="?pages=';
            echo $x;
            echo '">';
            echo $x;
            echo '</a></li>
';
          }
          echo '</ul>
          </nav>';
        } else {
          include('profile_info.php');
        }
      } ?>



            <div class="container mt-5 mb-5">
                <?php
        if (isset($_SESSION['username'])) {
          if ($_SESSION['username'] == 'admin') {

            echo '                <a href="add_staff.php" class="btn btn-primary">Add new staff</a>
';
          };


          echo '                <a href="logout.php" class="btn btn-danger">Logout</a>
          <a href="edit_staff.php" class="btn btn-primary">Edit Profile</a>
          <a href="see_all_staff.php" class="btn btn-primary">See All Staff</a>
';
        } else {
          echo 'YOU MUST LOGIN';
          echo '                <a href="login.php" class="btn btn-primary">Login</a>
';
        } ?>
            </div>
        </div>

    </div>

</body>

</html>