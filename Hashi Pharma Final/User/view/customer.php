<?php 
	session_start();
	if(isset($_SESSION['customer']))
	{
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		body{

		}
        table{
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }
        .product{
        	height: 280px;
        	width: 200px;
        	float: left;
        	margin: 10px;
        	background-color: #708078;
        	padding: 0;
        }
        button{
        	margin-left: 40px;
        	margin-top: 5px;
        	padding: 5px;
        	background-color: #99cc33;
        	border: none;
        }
        

    </style>
</head>
<body>
	<?php require "include/customerhead.php"; ?>
	<?php  
	require_once '../controller/customerInfo.php';

	$products = fetchProduct();

	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						
					          
					        <?php foreach ($products as $i => $product): ?>
					        	<div class="product">
					        		<table>
						        		<tr>
											<td>
												<img width="150px" src="images/<?php echo $product['Image'] ?>" alt="<?php echo $product['Product_Name'] ?>"><br>
												Name: <?php echo $product['Product_Name'] ?><br>
												Catagory:<?php echo $product['Category_Id'] ?><br><br>
												Price: <?php echo $product['Product_Price'] ?>Taka <br>
												<a href=""><button>Add To Cart</button></a>
											</td>
										</tr>
					        	</table>
					        	</div>
					        	
								
							<?php endforeach; ?>
					     
					    
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

