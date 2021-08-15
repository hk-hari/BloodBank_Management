<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>

	<?php include("head.php");?>

</head>

<body>

<?php include("top_nav_nologin.php"); ?>

    <!-- Navigation -->
   

    <!-- Page Content -->
    <div class="container" style="margin-top:70px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i class='fa fa-user-md'></i> User signup
                  
                </h1>
              
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
                <?php
                if(isset($_POST['submit']))
                {
                 $user = $_POST['user'];
                 $pass = $_POST['pass'];
                 $blood = $_POST['blood'];
               
                 $gender = $_POST['gender'];

                 $query="INSERT INTO user (user,pass,blood,gender) VALUES ('$user','$pass','$blood','$gender')";

                 if(mysqli_query($con,$query))
                 {
                      
                    echo "<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Information : </strong>User accound created sucessfully</div>";
                 
                  
                   
                  

                 }
                  
                }
                ?>
					<form role="form" action="usersignup.php" method="post">
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">User Name</label>
			    		    <input class="form-control" name="user"  id="user" type="text" required>
			    		</div>
			    		<div class="form-group">
							<label for="pass" class="text-primary">Password</label>
			    			<input class="form-control" id="pass" name="pass" type="password" value="" required>
			    		</div>
						<div class="form-group">
							<label class="control-label text-primary">Your Blood Group</label>
								<select name="blood" id="blood" required  class="form-control input-sm">
							<option value="">Select Blood</option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							<option value="A1+">A1+</option>
							<option value="A2+">A2+</option>
							<option value="A1B+">A1B+</option>
							<option value="A2B+">A2B+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
							<option value="A1-">A1-</option>
							<option value="A2-">A2-</option>
							<option value="A1B">A1B-</option>
							<option value="A2B">A2B-</option>
							 

								</select>
						</div>
                        <div class="form-group">
							<label class="control-label text-primary"  for="GENDER">Gender</label>
								<select id="gen" name="gender" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									 
								</select>
						</div>
						
			    		<button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> Signup Here</button>
			      	</form>
                      <p>created an account? <a href="userlogin.php">Login Here</a>.</p>
				</div>
				<div class="col-md-3"></div>
			</div>
        </div>
        <!-- /.row -->


       

        <!-- Footer -->
       <?php include"footer.php";?>
  
        </div>
      
  
</body>

</html>
