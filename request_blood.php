<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>

</head>

<body>


	<?php
	include("top_nav.php");
	?>
	<div class="container" style='margin-top:70px;'>
		<div class="row">
			<div class="col-lg-12">
				<h3 class=" text-primary">
					<i class='fa fa-heart'></i> Need Blood To Save Life
				</h3>
				<hr>
			</div>
		</div>
		<?php include("blood_bread.php"); ?>






		<div class="row centered-form">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-envelope "> </span> Need Blood To Save Lifes</h3>
					</div>
					<div class="panel-body">
						<p id="errorBox"></p>

						<?php
						if (isset($_POST["submit"])) {
							$target_dir = "request_image/";
							$file_name = $_FILES["PIC"]["name"];
							if ($file_name != "") {
								$target_file = $target_dir . rand(100, 999) . basename($_FILES["PIC"]["name"]);
								move_uploaded_file($_FILES["PIC"]["tmp_name"], $target_file);
							} else {
								$target_file = "request_image/no-image.jpg";
							}

							$sql = "INSERT INTO request_blood(NAME,GENDER,BLOOD,BUNIT,HOSP,CITY,PIN,DOC,RDATE,CNAME,EMAIL,CON1,CON2,REASON,PIC,CADDRESS)
								 VALUES('{$_POST["NAME"]}','{$_POST["GENDER"]}','{$_POST["BLOOD"]}','{$_POST["BUNIT"]}','{$_POST["HOSP"]}','{$_POST["CITY"]}','{$_POST["PIN"]}','{$_POST["DOC"]}','{$_POST["RDATE"]}','{$_POST["CNAME"]}','{$_POST["EMAIL"]}','{$_POST["CON1"]}','{$_POST["CON2"]}','{$_POST["REASON"]}','{$target_file}','{$_POST["CADDRESS"]}')";
							if ($con->query($sql)) {
								echo "<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Information : </strong>Your Blood request is sent. Admin will contact you soon</div>";
							} else {
								echo "<div class='alert alert-danger fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error : </strong>Server busy.Try again later.</div>";
							}
						}

						?>
						<form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label text-primary">Patient Name</label>
								<input type="text" placeholder="Patient Name" name="NAME" required id="NAME" class="form-control input-sm">
							</div>

							<div class="form-group">
								<label class="control-label text-primary" for="GENDER">Gender</label>
								<select id="gen" name="GENDER" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Thirunangai">Thirunangai</option>
									<option value="Thirunambi">Thirunambi</option>
								</select>
							</div>


							<div class="form-group">
								<label class="control-label text-primary">Required Blood Group</label>
								<select name="BLOOD" id="BLOOD" required class="form-control input-sm">
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
								<label class="control-label text-primary">Need Unit Of Blood</label>
								<input type="text" required name="BUNIT" id="BUNIT" class="form-control" placeholder="Insert No Of Unit">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Hospital Name &amp; Address</label>
								<textarea required name="HOSP" id="HOSP" rows="5" style="resize:none;" class="form-control" placeholder="Hospital Full Address"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label text-primary">City</label>
								<input type="text" required name="CITY" id="CITY" class="form-control" placeholder="Insert City">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Pincode</label>
								<input type="text" required name="PIN" id="PIN" class="form-control" placeholder="Insert Pincode">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Doctor Name</label>
								<input type="text" placeholder="Doctor Name" class="form-control input-sm" name="DOC" id="DOC">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">When Required</label>
								<input type="text" placeholder="MM/DD/YYYY" class="form-control input-sm DATES" name="RDATE" id="RDATE">
							</div>

							<div class="form-group">
								<label class="control-label text-primary">Contact Name</label>
								<input type="text" placeholder="Contact Name" class="form-control input-sm" name="CNAME" id="CNAME">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Address</label>
								<textarea required name="CADDRESS" id="CADDRESS" rows="5" style="resize:none;" class="form-control" placeholder="Full Address"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Email ID</label>
								<input type="text" placeholder="Contact Email" class="form-control input-sm" name="EMAIL" id="EMAIL">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Contact No-1</label>
								<input type="text" placeholder="Contact Number" class="form-control input-sm" name="CON1" id="CON1">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Contact No-2</label>
								<input type="text" placeholder="Contact Number" class="form-control input-sm" name="CON2" id="CON2">
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Reason For Blood</label>
								<textarea required name="REASON" id="REASON" rows="5" style="resize:none;" class="form-control" placeholder="Reason For Blood" name="REASON" id="REASON"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Upload Photo</label>
								<input type="file" onChange="validate(this.value)" name="PIC" id="PIC">
							</div>


							<div class="form-group">
								<button class="btn btn-primary" id="BTN" name="submit"><i class="fa fa-send"></i> Request Now</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<?php
		 
		include("config.php");
		include("admin_function.php");
		 
		?>
		<!DOCTYPE html>
		<html lang="en">

		 

		<body>


			<div class="container" style='margin-top:70px;'>
				<div class="row">

					<div class="col-sm-12">

						<h3 class="text-primary"><i class="fa fa-bed"></i> Need Blood Status</h3>
						<hr>
						<div class="col-md-6 col-md-offset-3">

							 
						</div>
						<div class='col-md-12'>
							<div class='table-responsive' id="feedback">

								<?php
								$sql = "Select * from request_blood";
								load_patient_view($sql, $con);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>