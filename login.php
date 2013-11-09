<?php
	session_start();
	include('sqlcon.php');
	//else         echo "conn. successful";
	/*$email=$_POST['email'];
	$pwd=$_POST['pwd']; */
	$_SESSION['email']=$_POST['email'];
	$_SESSION['pwd']=$_POST['pwd'];

	$query="SELECT Firstname, Lastname FROM costumers where email='$_SESSION[email]' AND password='$_SESSION[pwd]'";
	$result=mysql_query($query,$con);
	if(!$result) die(mysql_error());
	$count=mysql_num_rows($result);
	if($count==1)
	{
		$row=mysql_fetch_array($result);
		$_SESSION['name']=$row['Firstname']." ".$row['Lastname'];
		echo "<br/>Login successful!</br><b>Welcome ".$_SESSION['name']." </b>";
	/*	session_register($email);
		session_register($pwd);
		include("login_success.php");*/
	}
	else
	{
		echo "Invalid username or password";
		session_destroy();
	}
	header("Refresh:3;url='home.php'");
	//mysql_close($con);
?>



