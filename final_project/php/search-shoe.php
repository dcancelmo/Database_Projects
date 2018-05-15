<!DOCTYPE html>
<html>
	<head>
		<title>Shoe Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Search Results</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../shoe_search.html')">Go back</button>
            <?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}
				$where_state = '';
				 $id = Trim(stripslashes($_POST['pID']));
				 if ($id != '') {
				 	$where_state .= 'Shoe.pID = "' . $id . '"';
				 }
				 $name = Trim(stripslashes($_POST['name']));
				 if ($name != '') {
				 	 if ($where_state !== '') {
				 	 	$where_state .= " AND ";
				 	 }
				 	$where_state .= 'name LIKE "%' . $name . '%"';
				 }
				$brand = Trim(stripslashes($_POST['brand']));
				if ($brand != '') {
					 if ($where_state !== "") {
					 	$where_state .= " AND ";
					 }
					$where_state .= 'bname LIKE "%' . $brand. '%"';
				}
				 $category = $_POST['category'];
				 if (isset($category)) {
				 	if ($where_state !== '') {
				 		$where_state .= " AND ";
				 	}
				 	$where_state .= 'category = "' . $category . '"';
				 }
				 $color = $_POST['color'];
                if (isset($color)) {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'Color.color = "' . $color . '"';
                }

                $sql = 'SELECT * FROM Shoe, Color WHERE Shoe.pID = Color.pID AND ' . $where_state . ';';
                //echo $sql;

				$cursor = $conn->query($sql);
				if($cursor->num_rows != 0) {
			?>
			<table>
				<tr>
					<th>Product ID (pID)</th>
					<th>Brand Name (bname)</th>
					<th>Product Name (name)</th>
					<th>Category (category)</th>
                    <th>Color (color)</th>
                </tr>
			<?php
					while($row = $cursor->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['pID'] ?></td>
					<td><?php echo $row['bname'] ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['category'] ?></td>
                    <td><?php echo $row['color'] ?></td>
                </tr>
			<?php
					}
				} else {
					echo "<p>There are no entries matching your request.</p>";
				}
				$conn->close();
			?>
			</table>
		</div><!-- container -->
	</body>
</html>