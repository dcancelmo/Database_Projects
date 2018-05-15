<!DOCTYPE html>
<html>
    <head>
        <title>Shoe Table</title>
        <?php include 'header.php';?>
    </head>
    <body>
        <div class="container-lg px-3 my-5 markdown-body">
            <h1>Insertion of Shoe</h1>
            <button class="btn btn-sm btn-info" id="return" onclick="window.location.replace('../shoe_form.html')">Go back</button>
            <?php require_once('./db_connect.php');
                $sql = "USE dcancelm_1;";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error using  database: " . $conn->error;
                }

                $id = Trim(stripslashes($_POST['pID']));
                $name = Trim(stripslashes($_POST['name']));
                $brand = Trim(stripslashes($_POST['brand']));
                $category = $_POST['category'];

                $sql = "INSERT INTO Shoe VALUES ('$id', '$brand', '$name', '$category');";
                //echo $sql;

                $result = $conn->query($sql);
                if($result === TRUE) {
            ?>
            <h2>New shoe added!</h2>
            <table>
                <tr>
                    <th>Product ID (pID)</th>
                    <th>Brand Name (bname)</th>
                    <th>Product Name (name)</th>
                    <th>Category (category)</th>
                </tr>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $brand; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $category; ?></td>
                    </tr>
            </table>
<!--            START COLOR-->
            <table>
                <tr>
                    <th>Product ID (pID)</th>
                    <th>Color (color)</th>
                </tr>

            <?php
                    $black = $_POST['black'];
                    if (isset($black)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Black');";
                        $result = $conn->query($sql);
                        echo "<tr><td><?php echo $id ?></td><td>Black</td></tr>";
                    }
                    $brown = $_POST['brown'];
                    if (isset($brown)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Brown');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>Brown</td></tr>";
                    }
                    $red = $_POST['red'];
                    if (isset($red)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Red');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>Red</td></tr>";
                    }
                    $beige = $_POST['beige'];
                    if (isset($beige)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Beige');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>Beige</td></tr>";
                    }
                    $grey = $_POST['grey'];
                    if (isset($grey)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Grey');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>grey</td></tr>";
                    }
                    $blue = $_POST['blue'];
                    if (isset($blue)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Blue');";
                        $result = $conn->query($sql);
                        echo "<tr><td>echo $id</td><td>Blue</td></tr>";
                    }
                    $pink = $_POST['pink'];
                    if (isset($pink)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'Pink');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>Pink</td></tr>";
                    }
                    $white = $_POST['white'];
                    if (isset($white)) {
                        $sql = "INSERT INTO Color VALUES ('$id', 'White');";
                        $result = $conn->query($sql);
                        echo "<tr><td>$id</td><td>White</td></tr>";
                    }
                    echo "</table>";
                    //END COLOR
                } else {
                    echo "<p>Unable to insert the specified shoe</p><p>Possible reasons include: Brand name that does not exist in the database.";
                }
                $conn->close();
            ?>
        </div><!-- container -->
    </body>
</html>