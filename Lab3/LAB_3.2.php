<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forget Password</title>
</head>
<body>


<?php

	$error_pass = $msg = "";
	$cpass=$npass=$cnpass="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$currpass = "abc@1234";
	$cpass = $_REQUEST['cpass'];
	$npass = $_REQUEST['npass'];
	$cnpass = $_REQUEST['cnpass'];


	if($cpass==null || $npass == null || $cnpass == null){
		$error_pass = "*Input Field can not be empty";
	}
	else if($cpass != $currpass){
		$error_pass = "*Current password is wrong";
	}
	else if($npass == $cpass){
		$error_pass = "*Newpass can not be same as old pass";
	}
	else if($npass != $cnpass){
		$error_pass = "*Newpass and Confirmpass doesn't match";
	}
	else{
		$msg = "Password Reset Successful";
	}





	}

?>


	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<fieldset style="width:500px;">
            <legend>Change Password</legend>
            <table>
            	<tr>
            		<td>
            			<label for="cpass">Current Password</label>
            		</td>
            		<td>
            			<input type="text" name="cpass" id="cpass">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<label for="npass">New Password</label>
            		</td>
            		<td>
            			<input type="text" name="npass" id="npass">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<label for="cnpass">New Password</label>
            		</td>
            		<td>
            			<input type="text" name="cnpass" id="cnpass">
            		</td>
            	</tr>
            	<tr>
            		<td colspan="2">
            			<span style="color:red;"><?php echo $error_pass ?></span>
            			<span style="color:green;"><?php echo $msg ?></span>
            		</td>
            	</tr>
            	
            	<tr>
            		<td colspan="2">
            			<br>
            			<input type="submit" name="submit" value="Submit">
            			<a href="login.php">Login</a>
            		</td>
            	</tr>
            </table>
        </fieldset>
</body>
</html>