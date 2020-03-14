<?php 

	$id=$_GET["id"];
	$name=$_GET["name"];
	$description=$_GET["description"];
	$quantity=$_GET["quantity"];
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
</head>
<body>
	
	<form method="post">
		<table>
			<tr>
				<td><b>Product Name :</b></td>
				<td><input type="text" name="pname" value="<?php echo $name; ?>"/></td>
				
			</tr>
			<tr>
				<td><b>Description :</b></td>
				<td><input type="text" name="description" value="<?php echo $description; ?>"/></td>
				
			</tr>
			
			<tr>
				<td><b>Quantity :</b></td>
				<td><input type="number" name="quantity" value="<?php echo $quantity; ?>"/></td>
				
			</tr>
			
			
			
			
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>
		
		
		
		
		
		
		
		
		
		
		
		
	</form>
	<br><br>
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if($_POST["pname"]!="" && $_POST["description"]!="" && $_POST["quantity"]!="")
			{
				
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "UserDB";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$sql="UPDATE products SET product_name='".$_POST["pname"]."',description='".$_POST["description"]."',quantity= '".$_POST["quantity"]."' WHERE id='".$id."'";
					//$sql = "INSERT INTO products (product_name, description, quantity)
					//VALUES ('".$_POST["pname"]."', '".$_POST["description"]."', '".$_POST["quantity"]."')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
			}
			header("Location:showproducts.php");	
		}
		
		
	?>
	
	
	
	
</body>
</html>