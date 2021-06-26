<?php
	$con = new mysqli("127.0.0.1","root","","testdb");
	if ($con -> connect_errno){
		die('Could not connect: '.$con -> connect_error);
		exit();
	}
?>
