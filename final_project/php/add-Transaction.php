<!DOCTYPE html>
<html>
	<head>
		<title>Transaction Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
		<div class="container-lg px-3 my-5 markdown-body">
			<h1>Insertion of Transaction</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../transaction_form.html')">Go back</button>
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}

				$id = Trim(stripslashes($_POST['pID']));
				$phone = Trim(stripslashes($_POST['phone']));
				$price = Trim(stripslashes($_POST['price']));
				//If the user enters a whole number it adds on the decimal
				if (!strpos($price, ".")){
					$where_state .= 'price = "' . $price . '.00"';
				} else {
					$where_state .= 'price = "' . $price . '"';
				}
				$url = Trim(stripslashes($_POST['url']));
				$isSaleCheck = $_POST['isSale'];
				$isSale = 0;
				if (isset($isSaleCheck)) {
					$isSale = 1;
				}
				$timeStamp = date('Y-m-d H:i:s');

				$sql = "INSERT INTO Transaction VALUES ('$id', '$isSale', '$phone', '$timeStamp', '$price',  '$url');";
				 echo $sql;

				$result = $conn->query($sql);
				if($result === TRUE) {
			?>
			<h2>New Transaction Added!</h2>
			<table>
				<tr>
					<th>Product ID (pID)</th>
					<th>Phone Number (phone)</th>
					<th>Price (price)</th>
					<th>URL (url)</th>
					<th>Is Sale (isSale)</th>
					<th>Time of Transaction (timeStamp)</th>
				</tr>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $phone; ?></td>
						<td><?php echo $price; ?></td>
						<td><?php echo $url; ?></td>
						<td><?php echo $isSale; ?></td>
						<td><?php echo $timeStamp; ?></td>
					</tr>
			</table>
			<?php 
				} else {
						echo "<p>Unable to insert the specified transaction</p><p>Possible reasons include: Product ID or phone number that does not exist in the database</p>";
					}
					$conn->close();
			?>
		</div><!-- container -->
	</body>
</html>