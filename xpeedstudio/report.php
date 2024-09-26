<?php 
	include 'db_connection.php';
	//include 'form_validator.php';
	
	$obj = new Database();
	$conn = $obj->connect();

 // ------------------------ Search Start Here ----------------//
	if(isset($_POST['search'])) {
		$id = $_POST['userid'];
		// Prepare the output
		$result = $obj->select('customer',"id=$id");
		if ( $result->num_rows > 0) {
			while($rows = $result->fetch_assoc()) {
				$msg="";
				$msg=$msg."<span class='nem'>Id: </span>" . $rows['id'] . "  - &nbsp&nbsp&nbsp <span class='nem'>BuyerName: </span>" . $rows['buyer'] . "  - &nbsp&nbsp&nbsp <span class='nem'> Email: </span>" . $rows['buyer_email'] ."  - &nbsp&nbsp&nbsp <span class='nem'> Mobile:</span> " . $rows['phone'] ."<br>"." <span class='nem'>City: </span>" . $rows['city'] . "  - &nbsp&nbsp&nbsp <span class='nem'> Amount: </span>" . $rows['amount'] ."  - &nbsp&nbsp&nbsp <span class='nem'> Items:</span> " . $rows['items'] ."<br>"."<span class='nem'>Buyer Ip: </span>" . $rows['buyer_ip'] . "  - &nbsp&nbsp&nbsp <span class='nem'> Receipt Id: </span>" . $rows['receipt_id'] ."  - &nbsp&nbsp&nbsp <span class='nem'> Entry at:</span> " . $rows['entry_at'] ."<br>"."<span class='nem'>Entry by: </span>" . $rows['entry_by'] . "  - &nbsp&nbsp&nbsp <span class='nem'> Note: </span>" .$rows['note']."<br>";
				$_SESSION['search'] = 'found';
			}

		} else {
			$msg= "nofound data";
			//echo $msg;
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
	<div class="main">
		<div class="top">
			<div class="home">
				<a href="index.php" > Home </a>
			</div>
			<div >
				<form action="" method="post">	
					<input type="number" class="search" name="userid" placeholder="search by user Id">
					
					<button type="submit" class="search-btn" name="search"><i class="fa fa-search" style="font-size:30px;color:blue;"></i></button>
				</form>
			</div>
		</div>	
		
		<div class="find">
		<?php
			if(isset($_POST['search'])){
				if(isset($_SESSION['search'])){
					echo"<h3 style='background-color:green;color:white;text-align:center;'>Founded Buyer is: </h3>";
					echo $msg;
					unset($_SESSION['search']);
				}
				else{
					echo"<h2 style='background-color:red;color:white;text-align:center;'>Not Found! </h3>";
				}
			}
		?>
		</div>
		
		<div class="data">
			<table style="width:100%;">
				<thead >
					<tr >
						<th>Id</th>
						<th>Buyer Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>City</th>
						<th>Amount</th>
						<th>Items</th>
						<th>Buyer Ip</th>
						<th>Receipt Id</th>
						<th>Entry At</th>
						<th>Entry By</th>
						<th>Note</th>
					</tr>
				</thead>
				
				<tbody>
		
					<?php

						
						$result = $obj->select("customer");

						// Display the records
						if ( $result->num_rows > 0) {
							while($rows = $result->fetch_assoc()) {
					?>
								<tr>

									<td><?php echo $rows['id']; ?> </td>
									<td><?php echo $rows['buyer']; ?> </td>
									<td> <?php echo $rows['buyer_email']; ?> </td>
									<td> <?php echo $rows['phone']; ?> </td>
									<td><?php echo $rows['city']; ?> </td>
									<td><?php echo $rows['amount']; ?> </td>
									<td> <?php echo $rows['items']; ?> </td>
									<td> <?php echo $rows['buyer_ip']; ?> </td>
									<td><?php echo $rows['receipt_id']; ?> </td>
									<td><?php echo $rows['entry_at']; ?> </td>
									<td> <?php echo $rows['entry_by']; ?> </td>
									<td> <?php echo $rows['note']; ?> </td>

								</tr>
						  <?php  
							}
						}else{
								echo "<div style='background-color:red;font-size: 20px;text-align:center;color:white;'><strong>No Record Found! <br> Please Add Buyer.</strong> </div>";
							}
					 ?>

				</tbody>
			</table>
		</div>
	</div>		
</body>
</html>