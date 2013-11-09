<?php
	include('sqlcon.php');
	$query="SELECT * FROM costumers, orders WHERE costumers.ID_pk=orders.CostumerID AND costumers.ID_pk=$_GET[CostumerID]";
	$result=mysql_query($query) or die(mysql_error());
	echo "<table border=0.5px>";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr><td>".$row['Firstname']."</td><td>".$row['Lastname']."</td><td>".$row['orders.ID_pk']."</td><td>".$row['OrderDate']."</td><td>".$row['OrderAmount']."</td></tr>";
	}
	echo "</table>";
	mysql_close();
?>
	
