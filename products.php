<html>
<body>
<?php
	include('sqlcon.php');
	echo $_POST['pname'];
	$query="insert into products (ProductName, price, Offerprice, category) values('$_POST[pname]','$_POST[price]','$_POST[offerprice]', '$_POST[category]')";
	mysql_query($query);
	if($query)	echo "<b>Data successfully entered!</b>";
	else	die(mysql_error());
	mysql_close($con);
?>
	<br/>
	<a href="home.php">view homeapage</a>
</body>
</html>
