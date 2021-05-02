<?php
$page_title = "Buy House";
require_once "config.php";
 session_start();

include_once 'header.php';  

include('nav.php');  


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_POST["id"];
  


    // Prepare an update statement
    $sql_update = "UPDATE  houses SET sold = 1  WHERE id = '" . $id . "' ";

    if ($stmt_update = $pdo->prepare($sql_update)) {
        // Attempt to execute the prepared statement
        if ($stmt_update->execute()) {
            $page_title = "Update Contact";
            include_once 'header.php'; ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="alert alert-success  mt-5">
                           you have bought this house
                        </div>
                        <a href="houses.php" class="btn badge-info">Houses</a>
                         
                       
                  </div>
                  
               </div>
            </div>
         <?php include_once 'footer.php';
        } else {
            echo "Something went wrong. Please try again.";
        }

        // Close statement
        unset($stmt_update);
    }
}
