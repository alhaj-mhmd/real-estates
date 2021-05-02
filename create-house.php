<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";
 
$area = $rooms = $floor = $address = $cladding_level_err = $price_err = $images = '';
$area_err = $rooms_err = $floor_err = $address_err = $cladding_level_err = $price_err =  '';
$image_errs = array();
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate area
    if (empty(trim($_POST["area"]))) {
        $area_err = "Please enter area.";
    } elseif (strlen($_POST["area"]) < 2) {
        $area_err = "Please enter area.";
    } else {
        $area = trim($_POST["area"]);
    }

    // validate rooms
    if (empty(trim($_POST["rooms"]))) {
        $rooms_err = "Please enter rooms.";
    } elseif (strlen($_POST["rooms"]) < 1) {
        $rooms_err = "Please enter rooms.";
    } else {
        $rooms = trim($_POST["rooms"]);
    }

    //   validate floor
    if (empty(trim($_POST["floor"]))) {
        $floor_err = "Please enter floor.";
    } elseif (strlen($_POST["floor"]) < -3) {
        $floor_err = "Please enter floor.";
    } else {
        $floor = trim($_POST["floor"]);
    }

    //   validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter address.";
    } elseif (strlen($_POST["address"]) < 5) {
        $address_err = "Please enter address.";
    } else {
        $address = trim($_POST["address"]);
    }

    //   validate cladding_level
    if (empty(trim($_POST["cladding_level"]))) {
        $cladding_level_err = "Please enter claddin level.";
    } elseif (strlen($_POST["cladding_level"]) < 0) {
        $cladding_level_err = "Please enter claddin level.";
    } else {
        $cladding_level = trim($_POST["cladding_level"]);
    }

    //   validate Price
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter Price.";
    } elseif (strlen($_POST["price"]) < 0) {
        $price_err = "Please enter Price.";
    } else {
        $price = trim($_POST["price"]);
    }

    //   validate image
    $allowed_extensions = array('jpg', 'gif', 'jpeg', 'png');
    if ($_FILES['images']['error'] == 4) {
        $image_errs[] = "Please selecet image.";
    } else {
        
         
        $images = $_FILES['images'];
        $images_count = count($images['name']);
        for ($i = 0; $i < $images_count; $i++) {
            $image_name =  $images["name"][$i];
            $image_tmp_name = $images["tmp_name"][$i];
            $image_type = $images["type"][$i];
            $image_size = $images["size"][$i];
            $tmp_extension = explode('.', $image_name);
            $image_extension = strtolower(end($tmp_extension));
            if ($image_size > 10000000) {
                $image_errs[] = 'Image can not be more than 10MB';
            } elseif (!in_array($image_extension, $allowed_extensions)) {
                $image_errs[] = 'This is not Image';
            }else{
                move_uploaded_file($image_tmp_name,'img\houses\\' . time(). $image_name);
            }
        }
    }
 
    $user_id = $_SESSION["id"];
    if (empty($area_err) && empty($rooms_err) && empty($floor_err) && empty($address_err)&& empty($cladding_level_err)&& empty($price_err)&& empty($image_errs)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO houses (area,rooms, floor,address, cladding_level,price,user_id) VALUES (:area,:rooms, :floor,:address, :cladding_level,:price,:user_id)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":area", $param_area, PDO::PARAM_INT);
            $stmt->bindParam(":rooms", $param_rooms, PDO::PARAM_INT);
            $stmt->bindParam(":floor", $param_floor, PDO::PARAM_INT);
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":cladding_level", $param_cladding_level, PDO::PARAM_STR);
            $stmt->bindParam(":price", $param_price, PDO::PARAM_INT);
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

            // Set parameters
            $param_area = $area;
            $param_rooms = $rooms;
            $param_floor = $floor;
            $param_address = $address;
            $param_cladding_level = $cladding_level;
            $param_price = $price;
            $param_user_id = $user_id;


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $house=$pdo->lastInsertId();
                // // insert images 
                for ($i = 0; $i < $images_count; $i++) {
                    

                    $image_name =  $images["name"][$i];
                    $sql_image = "INSERT INTO images (image,house) VALUES (:image, :house )";
                    if ($stmt_image = $pdo->prepare($sql_image)) {
                        // Bind variables to the prepared statement as parameters
                        $stmt_image->bindParam(":image", $param_image, PDO::PARAM_STR);
                        $stmt_image->bindParam(":house", $param_house, PDO::PARAM_INT);
                         

                        // Set parameters
                        $param_image = $image_name;
                        $param_house = $house;
                      
                       

                        $stmt_image->execute();
                             
                         
                    }
                }

                // Redirect to login page
                header("location: houses.php");
            } else {
                echo "Something went wrong. Please try again.";
            }

            // Close statement
            unset($stmt);
        }

        // Close connection
        unset($pdo);
    }
}
 
?>
<?php $page_title = "Create Contact";
include_once 'header.php'; ?>

<?php include('nav.php');  ?>

<div class="container text-center mt-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Create House</h2>
            <p>Please fill this form to create house.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group ">
                    <label>Area</label>
                    <input type="text" name="area" value="<?php echo isset($_POST["area"]) ? $_POST["area"] : ''; ?>" class="form-control" required>
                    <span class="text-danger"><?php echo $area_err; ?></span>
                </div>
                <div class="form-group ">
                    <label>Rooms</label>
                    <input type="text" name="rooms" value="<?php echo isset($_POST["rooms"]) ? $_POST["rooms"] : ''; ?>" class="form-control" required>
                    <span class="text-danger"><?php echo $rooms_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Floor</label>
                    <input type="text" name="floor" value="<?php echo isset($_POST["floor"]) ? $_POST["floor"] : ''; ?>" class="form-control" required>
                    <span class="text-danger"><?php echo $floor_err; ?></span>
                </div>
                <div class="form-group ">
                    <label>Address</label>
                    <input type="tel" name="address" class="form-control" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>" required>
                    <span class="text-danger"><?php echo $address_err; ?></span>
                </div>
                <div class="form-group ">
                    <label>Cladding Level</label>
                    <input type="tel" name="cladding_level" class="form-control" value="<?php echo isset($_POST["cladding_level"]) ? $_POST["cladding_level"] : ''; ?>" required>
                    <span class="text-danger"><?php echo $cladding_level_err; ?></span>
                </div>
                <div class="form-group ">
                    <label>Price</label>
                    <input type="tel" name="price" class="form-control" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>" required>
                    <span class="text-danger"><?php echo $price_err; ?></span>
                </div>
                <div class="form-group ">
                    <label>Images</label>
                    <input type="file" name="images[]" class="form-control" multiple >
                    <span class="text-danger"><?php foreach($image_errs as $image_err) echo $image_err .'<br>'; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5 mt-3">
        <dic class="col-12 text-center">
            <p>Go to <a href="contacts.php">My Contacts</a></p>
        </dic>
    </div>
</div>

<?php include_once 'footer.php'; ?>