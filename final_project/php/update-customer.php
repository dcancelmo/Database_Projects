<!DOCTYPE html>
<html>
	<head>
		<title>Customer Table</title>
		<?php include 'header.php';?>
	</head>
	<body>
		<div class="container-lg px-3 my-5 markdown-body">
			<h1>Update Customer Info</h1>
			<button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../customer_update.html')">Go back</button>
			<?php require_once('./db_connect.php');
				$sql = "USE dcancelm_1;";
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error using  database: " . $conn->error;
				}

				$oldPhone = Trim(stripslashes($_POST['old-phone']));
				//Check first that the entry exists with the old phone
                $sql = "SELECT * FROM Customer WHERE phone='$oldPhone';";
//                echo $sql;
                $result = $conn->query($sql);
                if ($result->num_rows != 0) {
                	?>
            <h2>Customer info of user with old phone number <?php echo $oldPhone; ?></h2>
			<h3>New Info shown below</h3>
			<table>
				<tr>
					<th>Updated Info</th>
					<th>Successfully Changed?</th>
					<?php
                	$name = Trim(stripslashes($_POST['name']));
                	if ($name !== "") {
                		$sql = "UPDATE Customer SET name='$name' WHERE phone='$oldPhone';";
                		$result = $conn->query($sql);
                		if ($result === TRUE) {
                			echo "<tr><td>Name: $name</td><td>Yes.</td></tr>";
                		} else {
                			echo "<tr><td>Name: $name</td><td>No.</td></tr>";
                		}
//                        echo $sql;
                    }
					$email = Trim(stripslashes($_POST['email']));
					if ($email !== "") {
                		$sql = "UPDATE Customer SET email='$email' WHERE phone='$oldPhone';";
                		$result = $conn->query($sql);
                		if ($result === TRUE) {
                			echo "<tr><td>Email: $email</td><td>Yes.</td></tr>";
                		} else {
                			echo "<tr><td>Email: $email</td><td>No.</td></tr>";
                		}
//                        echo $sql;
                    }
					$address = Trim(stripslashes($_POST['address']));
					if ($address !== "") {
                		$sql = "UPDATE Customer SET address='$address' WHERE phone='$oldPhone';";
                		$result = $conn->query($sql);
                		if ($result === TRUE) {
                			echo "<tr><td>Address: $address</td><td>Yes.</td></tr>";
                		} else {
                			echo "<tr><td>Address: $address</td><td>No.</td></tr>";
                		}
//                        echo $sql;
                    }
					$phone = Trim(stripslashes($_POST['new-phone']));
					if ($phone !== "") {
                		$sql = "UPDATE Customer SET phone='$phone' WHERE phone='$oldPhone';";
                		$result = $conn->query($sql);
                		if ($result === TRUE) {
                			echo "<tr><td>New Phone: $phone</td><td>Yes.</td></tr>";
                		} else {
                			echo "<tr><td>New Phone: $phone</td><td>No. Note: $oldPhone is still the phone.</td></tr>";
                		}
//                        echo $sql;
                    }
                	echo "</table>";
                } else {
                	echo "<p>Unable to update the specified customer's information. Customer with that phone number does not exist.</p>";
				}
				$conn->close();
			?>

		</div><!-- container -->
	</body>
</html>