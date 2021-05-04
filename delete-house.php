<?php
// Include config file
require_once "config.php";
$id = $_POST['id'];

$sql = "DELETE FROM houses WHERE id='$id' LIMIT 1";
$sql_delete = $pdo->prepare($sql);

$result = $sql_delete->execute(array($id));
if ($result) {
   $page_title = "Delete Post";
   include_once 'header.php'; ?>
   <div class="container">
      <div class="row">
         <div class="col-12 text-center">
            <div class="alert alert-danger mt-5">
               The House has been deleted!
            </div>
            <a href="houses.php" class="btn badge-info">My Houses</a>
            <a href="create-house.php" class="btn btn-primary">Create House</a>
         </div>
      </div>
   </div>
<?php include_once 'footer.php';
} ?>