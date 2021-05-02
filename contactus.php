<?php 

$page_title = "Contact Us";
 
// Initialize the session
session_start();
 
if(isset($_POST['submit'])){
    $to = "alhajdev@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
include_once 'header.php';

include('nav.php');

?>
<div class="container mb-5">
    <div class="row text-center mt-5">
        <div class="col-12  mb-5 mt-4">
            <h2 class="alert alert-info">
                Contact Us
            </h2>
        </div>
        <div class="col-sm-6">

            <h3 class="mt-4"> <i class="fas fa-mobile-alt"></i>Phone</h3> <span>00601162304341</span>
        </div>
        <div class="col-sm-6">

            <h3 class="mt-4"><i class="fas fa-map-marker-alt"></i>Address</h3> <span>Damascus, Syria</span>
        </div>
        <div class="col-8 offset-2 mt-4">
            <h2>Send Us Email</h2>
            <form action="" method="post">
            <div class="form-group">
                First Name: <input class="form-control" type="text" name="first_name" ><br>
            </div>
            <div class="form-group">
                Last Name: <input class="form-control" type="text" name="last_name"><br>
            </div>
            <div class="form-group">
                Email: <input class="form-control" type="text" name="email"><br>
            </div>
            <div class="form-group">
                Message:<br><textarea class="form-control" rows="5" name="message" cols="30"></textarea><br>
            </div>
            
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>



</div>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>

</html>