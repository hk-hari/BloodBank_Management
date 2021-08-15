<?php 

$con=new mysqli("localhost","root","","Bloodbank");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>