<?php include("includes/header.php");?>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
 <!-- navbar-section -->
 <div id="wrapper">
   <?php include("includes/navigation.php");?>
 <!--  sidebar /main section -->
 <br><br>
     <div class="sbar">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-3">
             <?php include("includes/sidebar.php");?>
           </div>

           <div class="col-md-9">
             <div class="dboard">
               <h1><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i>Dashboard <small>Stastistic Overview</small></h1>
               <strong><?php echo $_SESSION['user_fname']; ?></strong>
               <ol class="breadcrumb">
                 <li class="active">
                   <i class="fa fa-tachometer" aria-hidden="true"></i>
                 Dashboard</li>
               </ol>
             </div>
            <?php include("includes/tagboxes.php");?>

           </div>
         </div>
       </div>
     </div>
          <!-- footer-section -->
 <?php include("includes/footer.php");?>