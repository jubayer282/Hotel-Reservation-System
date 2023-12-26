<?php 
//Get user information

if (isset($_POST['profile-update'])) 
{
  $name = $_POST['name'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $post_code = intval( $_POST['post_code'] );

//Check Confirm Password
  if ( $password === $password2 ) {
    $pass = md5($password);
    update_user( $name, $phone, $address, $country, $post_code, $pass );
  } else {
    update_user( $name, $phone, $address, $country, $post_code );
  }
}

$user = get_user_meta();

?>

<div class="row">
  <div class="col-xl-4 order-xl-2">
    <div class="card card-profile">
      <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="<?php get_user_image(); ?>" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
          <a href="#" class="btn btn-sm btn-default float-right">Message</a>
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <h5 class="h3"><?php echo $user['name'] ?></h5>
          <div class="h5 font-weight-300">
            <i class="ni ni-email-83 mr-2"></i><?php echo $user['email']; ?>
          </div>
          <div class="h5 mt-4">
            <i class="ni ni-business_briefcase-24 mr-2"></i><?php echo $user['address']; ?>
          </div>
          <div>
            <i class="ni ni-education_hat mr-2"></i><?php echo $user['phone'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-8 order-xl-1">
    <form action="#" method="POST">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Edit profile </h3>
            </div>
            <div class="col-4 text-right">
              <button type="submit" name="profile-update" class="btn btn-sm btn-primary">Update</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">User information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Name</label>
                  <input type="text" id="input-username" class="form-control" placeholder="Name" name="name" value="<?php echo $user['name']; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Email address</label>
                  <input type="email" id="input-email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" disabled>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Contact information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Address</label>
                  <input id="input-address" class="form-control" placeholder="Address" name="address" value="<?php echo $user['address'] ?>" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-city">Phone No</label>
                  <input type="tel" id="input-city" class="form-control" placeholder="Phone Number" name="phone" minlength="11" maxlength="14" value="<?php echo $user['phone'] ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Country</label>
                  <input type="text" id="input-country" class="form-control" placeholder="Country" name="country" value="<?php echo $user['country'] ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="input-country">Postal code</label>
                  <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code" name="post_code" value="<?php echo $user['postal'] ?>">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">Security</h6>
          <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input class="form-control" placeholder="New Password" type="password" name="password">
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input class="form-control" placeholder="Re-Confirm Password" type="password" name="password2">
            </div>
            <?php 
            if ( isset($error_pass) ) {
              echo '<div class="text-warning font-italic"><small>Confirm password does not match</small></div>';
            }
            ?>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>