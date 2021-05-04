<?php $page_title = "Home";
require_once 'header.php';
session_start();
include('nav.php');
require_once "config.php"; ?>
<div class="container bootstrap snipets">
    <h1 class="text-center text-muted mb-4">Houses Catalog</h1>
    <div class="row flow-offset-1">
        <?php
        // Attempt select query execution
        try {
            $sql = "select * from houses join ( select * from images where id in ( select max(id) from images group by house ) ) as image on houses.id = image.house WHERE houses.sold=0";
            $result = $pdo->query($sql);
            if ($result->rowCount() > 0) {

                while ($row = $result->fetch()) {
                    echo ' 
          <div class="col-xs-6 col-md-4 mb-5">
              <div class="product tumbnail thumbnail-3"><a href="#"><img src="./img/houses/' . $row['image'] . '" alt=""></a>
                  <div class="caption">
                      <span class="text-success">Area: ' . $row['area'] . '</span>
                      <span class="text-primary">Floor: ' . $row['floor'] . '</span>
                      <span class="text-dark">Rooms: ' . $row['rooms'] . '</span><br>
                      <h6 class="price">Price:' . $row['price'] . '</h6>';
                      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        echo' <form action="buy-house.php" method="post">
                        <input type="hidden" name="id" value="' . $row["id"] . '">
                        <input type="submit" name="submit" value="Buy">
                      </form>';
                    } else {
                       echo'<h6 class="text-danger">Login To Buy</h6>';
                    }
                 
                    echo'
                  </div>
              </div>
          </div>';
                }

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
<?php require_once 'footer.php'; ?>