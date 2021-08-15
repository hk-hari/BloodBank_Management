<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>

    <?php include("head.php"); ?>

</head>

<body>

    <?php include("top_nav_nologin.php"); ?>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container" style="margin-top:70px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i class='fa fa-user-md'></i> User Login

                </h1>

            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['user'];
                        $password = $_POST['pass'];
                        $query = "select * from user where user='$username' and pass='$password'";
                        $result = mysqli_query($con, $query);
                        $count = mysqli_num_rows($result);
                        

                        if ($count == 1) {
                            $id = "";
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row["id"];
                            }
                            $_SESSION["user"] = $id;
                            echo "<h1><center> Login successful </center></h1>";
                            header('location:index.php');
                        } else {
                            echo "<h1> Login failed. Invalid username or password.</h1>";
                        }
                    }
                    ?>
                    <form role="form" action="userlogin.php" method="post">
                        <div class="form-group">
                            <label for="user_name" class="text-primary">User Name</label>
                            <input class="form-control" name="user" id="user" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="text-primary">Password</label>
                            <input class="form-control" id="pass" name="pass" type="password" value="" required>
                        </div>


                        <button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> Login Here</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <!-- /.row -->


        <p>Don't have an account? <a href="usersignup.php">Sign up now</a>.</p>

        <!-- Footer -->
        <?php include "footer.php"; ?>

    </div>


</body>

</html>