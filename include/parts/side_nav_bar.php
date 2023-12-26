<?php 
/**
 * Left Side Navbar Template
 * */
?>
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Heading -->
          <?php if (!is_admin()) { ?>
            
            <h6 class="navbar-heading p-0 text-muted">
              <span class="docs-normal">Personal</span>
            </h6>
            <!-- Nav items -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'dashboard' ? 'active' : '' ?>" href="<?php echo SITE_URL; ?>/?page=dashboard">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'services' ? 'active' : '' ?>" href="<?php get_page_permalink('services'); ?>">
                  <i class="ni ni-ui-04 text-info"></i>
                  <span class="nav-link-text">Additional Services</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'facilities' ? 'active' : '' ?>" href="<?php get_page_permalink('facilities'); ?>">
                  <i class="ni ni-box-2 text-psrimary"></i>
                  <span class="nav-link-text">Facilities</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'reviews' ? 'active' : '' ?>" href="<?php get_page_permalink('reviews'); ?>">
                  <i class="ni ni-diamond text-psrimary"></i>
                  <span class="nav-link-text">Reviews</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'order' ? 'active' : '' ?>" href="<?php get_page_permalink('order'); ?>">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">My Orders</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'profile' ? 'active' : '' ?>" href="<?php get_page_permalink('profile'); ?>">
                  <i class="ni ni-single-02 text-yellow"></i>
                  <span class="nav-link-text">Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="ni ni-send text-dark"></i>
                  <span class="nav-link-text">Book a Stay</span>
                </a>
              </li>
            </ul>

            <?php
          }
          //Admin Nav Bar
          elseif ( is_admin() ) {
            include("_admin_side_nav_bar_menu.php");
          }
          ?>


        </div>
      </div>
    </div>
  </nav>