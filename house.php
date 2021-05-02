<?php

$page_title = "Post";
// Include config file
require_once "config.php";
include_once 'header.php';  
$id = $_POST['id'];
 // Initialize the session
session_start();

include('nav.php'); ?>

<div class="container">
   <?php
  
   try {
      $sql = "SELECT * FROM houses WHERE id='$id'";
      $result = $pdo->query($sql);
      if ($result->rowCount() > 0) {
         echo "<table class='table table-bordered table-striped text-center'>
         <tr>
         <th>id</th>
         <th>Area</th>
         <th>Rooms</th>
         <th>Floor</th>
         <th>Address</th>
         <th>Cladding Level</th>
         <th>Price</th>
         <th>Buy</th>
         </tr>
         ";

         while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['area'] . "</td>";
            echo "<td>" . $row['rooms'] . "</td>";
            echo "<td>" . $row['floor'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['cladding_level'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo '<td>
            <form action="buy-house.php" method="post">
                <input type="hidden" name="id" value="' . $row["id"] . '">
                <input type="submit" name="submit" value="Buy">
            </form>
        </td>';
            echo "</tr>";
         }
         echo "</table>";

         // Free result set
         unset($result);
      } else {
         echo "No records matching your query were found.";
      }
   } catch (PDOException $e) {
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
   }

  

   ?>

   <!-- display house images  -->
   <?php 
    try {
      $sql_images = "SELECT * FROM images WHERE house='$id'";
      $result_images = $pdo->query($sql_images);
      if ($result_images->rowCount() > 0) {
         echo " <div class='row py-3 shadow-5'>";

         while ($image= $result_images->fetch()) {
           echo ' <div class="col-4 mt-1">
           <img src="./img/houses/'.$image['image'].'"  class="w-100" />
        </div>';
         }
         echo "</div>";

         // Free result set
         unset($result_images);
      } else {
         echo "No records matching your query were found.";
      }
   } catch (PDOException $e) {
      die("ERROR: Could not able to execute $sql_images. " . $e->getMessage());
   }

   // Close connection
   unset($pdo);
   ?>
  

     

  



</div>
<?php include_once 'footer.php'; ?>