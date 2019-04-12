<?php

	 $servername = "localhost";
	 $username = "root";
	 $password = "";
	 $dbname = "restaurant";

	 $conn = new mysqli($servername,$username,$password,$dbname);



	 if($conn ->connect_error)
	 {
	 	die("connetion failed".$conn->connect_error);
	 }
?>