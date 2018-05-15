<!DOCTYPE html>
<html>
	<head>
		<title>Customer Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
		<div class="container-lg px-3 my-5 markdown-body">
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}
				// echo $userid;
				$sql = "SELECT * FROM Customer;";
				$cursor = $conn->query($sql);
				if($cursor->num_rows != 0) {
			?>
			<h1>All Customers</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../index.html')">Go back</button>
			<table>
				<tr>
					<th>Name (name)</th>
					<th>Phone Number (phone)</th>
					<th>Email Address (email)</th>
					<th>Physical Address (address)</th>
				</tr>
			<?php
					while($row = $cursor->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['address'] ?></td>
				</tr>
			<?php
					}
				} else {
					echo "<p>The Customer table is empty.</p>";
				}
				$conn->close();
			?>
			</table>
		</div><!-- container -->
	</body>
</html>