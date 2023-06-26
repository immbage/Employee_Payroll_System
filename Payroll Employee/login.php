<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <!-- INCLUDE NAVBAR HERE -->
    <?php include('navbar.php') ?>
    <!-- INCLUDE NAVBAR HERE -->
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="container mt-5">
                <form action="process_login.php" class="form-control" method="post">
                    <div class="container mt-5">
                        <h1 class="text-center">Login Page</h1>
                    </div>
                    <div class="container">
                        <div class="container-fluid mt-3">
                            <span class="p">Username: </span>
                            <input type="text" class="form-control" name="username" required />
                        </div>
                        <div class="container-fluid mt-3">
                            <span class="p mt-3">Password: </span>
                            <input type="password" name="password" class="form-control" required />
                        </div>

                        <div class="text-center mt-5 mb-5">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login" />

                        </div>
                    </div>
                </form>

            </div>

        </div>


    </div>


</body>



</html>