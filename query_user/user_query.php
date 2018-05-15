<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_POST['userid']; ?>—Search</title>
		<meta name="author" content="Daniel Cancelmo; dcancelm">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<div id="container">
			<h1>Search results for: 
			<?php
				$userid = $_POST['userid'];
				echo $userid;
			?></h1>
			<a href="q8.html">Go back to search.</a>
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}
				// echo $userid;
				$sql = "SELECT * FROM User WHERE userID = '$userid';";
				$cursor = $conn->query($sql);
				if($cursor->num_rows != 0) {
			?>
			<table>
				<tr>
					<th>User ID</th>
					<th>Rating</th>
					<th>Location</th>
					<th>Country</th>
				</tr>
			<?php
					while($row = $cursor->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['userID'] ?></td>
					<td><?php echo $row['rating'] ?></td>
					<td><?php echo $row['location'] ?></td>
					<td><?php echo $row['country'] ?></td>
				</tr>
			<?php
					}
				} else {
					echo "<p>User '$userid' was not found.</p>";
				}
				$conn->close();
			?>
			</table>
		</div><!-- container -->
	</body>
</html>