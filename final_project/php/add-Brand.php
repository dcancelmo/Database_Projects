<!DOCTYPE html>
<html>
    <head>
        <title>Brand Table</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Insertion of Brand</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../brand_form.html')">Go back</button>
            <?php require_once('./db_connect.php');
                $sql = "USE dcancelm_1;";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error using  database: " . $conn->error;
                }

                $bname = Trim(stripslashes($_POST['brand']));
                $foundDate = Trim(stripslashes($_POST['foundDate']));
                $foundLoc = Trim(stripslashes($_POST['foundLoc']));

                $sql = "INSERT INTO Brand VALUES ('$bname', '$foundDate', '$foundLoc');";
                //echo $sql;

                $result = $conn->query($sql);
                if($result === TRUE) {
            ?>
            <h2>New Brand Added!</h2>
            <table>
                <tr>
                    <th>Brand Name (bname)</th>
                    <th>Founded Date (foundDate)</th>
                    <th>Founded Location (foundLoc)</th>
                    
                </tr>
                    <tr>
                        <td><?php echo $bname; ?></td>
                        <td><?php echo $foundDate; ?></td>
                        <td><?php echo $foundLoc; ?></td>
                       
                    </tr>
            </table>
            <?php 
                } else {
                        echo "<p>Unable to insert the specified brand</p>";
                    }
                    $conn->close();
            ?>
        </div><!-- container -->
    </body>
</html>