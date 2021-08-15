<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
</head>

<body>


	<?php
	include("top_nav.php");
	?>

	<!-- Page Content -->
	<div class="container-fluid" style='margin-top:70px;'>
		<!-- Marketing Icons Section -->
		<div class="row">
			<div class="col-lg-12">
				<h3 class=" text-primary">
					<i class='fa fa-search'></i> Search blood Avalibility
				</h3>
				<hr>
			</div>
		</div>

		<?php include("blood_bread.php"); ?>
		<?php
		include('config.php');
		$query1 = mysqli_query($con, "select * from `country`");
		$query2 = mysqli_query($con, "select * from `blood`");
		?>




		<div class="row  centered-form ">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-search "> </span> Search blood Avalibility</h3>
					</div>
					<div class="panel-body">
						<form name="frm" id="frm">
							<div class="form-group">
								<label class="control-label text-primary">Search Type</label>
								<select name="hospital_id" id="STYPE" required class="form-control input-sm">
									<?php while ($row = mysqli_fetch_array($query1))
									 {

									?>
										<option value="<?php echo $row["COUNTRY_ID"]; ?>"><?php echo $row["COUNTRY_NAME"]; ?></option>

									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label text-primary">Required Blood Group</label>
								<select name="BLOOD" id="BLOOD" required class="form-control input-sm">
								<?php while ($row = mysqli_fetch_array($query2))
									 {

									?>
									<option value="<?php echo $row["blood_group"]; ?>" ><?php echo $row["blood_group"]; ?></option>
									<?php
									}
									?>
									 


								</select>
							</div>
							<!-- <div class="form-group">
								<label class="control-label text-primary">Search Text</label>
								<input type="text" name="str" id="str" required placeholder="Type Here" class="form-control input-sm">
							</div> -->

							<div class="form-group">

								<button class="btn btn-primary" id="submit" name="submit" type="button"><i class='fa fa-search'></i> Search Blood</button>
							
							</div>

					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6" id="feedback">
				<p>
					Please fill the correct details and search your nearest donor.For more queries contact our admin.
				</p>
			</div>



		</div>

	</div>


	<?php include("footer.php"); ?>

	<script>
		$(document).on('click', '#submit', function() {
			$.ajax({
				url: "search_don.php",
				method: "POST",
				data: $("#frm").serialize(),
				success: function(data) {
					$("#feedback").html(data);

				}
			});

		});
	</script>

</body>

</html>