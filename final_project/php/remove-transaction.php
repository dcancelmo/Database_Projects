<!DOCTYPE html>
<html>
	<head>
		<title>Transaction Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
		<div class="container-lg px-3 my-5 markdown-body">
			<h1>Transaction Reversal</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../transaction_delete.html')">Go back</button>
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}

				$id = Trim(stripslashes($_POST['pID']));
				$phone = Trim(stripslashes($_POST['phone']));
				$timeStamp = Trim(stripslashes($_POST['timestamp']));

				$sql = "DELETE FROM Transaction WHERE pID='$id' AND phone='$phone' AND timeStamp='$timeStamp';";
				//echo $sql;

				$result = $conn->query($sql);
				if($result === TRUE) {
			?>
			<h2>Transaction successfully removed!</h2>
			<table>
				<tr>
					<th>Product ID (pID)</th>
					<th>Phone Number (phone)</th>
					<th>Time of Transaction (timeStamp)</th>
				</tr>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $phone; ?></td>
						<td><?php echo $timeStamp; ?></td>
					</tr>
			</table>
			<?php 
				} else {
						echo "<p>Unable to delete the specified transaction</p><p>Possible reasons include: Already deleted from/never inserted into the database</p>";
					}
					$conn->close();
			?>
		</div><!-- container -->
	</body>
</html>