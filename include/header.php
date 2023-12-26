<?php 
/**
 * Header Template for login User
 * */
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?php get_page_title(); ?></title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <?php 
    //Left Side Nav Bar
  include("parts/side_nav_bar.php");

    //Top Nav Bar
  include("parts/top_nav_bar.php");
  ?>

  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"><?php echo(is_admin() ? 'Admin' : 'Default'); ?></h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php get_page_permalink(); ?>"><?php get_page_title(); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>

          <?php if(is_admin()) { ?>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php get_page_permalink('suite-add'); ?>" class="btn btn-sm btn-neutral">Add New Suite</a>
              <a href="<?php get_page_permalink('room-add'); ?>" class="btn btn-sm btn-neutral">Add New Room</a>
            </div>
          <?php } ?>
        </div>
                  <?php 

          //Admin Summary Information Card
          if ( is_admin() ) {
            include("parts/_admin_dashbord_info_card.php");
          }

          ?>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">