 <?php $page_title = "Home";
  require_once 'header.php';
  session_start();
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

       <section>
         <h2 class="mb-4">Our Services</h2>
         <div class="container">
           <div class="row mbr-justify-content-center">

             <div class="col-lg-6 mbr-col-md-10">
               <div class="wrap">
                 <div class="ico-wrap">
                   <span class="mbr-iconfont fa-volume-up fa"></span>
                 </div>
                 <div class="text-wrap vcenter">
                   <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Stay <span>Successful</span></h2>
                   <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                 </div>
               </div>
             </div>
             <div class="col-lg-6 mbr-col-md-10">
               <div class="wrap">
                 <div class="ico-wrap">
                   <span class="mbr-iconfont fa-calendar fa"></span>
                 </div>
                 <div class="text-wrap vcenter">
                   <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Create
                     <span>An Effective Team</span>
                   </h2>
                   <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                 </div>
               </div>
             </div>
             <div class="col-lg-6 mbr-col-md-10">
               <div class="wrap">
                 <div class="ico-wrap">
                   <span class="mbr-iconfont fa-globe fa"></span>
                 </div>
                 <div class="text-wrap vcenter">
                   <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Launch
                     <span>A Unique Project</span>
                   </h2>
                   <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                 </div>
               </div>
             </div>
             <div class="col-lg-6 mbr-col-md-10">
               <div class="wrap">
                 <div class="ico-wrap">
                   <span class="mbr-iconfont fa-trophy fa"></span>
                 </div>
                 <div class="text-wrap vcenter">
                   <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Achieve <span>Your Targets</span></h2>
                   <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                 </div>
               </div>
             </div>




           </div>

         </div>

       </section>
     </div>
   </div>
   <div class="row">
     <div class="col-12">

       <div class="container py-5">
         <!-- For Demo Purpose-->
         <header class="text-center">
           <h1 class="display-4">Our Locations</h1>
         </header>

         <div class="py-5">
           <div class="row">

             <div class="col-lg-6 mb-5">
               <!-- Collapse Panel 1--><a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron">
                 <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase">Location 1</strong><i class="fa fa-angle-down"></i></p>
               </a>
               <div id="collapseExample1" class="collapse shadow-sm show">
                 <div class="card">
                   <div class="card-body">
                     <p class="font-italic mb-0 text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-lg-6 mb-5">
               <!-- Collapse Panel 2-->
               <button data-toggle="collapse" data-target="#collapseExample2" role="button" aria-expanded="true" aria-controls="collapseExample2" class="btn btn-success btn-block py-2 shadow-sm with-chevron">
                 <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase">Location 2</strong><i class="fa fa-angle-down"></i></p>
               </button>
               <div id="collapseExample2" class="collapse shadow-sm show">
                 <div class="card">
                   <div class="card-body">
                     <p class="font-italic mb-0 text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-lg-6 mb-5">
               <!-- Collapse Panel 3--><a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample3" class="btn btn-warning btn-block p2-3 shadow-sm with-chevron">
                 <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase">Location 3</strong><i class="fa fa-angle-down"></i></p>
               </a>
               <div id="collapseExample3" class="collapse shadow-sm show">
                 <div class="card">
                   <div class="card-body">
                     <p class="font-italic mb-0 text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-lg-6 mb-5">
               <!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="true" aria-controls="collapseExample4" class="btn btn-danger btn-block p2-3 shadow-sm with-chevron">
                 <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2"><strong class="text-uppercase">Location 4</strong><i class="fa fa-angle-down"></i></p>
               </a>
               <div id="collapseExample4" class="collapse shadow-sm show">
                 <div class="card">
                   <div class="card-body">
                     <p class="font-italic mb-0 text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                   </div>
                 </div>
               </div>
             </div>

           </div>
         </div>
       </div>
     </div>

   </div>
 </div>

 <?php require_once 'footer.php'; ?>