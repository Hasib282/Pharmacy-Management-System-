<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<?php 

	$name=$email=$date=$month=$year=$gender=$degree=$blood=$degrees="";


	$error_name=$error_email=$error_gender=$error_degree=$error_blood=$error_date="";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = $_REQUEST["name"];
		$email =  $_REQUEST["email"];
		$date =  $_REQUEST["dd"];
		$month =  $_REQUEST["mm"];
		$year = $_REQUEST["yyyy"];
		$gender = $_REQUEST["gender"];
		$degree = (isset($_POST['degree'])) ? $_POST['degree'] : array();
		$blood = $_REQUEST["blood"];



		//Name validation
		if($name == null){ //null check
			$error_name = "*Name is required<br>";
			$name = "";
		}
		else if(strlen($name)<2){ //if less than two charecter
			$error_name = "*Name must contain two words<br>";
			$name = "";
		}
		else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$name)){
			$error_name = "*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter<br>";
			$name = "";
		}



		//email validation
		if($email == null){
			$error_email= "*Email is required<br>";
			$email = "";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  		$error_email = "Invalid email format";
	  		$email = "";
		}



		//date of birth
		if($date == null){
			$error_date= "*Date is required<br>";
			$date = "";
		}
		else if($month == null ){
			$error_date= "*Date is required<br>";
			$month = "";
		}
		else if($year == null){
			$error_date= "*Date is required<br>";
			$year = "";
		}
		else if(!checkdate($month,$date,$year)){
			$error_date= "*Date is invalid<br>";
			$date = $month = $year ="";
		}





		//gender validation
		if($gender == null){
			$error_gender = "Select your gender please";
			$gender = "";
		}




		//Degree validation
		if (count($degree) >= 2) {
		    foreach ($degree as $degrees) { 
		        echo $degrees ; 
		    } 
		} 
		else {
		    $error_degree = "select at least two degree";
		}



		//Blood validation
		if ($blood == null){
			$error_blood = "Select your Blood Group Please";
			$blood = "";
		}





	}
?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table>
			<!-- name part  -->
			<tr>
				<td>
					<label for="name">Name</label>
				</td>
				<td>
					<input type="text" name="name" id="name">
				</td>
				<td>
					<span class="error">* <?php echo  $error_name;?></span>
				</td>
			</tr>


			<!-- email part -->
			<tr>
				<td>
					<label for="email">Email</label>
				</td>
				<td>
					<input type="text" name="email" id="email">
				</td>
				<td>
					<span class="error">* <?php echo $error_email;?></span>
				</td>
			</tr>


			<!-- date of birth -->
			<tr>
				<td>
					<label for="DOB">Date of Birth</label>
				</td>
				<td>
					<input type="text" name="dd" id="dd" size="1" maxlength="2"> /
					<input type="text" name="mm" id="mm" size="1" maxlength="2"> /
					<input type="text" name="yyyy" id="yyyy" size="2" maxlength="4">(dd/mm/yyyy)
				</td>
				<td><span class="error">* <?php echo $error_date;?></span></td>
			</tr>



			<!-- gender part -->
			<tr>
				<td>
					Gender
				</td>
				<td>
					<input type="radio" name="gender" value="Male" id="male">
					<label for="male">Male</label>
					<input type="radio" name="gender" value="Female" id="female">
					<label for="female">Female</label>
					<input type="radio" name="gender" value="Others" id="others">
					<label for="others">Others</label>
				</td>
				<td>
					<span class="error">* <?php echo $error_gender;?></span>
				</td>
			</tr>

			<!-- degree part -->
			<tr>
				<td>Degree</td>
				<td>
					<input type="checkbox" name="degree[]" value="SSC" id="ssc">
					<label for="ssc">SSC</label>
					<input type="checkbox" name="degree[]" value="HSC" id="hsc">
					<label for="hsc">HSC</label>
					<input type="checkbox" name="degree[]" value="BSc" id="bsc">
					<label for="bsc">BSc</label>
					<input type="checkbox" name="degree[]" value="MSc" id="msc">
					<label for="msc">MSc</label>
				</td>
				<td>
					<span class="error">* <?php echo $error_degree;?></span>
				</td>
			</tr>



			<!-- blood group part -->
			<tr>
				<td>
					<label for="blood">Blood Group</label>
				</td>
				<td>
					<select name="blood" id="blood">
						<option value="">Select your blood group</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				</td>
				<td>
					<span class="error">* <?php echo $error_blood;?></span>
				</td>
			</tr>


			<tr>
				<td>
					<input type="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>






	<table>
		<tr>
			<td>
				<?php

				echo "Name: $name" ;
				echo "<br>";
				echo "Email: $email ";
				echo "<br>";

				echo "Date: $date/$month/$year";

				echo "<br>";
				echo "Gender: $gender" ;
				echo "<br>";
				echo "Degree: $degrees";
				echo "<br>";
				echo "Blood Group: $blood";
				echo "<br>";
				echo "<br>";



				?>
			</td>
		</tr>
	</table>
</body>
</html>