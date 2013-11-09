<html>
<body>
	<legend><b>Add products to the database</b></legend>
	<table>
	<form action="products.php" method="POST" onsubmit="return validation(this)">
		<td><label for="pname">Product name:</label></td><td><input type="text" name="pname"/></td></tr>
		<td><label for="price:">Price:</label></td><td><input type="text" name="price"/></td></tr>
		<tr><td><label for="offerprice">Offer Price</label></td><td><input type="text" name="offerprice"/></td></tr>
		<tr><td><label for="category">Category:</label></td>
		<td><select name="category">
			<option value="Books">Books</option>
			<option value="Computer and Laptops">Computers and Laptops</option>
			<option value="Cellphones and tablets">Cellphones and tablets</option>
			<option value="Computer Accessories">Computer Accessories</option>
			<option value="Mobile Accessories">Mobile Accessories</option>
		</select></td></tr>
		<tr><td></td><td><input type="submit" value="Submit"/></td></tr>
	</form>
	</table>
	</body>
</html>

