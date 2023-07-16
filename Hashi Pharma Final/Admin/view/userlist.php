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
	<title>User List</title>
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

	$customers = fetchCustomer();

	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="11"><h1 align="center">User List</h1></td>
							</tr>
					        <tr>  
					            <th>ID</th> 
					            <th>User Name</th> 
					            <th>Name</th> 
					            <th>E-mail</th>  
					            <th>Phone</th> 
					            <th>Gender</th>   
					            <th>Address</th>      
					            <th>Profile</th>                  
					            <th>Edit</th>          
					            <th>Delete</th>          
					        </tr>  
					        <?php foreach ($customers as $i => $customer): ?>
								<tr>
									<td><?php echo $customer['ID'] ?></td>
									<td><?php echo $customer['Username'] ?></td>
									<td><?php echo $customer['Name'] ?></td>
									<td><?php echo $customer['Email'] ?></td>
									<td><?php echo $customer['Phone'] ?></td>
									<td><?php echo $customer['Gender'] ?></td>
									<td><?php echo $customer['Address'] ?></td>
									<td><img width="80px" src="images/<?php echo $customer['ProfilePic'] ?>" alt="<?php echo $customer['Name'] ?>"></td>
									<td><a href="editUser.php?id=<?php echo $customer['ID'] ?>">Edit</a></td>
									<td><a href="../controller/deleteUser.php?id=<?php echo $customer['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="11" align="center" style="padding: 20px;"><a href="addUser.php" style="font-size: 30px; padding: 5px; background-color: #99cc33;">Add Users</a></td>
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
