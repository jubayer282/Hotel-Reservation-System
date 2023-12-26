<?php 

$error = null;

if (isset($_SESSION['id']))
{
  echo("<script>location.href = '".SITE_URL."/?page=dashboard';</script>");
  die();
}

elseif (isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pass = md5($password);

  $error = check_login( $email, $pass );

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
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">

            <?php 

            if ( isset($error) ) {
              echo '<div class="alert alert-danger" role="alert">Invalid Sign in credentials</div>';
            }

             ?>

            <div class="text-center text-muted mb-4">
              <small>Sign in with credentials</small>
            </div>
            <form role="form" action="" method="POST">
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Email" type="email" name="email" required="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Password" type="password" name="password" required="">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                <label class="custom-control-label" for=" customCheckLogin">
                  <span class="text-muted">Remember me</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary my-4">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="#" class="text-light"><small>Forgot password?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="<?php echo SITE_URL ?>/?action=register" class="text-light"><small>Create new account</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>