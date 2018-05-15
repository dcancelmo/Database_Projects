<!DOCTYPE html>
<html>
    <head>
        <title>Brand Table</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Search Results</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../brand_search.html')">Go back</button>
            <?php require_once('./db_connect.php');
            $sql = "USE dcancelm_1;";
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error using  database: " . $conn->error;
            }

            $where_state = '';

            $brand = Trim(stripslashes($_POST['brand']));
            if ($brand !== '') {
                $where_state .= 'bname LIKE "%' . $brand . '%"';
            }
            $date = Trim(stripslashes($_POST['foundDate']));
            if ($date != '') {
                if ($where_state !== '') {
                    $where_state .= " AND ";
                }
                $where_state .= 'foundDate = "' . $date . '"';
            }
            $loc = Trim(stripslashes($_POST['foundLoc']));
            if ($loc != '') {
                if ($where_state !== '') {
                    $where_state .= " AND ";
                }
                $where_state .= 'foundLoc LIKE "%' . $loc . '%"';
            }

            $sql = 'SELECT * FROM Brand WHERE ' . $where_state . ';';
            echo $sql;

            $cursor = $conn->query($sql);
            if($cursor->num_rows != 0) {
            ?>
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
                            echo "<p>There are no entries matching your request.</p>";
                        }
                        $conn->close();
                        ?>
            </table>
        </div><!-- container -->
    </body>
</html>