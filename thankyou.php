<html>
    <body>
        <a href="home.php"><h1>FLIPKART</h1></a>
        <?php
        echo $_POST['pwd'];
        include('sqlcon.php');

        $query1 = "select * from costumers where email='$_POST[email]'";
        $result1 = mysql_query($query1);
        if (mysql_num_rows($result1) >= 1) {
            echo "<b>Email already used! Please use another...</b>
			<br/>
			<a href='register.php'>Back</a>";
            header("Refresh: 5;url='register.php'");
        } else if ($_POST['pwd'] == '' || $_POST['pwd'] == NULL) {
            echo "<b>Password field can not be left blank</b>
			<br/>
			<a href='register.php'>Back</a>";
            header("Refresh: 5;url='register.php'");
        } else {
            $pwd = $_POST['pwd'];
            $query2 = "insert into costumers (Firstname, Lastname, email, password) values('$_POST[fname]','$_POST[lname]','$_POST[email]', '$pwd')";
            echo $query2;
            $result2 = mysql_query($query2);
            if ($result2)
                echo "<b>Thanks " . $_POST['fname'] . " " . $_POST['lname'] . " for registering</b>";
            else
                die(mysql_error());
            header("Refresh: 5;url='home.php'");
        }
        header("Refresh: 5;url='home.php'");
        mysql_close($con);
        ?>
    </body>
</html>
