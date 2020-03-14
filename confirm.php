<?php
	session_start();
	
	$_SESSION["mobile"]=$_POST["mobile"];
	$_SESSION["address"]=$_POST["address"];
	
?>
<?php
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>

<?php 
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

	$sql = "INSERT INTO users (name, email, gender,password,mobile,address,picture)
	VALUES ('".$_SESSION["name"]."', '".$_SESSION["email"]."', '".$_SESSION["gender"]."', '".$_SESSION["pass"]."', '".$_SESSION["mobile"]."', '".$_SESSION["address"]."','".$target_file."')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
<?php 
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

	$sql = "SELECT id, name, email, gender, password, mobile, address, picture FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		?>
		<table>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Password</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>Picture</th>
			</tr>
		<?php
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["gender"]."</td>";
			echo "<td>".$row["password"]."</td>";
			echo "<td>".$row["mobile"]."</td>";
			echo "<td>".$row["address"]."</td>";
			
			?>
			<td><img src="<?php echo $row["picture"]; ?>" height="100px"/></td>
			<?php
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
?>
