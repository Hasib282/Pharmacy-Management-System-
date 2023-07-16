<?php 
	session_start();
	if(isset($_SESSION['admin']))
	{
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doctors List</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		body{

		}
        table, th, td, tr{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        

    </style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>
	<?php  
	require_once '../controller/adminInfo.php';

	$doctors = fetchDoctor();

	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="9"><h1 align="center">Doctors List</h1></td>
							</tr>
					        <tr>  
					            <th>DoctorId </th> 
					            <th>DoctorName</th> 
					            <th>Designition</th> 
					            <th>Catagory</th> 
					            <th>Chember</th>  
					            <th>Schedule</th>          
					            <th>Image</th>          
					            <th>Edit</th>          
					            <th>Delete</th>          
					        </tr>  
					        <?php foreach ($doctors as $i => $doctor): ?>
								<tr>
									<td><?php echo $doctor['DoctorId'] ?></td>
									<td><?php echo $doctor['DoctorName'] ?></td>
									<td><?php echo $doctor['Designition'] ?></td>
									<td><?php echo $doctor['Catagory'] ?></td>
									<td><?php echo $doctor['Chember'] ?></td>
									<td><?php echo $doctor['Schedule'] ?></td>
									<td><img width="80px" src="images/<?php echo $doctor['Image'] ?>" alt="<?php echo $doctor['DoctorName'] ?>"></td>
									<td><a href="editDoctor.php?id=<?php echo $doctor['DoctorId'] ?>">Edit</a></td>
									<td><a href="../controller/deleteDoctor.php?id=<?php echo $doctor['DoctorId'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="11" align="center" style="padding: 20px;"><a href="addDoctor.php" style="font-size: 30px; padding: 5px; background-color: #99cc33;">Add Doctor</a></td>
							</tr>
					    </table> 
					    
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<br><br>
	<?php include "include/footer.php"; ?>
	
	
</body>
</html>




<?php
	}
	else{
		echo "Invalid request";
	}
?>
