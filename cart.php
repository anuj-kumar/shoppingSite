<html>
    <head>
	<?php
	    session_start();
	    if(isset($_SESSION['email']))
	    {
			if($_SESSION['pid'][$_SESSION['j']]!=$_GET['cart'])
			{
				$_SESSION['pid'][$_SESSION['j']]=$_GET['cart'];
				$_SESSION['j']++;
			}
	    }
	    else echo "Login kar pehle";
	    //header("Refresh:0;url='home.php'");
	    header('Location: home.php');
	?>
    </head>
</html>
