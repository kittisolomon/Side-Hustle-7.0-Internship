<?php 

$db_con = mysqli_connect("localhost","root","","sidehustle");

if($db_con){
	
	echo "database connected succefully";

}else{

	die("Cannot connect to databse".mysqli_error($db_con));

}

?>