<html>
    <title>Home</title>
    <body>
        <a href="home.php"><h1>FLIPKART</h1></a>

        <iframe src="https://www.facebook.com/plugins/like.php?href=192.168.2.12/flipkart/home.php"
                scrolling="no" frameborder="0"
                style="border:none; width:450px; height:80px"></iframe>

        <!--Login Form -->
        <?php
        session_start();
        if (!isset($_SESSION['email'])) {
            echo "<form action='login.php' method='POST'>
			<label for='email'>Email:</label><input type='text' name='email' placeholder='Enter email'/>
			<label for='pwd'>Password:</label><input type='password' name='pwd' placeholder='Enter password'/>
			<input type='submit' value='Login'/>
		      </form>
		      <p>Don't have an account? <a href='register.php'>register</a></p>
			<a href=forgot.php>Forgot Password?</a>";
        } else {
            echo $_SESSION['email'];
            echo "<br/>Hello " . $_SESSION['name'];
            echo "<a href='logout.php'> Logout</a>";
        }
        ?>

        <!--Search form-->
        <form action ="home.php" method="GET">
            <input type="text" placeholder="search for items" name="search"/>
    <!--	<select name="price">
                    <option value="1000000">All</option>
                    <option value="50000"><50,000</option>
                    <option value="100000">50,000-100,000</option>
            </select> -->
            Search by category: <select name="category">
                <option value=''>All</option>
                <option value="Books">Books</option>
                <option value="Computer and Laptops">Computers and Laptops</option>
                <option value="Cellphones and tablets">Cellphones and tablets</option>
                <option value="Computer Accessories">Computer Accessories</option>
                <option value="Mobile Accessopries">Mobile Accessopries</option>
                <select>
                    <input type="submit" value="search"/>
                    </form>

<?php
include('sqlcon.php');

/* SEARCH ENGINE */
$item = '%' . $_GET[search] . '%';
/* echo $item;
  $loprice=$_GET['price']-50000;
  $hiprice=$_GET['price']; */
$category = $_GET['category'];
//echo $category;

if (!isset($_GET['search']) || ($_GET['search'] == '' && $_GET['category'] == ''))
    $query = "select ID_pk, ProductName, price,OfferPrice, category from products";
else if (($item) && ($category))
    $query = "select ID_pk, ProductName, price, OfferPrice,category from products where ProductName like '$item' AND category='$category'";
else if (!$category)
    $query = "select ID_pk, ProductName, price, OfferPrice,category from products where ProductName like '$item'";

$result = mysql_query($query);
if (!$result)
    die(mysql_error());
//else "Query unsuccessful";
$i = 0;
//$file=fopen("cart.txt","a") OR exit("Unable to open file");

session_start();
echo "<table border=1px width=100%>";

/* Display items on home page */

while ($row = mysql_fetch_array($result)) {
    $pid[$i] = $row['ID_pk'];
    //echo $i;
    if (($i % 5) == 0)
        echo "<tr>";
    //echo "<td><input type='checkbox' name='$pid' value=$pid/>";
    echo "<td><h3>" . $row['ProductName'] . "</h3>";
    echo "<br/>";
    echo "<b>MRP: </b>Rs." . $row['price'];
    echo "<br/>";
    echo "<b>Offer Price: </b>Rs." . $row['OfferPrice'];
    echo "<br/>";
    echo "<b>Category:</b>" . $row['category'];
    //echo "<a href='>Add to cart</a>
    if (isset($_SESSION['email'])) {
        echo "<br/><form action ='cart.php' method='GET'>";
        echo "<br/><input type='hidden' value=$pid[$i] name='cart'/>";
        //<input type='hidden' value=$row[ProductName] name='cart'/>";
        echo "<input type='submit' value='Add to Cart'/></td>";
        echo "</form>";
    }
    if (($i % 5) == 4)
        echo "</tr>";
    $i++;
}
echo "</table>";

/* Cart */
if (!isset($_SESSION['j'])) {
    $_SESSION['j'] = 0;
}
if (isset($_SESSION['email'])) {
    echo "Cart[" . $_SESSION['j'] . "]
			<a href='viewcart.php'>View Cart</a><br/>
			<a href='order.php'>place order</a><br/>";
} else {
    echo "Not logged in to shop";
}

//$_SESSION['pid'][$_SESSION['j']-1];
//echo "PID".$_SESSION['pid'][$_SESSION['j']-1];
//$_SESSION['cart'][]
//fclose($file);

mysql_close($con);
?>
                    <a href="admin.php">Admin Login</a>
                    </body>
                    </html>
