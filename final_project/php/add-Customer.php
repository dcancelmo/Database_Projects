<!DOCTYPE html>
<html>
	<head>
		<title>Customer Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
		<div class="container-lg px-3 my-5 markdown-body">
			<h1>Insertion of Customer</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../customer_form.html')">Go back</button>
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}

				$name = Trim(stripslashes($_POST['name']));
				$email = Trim(stripslashes($_POST['email']));
				$address = Trim(stripslashes($_POST['address']));
				$phone = Trim(stripslashes($_POST['phone']));

				$sql = "INSERT INTO Customer VALUES ('$phone', '$email','$address', '$name');";
				//echo $sql;

				$result = $conn->query($sql);
				if($result === TRUE) {
			?>
			<h2>New Customer Added!</h2>
			<table>
				<tr>
					<th>Customer Name (name)</th>
					<th>Email Address (email)</th>
					<th>Home Address (address)</th>
					<th>Phone Number (phone)</th>
					
				</tr>
					<tr>
						<td><?php echo $name; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $address; ?></td>
						<td><?php echo $phone; ?></td>
					   
					</tr>
			</table>
			<?php 
				} else {
						echo "<p>Unable to insert the specified customer</p>";
					}
					$conn->close();
			?>
		</div><!-- container -->
	</body>
</html>