<html>
    <head>
        <?php
        include('sqlcon.php');
        echo "$_POST[email]";
        $query = "select password from costumers where email='$_POST[email]'";
        $result = mysql_query($query, $con) or die(mysql_error());
        $count = mysql_num_rows($result) or die(mysql_error());
        if ($count == 1) {
            $row = mysql_fetch_array($result);
            $to = $_POST['email'];
            $sub = "Dummy Flipkart Password";
            $message = $row[password];
            //echo "$row[password]";
            if (mail($to, $sub, $message))
                echo "Your password is sent to your email";
            else
                echo "mail sending error";
        } else
            echo "The email is not recognized. Are you registered?";
        header("Refresh:2;url='home.php'");
        ?>
    </head>
    <

