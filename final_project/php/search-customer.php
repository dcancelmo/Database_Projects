<!DOCTYPE html>
<html>
    <head>
        <title>Customer Table</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Search Results</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../customer_search.html')">Go back</button>
            <?php require_once('./db_connect.php');
                $sql = "USE dcancelm_1;";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error using  database: " . $conn->error;
                }

                $where_state = '';

                $name = Trim(stripslashes($_POST['name']));
                if ($name !== '') {
                    $where_state .= 'name LIKE "%' . $name . '%"';
                }
                $email = Trim(stripslashes($_POST['email']));
                if ($email != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'email LIKE "%' . $email . '%"';
                }
                $phone = Trim(stripslashes($_POST['phone']));
                if ($phone != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'phone = "' . $phone . '"';
                }
                $address = Trim(stripslashes($_POST['address']));
                if ($address != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'address LIKE "%' . $address . '%"';
                }

                $sql = 'SELECT * FROM Customer WHERE ' . $where_state . ';';
                //echo $sql;

                $cursor = $conn->query($sql);
                if($cursor->num_rows != 0) {
            ?>
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
                            echo "<p>There are no entries matching your request.</p>";
                        }
                        $conn->close();
                    ?>
            </table>
        </div><!-- container -->
    </body>
</html>