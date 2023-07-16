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
	<title>Product List</title>
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

	$products = fetchProduct();

	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="10"><h1 align="center">Product List</h1></td>
							</tr>
					        <tr>  
					            <th>Product Id</th> 
					            <th>Product Name</th> 
					            <th>Price</th> 
					            <th>Catagory</th>  
					            <th>Manufacturer</th> 
					            <th>Stock</th>       
					            <th>Image</th>                    
					            <th>Edit</th>          
					            <th>Delete</th>          
					        </tr>  
					        <?php foreach ($products as $i => $product): ?>
								<tr>
									<td><?php echo $product['Product_Id'] ?></td>
									<td><?php echo $product['Product_Name'] ?></td>
									<td><?php echo $product['Product_Price'] ?></td>
									<td><?php echo $product['Category_Id'] ?></td>
									<td><?php echo $product['Manufacturer_Id'] ?></td>
									<td><?php echo $product['Stock'] ?></td>
									<td><img width="80px" src="images/<?php echo $product['Image'] ?>" alt="<?php echo $product['Product_Name'] ?>"></td>
									<td><a href="editProduct.php?id=<?php echo $product['Product_Id'] ?>">Edit</a></td>
									<td><a href="../controller/deleteProduct.php?id=<?php echo $product['Product_Id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="11" align="center" style="padding: 20px;"><a href="addProduct.php" style="font-size: 30px; padding: 5px; background-color: #99cc33;">Add Product</a></td>
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
