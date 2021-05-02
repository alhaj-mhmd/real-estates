 <?php $page_title = "Home";
  require_once 'header.php'; ?>

 <?php session_start();
  include('nav.php'); ?>
 <div class="container-fluid text-center mb-5">
   <div class="row">
     <div class="col-12 ">
       <h1 class="my-4">
         Welcome To My Website
       </h1>


     </div>
   </div>
   <div class="row">
     <div class="col-12">
       <h2>Our Services</h2>

     </div>
   </div>
   <div class="row">
     <div class="col-12">
       <h2>Our Locations</h2>
     </div>

   </div>
 </div>

 <?php require_once 'footer.php'; ?>