<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>

<?php

	$error_name=$error_pass="";
	
	$uname=$pass=$rme="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$uname = $_REQUEST['uname'];
		$pass = $_REQUEST['pass'];


		//Name validation
		if($uname == null){ //null check
			$error_name = "*Name is required<br>";
			$uname = "";
		}
		else if(strlen($uname)<2){ //if less than two charecter
			$error_name = "*Name must contain two words<br>";
			$uname = "";
		}
		else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$uname)){
			$error_name = "*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter<br>";
			$uname = "";
		}




		//password validation
		if($pass == null){
			$error_pass = "*Password is required";
			$pass = "";
		}
		else if(strlen($pass)<8){
			$error_pass = "*Password must not be less than eight (8) characters";
			$pass = "";
		}
		else if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#@$%]).{8,}$/", $pass)){
			$error_pass = "*Password must contain a uppercase, a lowercase, a digit and a special character(@#$%)";
			$pass = "";
		}


		if($error_name == null &&  $error_pass == null){
			if(isset($_REQUEST['rme']) == null){
	            setcookie("username", "");
	            setcookie("password", "");
	            header("location:welcome.php");
	        }
	        else{
	            setcookie("uname", $uname, time()+10);
	            setcookie("pass", $pass, time()+10);
	            setcookie("color", "skyblue", time()+10);
	            header("location:Lab_3.1.1.php");
	        }
		}

	}






?>















	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<fieldset style="width:500px;">
            <legend>Login</legend>
            <table>
            	<tr>
            		<td>
            			<label for="uname">User Name</label>
            		</td>
            		<td>
            			<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="text" name="uname" id="uname" value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>">
            		</td>
            		<td>
            			<span><?php echo $error_name ?></span>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<label for="pass">Password</label>
            		</td>
            		<td>
            			<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="text" name="pass" id="pass" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
            		</td>
            		<td>
            			<span><?php echo $error_pass ?></span>
            		</td>
            	</tr>
            	<tr>
            		<td colspan="3">
            			<hr>
            			<input type="checkbox" name="rme" id="rme" <?php if(isset($_COOKIE['uname'])) {echo "checked";} ?>>
            			<label for="rme">Remember me</label>
            		</td>
            	</tr>
            	<tr>
            		<td colspan="3">
            			<br>
            			<input type="submit" name="submit" value="Submit">
            			<a href="Lab_3.2.php">Forget Password?</a>
            		</td>
            	</tr>
            </table>
        </fieldset>
	</form>
</body>
</html>