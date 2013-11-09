<html>
<body>
<?php
	session_start();
	include('sqlcon.php');

	$_SESSION['adminpwd']=$_POST['adminpwd'];

	if(isset($_SESSION['adminpwd']) || isset($_POST['adminpwd']))
	{
		$_SESSION['name']=$_POST['admin'];
                echo "<b>Admin: ".$name."</b>";
                $query="select * from admin where AdminName='$_SESSION[name]' AND password='$_SESSION[adminpwd]'";
                $result=mysql_query($query,$con);
                $count=mysql_num_rows($result);
                if($count==1)
                {

                        include('addproducts.php');
                        echo "<p><b>Know the transactions done by a costumer</b></p>
                                <form action='past.php' method='GET'>
                                        <input type=text name='CostumerID' placeholder='Enter Costumer ID'/>
                                        <input type=submit value='submit'/>
                                </form>";
                }
                else
                {
                        echo "<h3>Wrong password</h3>";
                	session_destroy();
		}

	}
	else
	{

		 echo "<form action='admin.php' method='POST'>
                        Admin Name:<select name='admin'>";
                $query1="select AdminName from admin";
                $result1=mysql_query($query1) OR die(mysql_error());
                $row=mysql_fetch_array($result1);
                $i=mysql_num_rows($result1);
                while($i--) echo"<option value='$row[AdminName]'>$row[AdminName]</option>";
                echo "<input type=password name='adminpwd' placeholder='Password'/>
                      <input type=submit value='Login'/>
                      </form>";
	}
mysql_close($con);
?>
<a href="logout.php">Logout</a>
</body>
</html>
