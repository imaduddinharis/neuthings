<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Neuthings Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gray-900">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background-color:#ededed">
                <img src="http://pushadsdev.amandjaja.com/data/advertisement/image/495d50774a822d720190812031506.png" style="width:inherit;transform:translateY(100%)">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Account</h1>
                  </div>
                  <form class="user" method="post" action="<?=base_url()?>auth-register">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="first_name" id="exampleInputFirstname" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="last_name" id="exampleInputLastname" placeholder="Last Name" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Register
                    </button>
                    <hr>
                    <small class="form-text text-muted text-center">
                      already have an account? <a href="<?=base_url()?>auth">login</a>
                    </small>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=340354959998168&autoLogAppEvents=1"></script>
	<script type="text/javascript">
			FB.init({appId: '<?php echo facebook_app_id()?>', status: true, cookie: true, xfbml: true});
			FB.Event.subscribe('auth.login', function(response) {
				// window.location.reload();
			});
		</script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
