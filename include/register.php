<?php 

$error_email = $error_pass = null;

if (isset($_POST['submit'])) 
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

//Check Confirm Password
  if ( $password === $password2 ) {
    $pass = md5($password);

    //Check Email
    if (check_duplicate('user','email',$email) == false) {
      register_user( $email, $name, $pass, $phone, $address );
    } else {
      $error_email = 1;
    }
  } else {
    $error_pass = 1;
  }

}

?>

<style>
  .bg-default{
    background-image: linear-gradient(0deg, rgb(0 0 0 / 70%), rgb(0 0 0 / 70%)), url("bg.webp");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
  }
  
</style>

<!-- Main content -->
<div class="main-content">
  <!-- Header -->
  <div class="header py-7 py-lg-8 pt-lg-9">

  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>Sign up with credentials</small>
            </div>
            <form role="form" action="" method="POST">
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input class="form-control" placeholder="Full Name" type="text" name="name" required="">
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" name="email" required="">
                </div>
                <?php 
                  if ( isset($error_email) ) {
                    echo '<div class="text-warning font-italic"><small>Email already exists</small></div>';
                  }
                 ?>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Password" type="password" name="password" required="">
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Confirm Password" type="password" name="password2" required="">
                </div>
                <?php 
                  if ( isset($error_pass) ) {
                    echo '<div class="text-warning font-italic"><small>Confirm password does not match</small></div>';
                  }
                 ?>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                  </div>
                  <input class="form-control" placeholder="Phone No" type="tel" name="phone" required="">
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-badge"></i></span>
                  </div>
                  <input class="form-control" placeholder="Address" type="text" name="address" required="">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary mt-4">Create account</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">

          </div>
          <div class="col-6 text-right">
            <a href="<?php echo SITE_URL ?>" class="text-light"><small>Already have an account</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>