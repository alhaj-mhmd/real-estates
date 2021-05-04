<?php
$page_title = "Houses";
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    $user_id = $_SESSION["id"];
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Houses</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include('nav.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-10 offset-1 text-center">
<h1>My Houses</h1>

                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                try {
                    $sql = "SELECT * FROM houses WHERE user_id = '$user_id'  ORDER BY id ASC  ";
                    $result = $pdo->query($sql);
                    if ($result->rowCount() > 0) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Area</th>";
                        echo "<th>Rooms</th>";
                        echo "<th>Floor</th>";
                        echo "<th>Address</th>";
                        echo "<th>Cladding Level</th>";
                        echo "<th>Price</th>";
                        echo "<th>Sold</th>";

                        echo "<th>Delete</th>";
                        echo "<th>Edit</th>";
                        echo "</tr>";
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['area'] . "</td>";
                            echo "<td>" . $row['rooms'] . "</td>";
                            echo "<td>" . $row['floor'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['cladding_level'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['sold'] . "</td>";
                            echo '<td>
                                    <form action="delete-house.php" method="post">
                                        <input type="hidden" name="id" value="' . $row["id"] . '">
                                        <input class=" alert alert-danger" type="submit" name="submit" value="Delete">
                                    </form>   
                                        </td>';
                            echo '<td >
                                        <form action="edit-house.php" method="post">
                                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                                <input class=" alert alert-info" type="submit" name="submit" value="Edit">
                                            </form>
                                        </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                        // Free result set
                        unset($result);
                    } else {
                        echo "<div class='alert alert-info' >No records matching your query were found.</div>";
                    }
                } catch (PDOException $e) {
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }

                // Close connection
                unset($pdo);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <div class="mt-5">
                    <a class="alert bg-primary text-body" href="create-house.php">Create House</a>
                </div>
            </div>
        </div>

    </div>
    <?php include_once 'footer.php'; ?>