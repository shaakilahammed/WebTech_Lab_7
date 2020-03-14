<?php
	session_start();
	
	$_SESSION["name"]=$_POST["name"];
	$_SESSION["email"]=$_POST["email"];
	$_SESSION["gender"]=$_POST["gender"];
	$_SESSION["pass"]=$_POST["pass"];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>LabTask-6</title>
</head>
<body>
	
	<form method="post" action="confirm.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td><b>Mobile Number :</b></td>
				<td><input type="text" name="mobile"/></td>
				
			</tr>
			<tr>
				<td><b>Address :</b></td>
				<td><input type="text" name="address"/></td>
				
			</tr>
			<tr>
				<td><b>Picture :</b></td>
				<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
				
			</tr>
			

			
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>
		
		
		
		
		
		
		
		
		
		
		
		
	</form>
	
	
</body>
</html>