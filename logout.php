<?php

//session_start();
session_destroy();
unset($_SESSION['email']);
//setcookie();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}
//echo "<a href='home.php'>FLIPKART</a><br/>";
echo "You are logged out";
header("Refresh:3;url='home.php'");
?>
