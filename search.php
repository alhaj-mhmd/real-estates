 <?php $page_title = "Search";
    include_once 'header.php'; ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <?php session_start();
    include('nav.php');  ?>

 <div class="container">
     <div class="row">
         <div class="col-10 offset-1">
             <h2>Search for house</h2>
             <p>Please fill in info to search.</p>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                 <div class="form-group ">
                     <label>Area</label>
                     <input type="text" name="area" value="<?php echo isset($_POST["area"]) ? $_POST["area"] : ''; ?>" class="form-control">
                 </div>
                 <div class="form-group ">
                     <label>Rooms</label>
                     <input type="text" name="rooms" value="<?php echo isset($_POST["rooms"]) ? $_POST["rooms"] : ''; ?>" class="form-control">
                 </div>
                 <div class="form-group">
                     <label>Floor</label>
                     <input type="text" name="floor" value="<?php echo isset($_POST["floor"]) ? $_POST["floor"] : ''; ?>" class="form-control">
                 </div>
                 <div class="form-group ">
                     <label>Address</label>
                     <input type="tel" name="address" class="form-control" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>">
                 </div>
                 <div class="form-group ">
                     <label>Cladding Level</label>
                     <input type="tel" name="cladding_level" class="form-control" value="<?php echo isset($_POST["cladding_level"]) ? $_POST["cladding_level"] : ''; ?>">
                 </div>
                 <div class="form-group ">
                     <label>Price</label>
                     <input type="tel" name="price" class="form-control" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>">
                 </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="Search">
                 </div>
             </form>
         </div>
     </div>


     <?php
        include('config.php');
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 3;
        $offset = ($pageno - 1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM houses";
        $total_pages_result = $pdo->prepare($total_pages_sql);
        $total_pages_result->execute();
        $total_pages_total_rows =  $total_pages_result->fetchColumn();
        $total_pages = ceil($total_pages_total_rows / $no_of_records_per_page);
        // define the list of fields
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $area = $_GET['area'];
            $rooms = $_GET['rooms'];
            $floor = $_GET['floor'];
            $address = $_GET['address'];
            $cladding_level = $_GET['cladding_level'];
            $price = $_GET['price'];
            $fields = array('area', 'rooms', 'floor',   'cladding_level', 'price');
            $conditions = array();

            // loop through the defined fields
            foreach ($fields as $field) {
                // if the field is set and not empty
                if (isset($_GET[$field]) && $_GET[$field] != '') {
                    $conditions[] = "$field = $_GET[$field] ";
                }
            }

            if (count($conditions) > 0) {

                $sql = "SELECT * FROM houses WHERE sold=0 AND address LIKE '%$address%' AND " . implode(' AND ', $conditions) . " LIMIT  $offset, $no_of_records_per_page";
            
            if ($stmt = $pdo->prepare($sql)) {
                if ($stmt->execute()) {
                    if ($stmt->rowCount() > 0) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped text-center'>
                            <tr>
                            <th>id</th>
                            <th>Area</th>
                            <th>Rooms</th>
                            <th>Floor</th>
                            <th>Address</th>
                            <th>Cladding Level</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>Buy</th>
                            </tr>
                            ";

                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['area'] . "</td>";
                            echo "<td>" . $row['rooms'] . "</td>";
                            echo "<td>" . $row['floor'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['cladding_level'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo '<td>
                                    <form action="house.php" method="post">
                                        <input type="hidden" name="id" value="' . $row["id"] . '">
                                        <input type="submit" name="submit" value="Details">
                                    </form>
                                </td>';
                            echo '<td>
                                    <form action="buy-house.php" method="post">
                                        <input type="hidden" name="id" value="' . $row["id"] . '">
                                        <input type="submit" name="submit" value="Buy">
                                    </form>
                                </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                        // Free result set
                        unset($result);
                    } else {
                        echo "<p class='text-danger'> No records matching your query were found.</p>";
                    }
                }
            }
        }
            unset($stmt);
        }
        ?>

     <div class="row">
         <div class="col-8 offset-2">
             <ul class="pagination">
                 <li><a href="?fname=<?php echo $fname ?>&pageno=1">First</a></li>
                 <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                     <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?fname=" . $fname . "&pageno=" . ($pageno - 1);
                                } ?>">Prev</a>
                 </li>
                 <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                     <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?fname=" . $fname . "&pageno=" . ($pageno + 1);
                                } ?>">Next</a>
                 </li>
                 <li><a href="?fname=<?php echo $fname ?>&pageno=<?php echo $total_pages - 1; ?>">Last</a></li>
             </ul>
         </div>
     </div>

 </div>
 <?php include_once 'footer.php'; ?>