<h6 class="navbar-heading p-0 text-muted">
  <span class="docs-normal">Administration</span>
</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link <?php echo $_GET['page'] == 'dashboard' ? 'active' : '' ?>" href="<?php echo SITE_URL; ?>/?page=dashboard">
      <i class="ni ni-tv-2"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('order'); ?>">
      <i class="ni ni-spaceship"></i>
      <span class="nav-link-text">Orders</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('room'); ?>">
      <i class="ni ni-building"></i>
      <span class="nav-link-text">Rooms</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('services'); ?>">
      <i class="ni ni-ui-04"></i>
      <span class="nav-link-text">Additional Services</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('facilities'); ?>">
      <i class="ni ni-box-2"></i>
      <span class="nav-link-text">Facilities</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('feedback'); ?>">
      <i class="ni ni-bell-55"></i>
      <span class="nav-link-text">Feedback</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('reviews'); ?>">
      <i class="ni ni-diamond"></i>
      <span class="nav-link-text">Reviews</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php get_page_permalink('users'); ?>">
      <i class="ni ni-chart-pie-35"></i>
      <span class="nav-link-text">Users</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active active-pro" href="<?php get_page_permalink(); ?>">
      <i class="ni ni-send text-dark"></i>
      <span class="nav-link-text">Bookin Now</span>
    </a>
  </li>
</ul>