<html>
<body>

<?php
	session_start();
	include('sqlcon.php');

	if(isset($_GET['remove']))
	{
		for($k=$_GET['remove'];$k<$_SESSION['j'];$k++)
		{
			$_SESSION['pid'][$k]=$_SESSION['pid'][$k+1];
		}
	$_SESSION['j']--;
	}
	echo "<br/No. of items: ".$_SESSION['j'];
	if($_SESSION['j'])
	{
		echo "<br/><b>The cart has:</b>";
		echo "<table border=1px>";
		for($i=0;$i<$_SESSION['j'];$i++)
		{
			$pid=$_SESSION['pid'][$i]+0;
			echo "<tr><td>".$pid."</td>";
			$query="select ProductName, OfferPrice from products where ID_pk=$pid";
			$result=mysql_query($query) or die(mysql_error());
			$row=mysql_fetch_array($result);
			$price=$row['OfferPrice'];	//It caused problem, had to assign it to a varaible. worked then after.
			echo "<td>".$row['ProductName']."</td>";
			echo "<td>".$price."</td>";
			echo "<td><form action='viewcart.php' method=GET>
					<input type=hidden value=$i name='remove'/>
					<input type=submit value='Remove from cart'/>
				  </form></td></tr>";
			$total=$total+$price;
		}
		echo "<tr><td>Total:</td><td>".$total."</td></tr>";
		echo "</table>";
	}
	else echo "The cart is empty!<br/>";
	mysql_close($con);
?>
<a href= 'home.php'>back to home</a>
</body>
</html>
