<?php 
$hospital_id=$_POST["hospital_id"];
$blood=$_POST["BLOOD"];
			include "config.php";
			
				$sql="SELECT country.COUNTRY_NAME, blood.blood_group,blood.blood_ml FROM country INNER JOIN blood ON country.COUNTRY_ID=blood.hospital_id WHERE country.COUNTRY_ID='$hospital_id' AND blood.blood_group='$blood'";
				$result=$con->query($sql);
				if($result->num_rows>0)
				{
						$i=0;
					echo "<div class='table-responsive '><table class='table table-striped table-bordered'>
								<tr class='text-primary'>	
									<th>Sno</th>
									<th>Hospital Name</th>
									<th>Blood Group</th>
									<th>ML</th>
									<th>Action</th>
								</tr>
							";
						
					while($row=$result->fetch_assoc())
					{
					
							$i++;
							echo"<tr>";
							echo"<td>$i</td>";
						
							echo"<td>{$row["COUNTRY_NAME"]}</td>";
							echo"<td>{$row["blood_group"]}</td>";
							echo"<td>{$row["blood_ml"]}</td>";
							echo"<td><a type='submit' href='request_blood.php'>Request </td>";
							echo"</tr>";
					}
					echo "</table></div>";
					
					// if($i==0)
					// {
						
					// echo "<div class='alert alert-danger'><i class='fa fa-users'></i> Our Donors already donated</div>";
					// }
				}
				else
				{
					echo "<div class='alert alert-danger'><i class='fa fa-users'></i> No Donors Found</div>";
				}
			
			

?>
<div class="modal fade" id="Mymodal">
	<div class="modal-content">
		<div class="modal-body">
		<img src='' id="md_img" height="100%" width="100%">
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(".don_img").click(function(){
			var a=$(this).attr("src");
			$("#md_img").attr("src",a);
			$("#Mymodal").modal();
		});
		
	});
</script>

