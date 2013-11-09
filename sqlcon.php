<?php
	$user='student';
	$pwd='student';
	$con = mysql_connect("localhost",$user,$pwd) or die('Could not connect: ' . mysql_error());
	mysql_select_db("anujk",$con) or die(mysql_error());
?>
