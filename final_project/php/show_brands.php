<!DOCTYPE html>
<html>
	<head>
		<title>Brand Table</title>
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
				$sql = "SELECT * FROM Brand;";
				$cursor = $conn->query($sql);
				if($cursor->num_rows != 0) {
			?>
			<h1>All Brands</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../index.html')">Go back</button>
			<table>
				<tr>
					<th>Brand Name (bname)</th>
					<th>Brand Founding Date (foundDate)</th>
					<th>Brand Founding Location (foundLoc)</th>
				</tr>
			<?php
					while($row = $cursor->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['bname'] ?></td>
					<td><?php echo $row['foundDate'] ?></td>
					<td><?php echo $row['foundLoc'] ?></td>
				</tr>
			<?php
					}
				} else {
					echo "<p>The Brand table is empty.</p>";
				}
				$conn->close();
			?>
			</table>
		</div><!-- container -->
	</body>
</html>