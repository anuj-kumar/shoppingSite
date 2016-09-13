<html>
    <script type="text/javascript">
        function validation(register)
        {
            with (register)
            {
                /*if(fname.value ==NULL || fname.value='')
                 {
                 alert("Please fill up all the fields!");
                 return false;
                 }*/
                else if (pwd.value == pwd2.value)
                {
                    alert("Entered passwords did not match!");
                    return false;
                }
            }
            return true;
        }
    </script>

    <body>
    <legend>Register</legend>
    <form action="thankyou.php" method="POST" onsubmit="return validation(this)">
        <label for="fname">Firstname:</label><input type="text" name="fname"/><br/>
        <br/>
        <label for="lname">Lastname:</label><input type="text" name="lname"/><br/>
        <br/>
        <label for="email">Email:</label><input type="text" name="email"/><br/>
        <br/>
        <label for="pwd">Password:</label><input type="password" name="pwd"/><br/>
        <br/>
        <label for="pwd2">Enter password again:</label><input type="password" name="pwd2"/><br/>
        <br/>
        <input type="submit" value="Register"/>
    </form>
</body>
</html>
