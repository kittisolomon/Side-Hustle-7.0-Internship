<?php 

include "db_conn.php";

echo "<br>";

function multiply($num1, $num2, $num3 = 5){

	$result = $num1 * $num2 * $num3;

	return $result;
}

echo multiply(2,3);



?>