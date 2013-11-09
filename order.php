<html>
<body>

<?php
	session_start();
	include('sqlcon.php');

	$date=date("y-m-d");
	$discount=0;
	$amount=0;
	$query="select ID_pk from costumers where email='$_SESSION[email]'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	//echo $row['ID_pk'];
	$_SESSION['CostumerID']=$row['ID_pk'];
	echo $_SESSION['email'];
	echo "<br/>CostumerID: ".$_SESSION['CostumerID'];
	if($_SESSION['j'])
	{
		$query1="insert into orders (OrderDate, discount, OrderAmount, CostumerID) value(curdate(), $discount, $amount, $_SESSION[CostumerID])";
		mysql_query($query1) OR die(mysql_error());
		$query2="select ID_pk from orders order by ID_pk desc";

		$result2=mysql_query($query2);
		$row2=mysql_fetch_array($result2);

		/*$query3="select ID_pk from products";
		$result3=mysql_query($query3);
		$row3=mysql_fetch_array($result3); */
		$total=0;
		echo "<br/No. of items: ".$_SESSION['j'];
		echo "<br/>Order ID: ".$row2[ID_pk]."<br/>You have ordered:";
		echo "<table border=1px>";
		for($i=0;$i<$_SESSION['j'];$i++)
		{
			$pid=$_SESSION['pid'][$i]+0;
			echo "<tr><td>".$pid."</td>";
			$query3="select ProductName, OfferPrice from products where ID_pk=$pid";
			$result3=mysql_query($query3) or die(mysql_error());
			$row3=mysql_fetch_array($result3);
			$price=$row3['OfferPrice'];
			echo "<td>".$row3['ProductName']."</td>";
			echo "<td>".$price."</td></tr>";
			$query4="insert into OrderProduct values ($row2[ID_pk], $pid)";
			$result4=mysql_query($query4) or die(mysql_error());
			$total=$total+$price;
		}
		$query4="update orders set OrderAmount=$total where ID_pk=$row2[ID_pk]";
		mysql_query($query4) or die(mysql_error());
		echo "<tr><td>Total:</td><td>".$total."</td></tr>";
		echo "</table>";
		mysql_close($con);
		echo "<a href=''>To payment Gateway</a>";
	}
	else
	{
		echo "The cart is empty";
	}
?>
</body>
</html>

