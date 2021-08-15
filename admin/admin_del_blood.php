<?php
include("config.php");
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	$sql="DELETE FROM blood WHERE id=$id";
	$con->query($sql);
	echo "<script>
		alert('blood Deleted');
		window.open('admin_add_blood.php','_self');
	</script>";
}
?>