<!DOCTYPE html>
<html>
    <head>
        <title>Brand Table</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Search Results</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../transaction_search.html')">Go back</button>
            <?php require_once('./db_connect.php');
                $sql = "USE dcancelm_1;";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error using  database: " . $conn->error;
                }

                $where_state = '';

                $pID = Trim(stripslashes($_POST['pID']));
                if ($pID !== '') {
                    $where_state .= 'pID = "' . $pID . '"';
                }
                $timestamp = Trim(stripslashes($_POST['timestamp']));
                if ($timestamp != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'timeStamp LIKE "%' . $timestamp . '%"';
                }
                $url = Trim(stripslashes($_POST['url']));
                if ($url != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'url LIKE "%' . $url . '%"';
                }
                $phone = Trim(stripslashes($_POST['phone']));
                if ($phone != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'phone = "' . $phone . '"';
                }
                $price = Trim(stripslashes($_POST['price']));
                if ($price != '') {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    //If the user enters a whole number it adds on the decimal
                    if (!strpos($price, ".")){
                        $where_state .= 'price = "' . $price . '.00"';
                    } else {
                        $where_state .= 'price = "' . $price . '"';
                    }
                }
                $isSale = $_POST['isSale'];
                if (isset($isSale)) {
                    if ($where_state !== '') {
                        $where_state .= " AND ";
                    }
                    $where_state .= 'isSale = "' . $isSale . '"';
                }

                $sql = 'SELECT * FROM Transaction WHERE ' . $where_state . ';';
                //echo $sql;

                $cursor = $conn->query($sql);
                if($cursor->num_rows != 0) {
            ?>
            <table>
                <tr>
                    <th>Product ID (pID)</th>
                    <th>Phone Number (phone)</th>
                    <th>Timestamp (timeStamp)</th>
                    <th>Price (price)</th>
                    <th>Is it on sale?</th>
                    <th>Website (url)</th>
                </tr>
                <?php
                    while($row = $cursor->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['pID'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['timeStamp'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['isSale'] ?></td>
                        <td><?php echo $row['url'] ?></td>
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