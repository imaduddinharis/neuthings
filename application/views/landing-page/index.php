<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="Neuthings App">
  <meta name="author" content="Neuthings Web Master">

  <title>Neuthings</title>

  <!-- Font Awesome Icons -->
  <link href="<?=base_url()?>assets/landing-page/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?=base_url()?>assets/landing-page/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?=base_url()?>assets/landing-page/css/creative.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Neuthings</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#feature">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#monitoring">Monitoring</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>auth">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-md-10 align-self-end">
          <h1 class="text-white font-weight-bold">Neuthings</h1>
        </div>
        <div class="col-lg-8 align-self-baseline text-center">
          <h2 class="text-white-75 font-weight-light mb-5 mt-0">new way of advertising.</h2>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h1 class="text-white mt-0"><strong>YOUR ADS IS OUR PRIORITY</strong></h1>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">
          Neuthings is an advertising management platform aimed at all platforms that have a partnership relationship with the Telkom Group. The ads that you register will be displayed according to your choice and budget
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="feature">
    <div class="container">
      <h2 class="text-center mt-0">Features</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fa fa-4x fa-lightbulb-o text-primary mb-4"></i>
            <h3 class="h4 mb-2">Create</h3>
            <p class="text-muted mb-0">Create your advertisement by adjusting the appearance and money you have, and the platform for the advertisement displayed</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fa fa-4x fa-pencil text-primary mb-4"></i>
            <h3 class="h4 mb-2">Update</h3>
            <p class="text-muted mb-0">Update your ad in terms of appearance, budget and platform</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fa fa-4x fa-bullhorn text-primary mb-4"></i>
            <h3 class="h4 mb-2">Monitor</h3>
            <p class="text-muted mb-0">See how much your ad is showing directly</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fa fa-4x fa-comments-o text-primary mb-4"></i>
            <h3 class="h4 mb-2">Consult</h3>
            <p class="text-muted mb-0">Consult your business needs with our services to choose the right advertising package</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Dare to start?</h2>
      <p>If you are interested in our services, please click on login</p>
      <a class="btn btn-primary btn-lg" href="<?=base_url()?>auth">Getting Started</a>
    </div>
  </section>

  <section class="page-section" id="monitoring">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <h2>Ads Monitoring</h2>
          <hr class="divider my-4">
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6">
          <img src="<?=base_url()?>asset/img/viewday.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h4>Views per Day</h4>
          Check your ads viewers per day
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6 d-xs-block d-sm-block d-md-none d-lg-none">
            <img src="<?=base_url()?>asset/img/clickday.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h4>Clicks per Day</h4>
          Check your ads clicks per day
        </div>
        <div class="col-md-6 d-none d-sm-block">
            <img src="<?=base_url()?>asset/img/viewday.png" alt="image" class="img-fluid">
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-6">
            <img src="<?=base_url()?>asset/img/topads.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h4>Top Ads</h4>
          Check your top ad, so you can determine which ad is effective for your business
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section bg-primary" id="contact">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center text-white">
          <h2 class="mt-0">Contact us</h2>
          <hr class="divider light my-4">
          <p class="mb-5">
            
          </p>
        </div>
      </div>
      <div class="row bg-light ">
        <div class="col-md-4 text-center">
          <h3 class="text-primary mt-5 mb-5">SAY HELLO</h3>
          <p class="text-muted">
            Phone : +62 821-3469-0067
            <br>Email : admin@neuthings.com</p>
            <p class="text-muted mb-5">
            <i class="fa fa-facebook"></i>&emsp;
            <i class="fa fa-twitter"></i>&emsp;
            <i class="fa fa-instagram"></i>
          </p>
        </div>
        <div class="col-md-4 text-center">
          <h3 class="text-primary mt-5 mb-5">OUR ADDRESS</h3>
          <p class="text-muted mb-5">
              Telkom Regional I Sumatera,<br>
              Jl. Prof. HM. Yamin Sh No.2,<br>
              Kesawan, Kec. Medan Bar.,<br> Kota Medan, Sumatera Utara 20236
          </p>
        </div>
        <div class="col-md-4 text-center">
            <h3 class="text-primary mt-5 mb-5">OPENING HOURS</h3>
            <p class="text-muted mb-5">
                Mon - Fri: 8am - 17pm
              </p>
        </div>
      </div>
    </div>
  </section>

  <!-- <button id="chatbutton" class="btn btn-secondary" style="position: fixed; bottom: 23px; right: 28px;"><i class="fa fa-comment-o"></i> Livechat</button>
  <div class="card" style="position: fixed; bottom: 70px; right: 28px; width: 350px; max-height: 500px; display: none;" id="chatbox">
    <div class="card-header bg-primary bg- text-white">
      <i class="fa fa-arrow-circle-o-left" id="chatback" style="display: none;"></i> Chat Title
    </div>
    <div class="card-body" style="overflow-y: scroll">
      <ul class="list-group" id="chatlist" style="font-size: small;">
        <button class="list-group-item list-group-item-action chatroom">Cras justo odio</button>
        <button class="list-group-item list-group-item-action chatroom">Dapibus ac facilisis in</button>
        <button class="list-group-item list-group-item-action chatroom">Morbi leo risus</button>
        <button class="list-group-item list-group-item-action chatroom">Porta ac consectetur ac</button>
        <button class="list-group-item list-group-item-action chatroom">Vestibulum at eros</button>
      </ul>
      <div style="display: none;" id="chatbar">
        <div class="row mb-4">
          <div class="col-md-3">
            <img src="https://dummyimage.com/70x70/000/ffffff" alt="" class=" rounded-circle">
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa dolore, dolores doloribus ducimus eaque explicabo inventore iusto minima nesciunt numquam officia quisquam, recusandae rem sint suscipit tempore temporibus vel.</small>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa dolore, dolores doloribus ducimus eaque explicabo inventore iusto minima nesciunt numquam officia quisquam, recusandae rem sint suscipit tempore temporibus vel.</small>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <img src="https://dummyimage.com/70x70/000/ffffff" alt="" class=" rounded-circle">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer" id="chatfooter" style="display: none;">
      <div class="row">
        <div class="col-md-9">
          <textarea class="form-control" rows="1" style="font-size: small;"></textarea>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <button class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Footer -->
  <footer class="bg-light py-3">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Neuthings</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/landing-page/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?=base_url()?>assets/landing-page/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>assets/landing-page/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <script src="<?=base_url()?>assets/landing-page/js/creative.min.js"></script>
  <script>
    $(document).ready(function () {
      var isOpened = false;
      $("#chatbutton").on("click", function () {
        if(isOpened == false){
          $("#chatbox").show();
          isOpened = true;
        }else{
          $("#chatbox").hide();
          isOpened = false;
        }
      })
      $(".chatroom").on("click", function () {
        $("#chatlist").hide();
        $("#chatbar").show();
        $("#chatback").show();
        $("#chatfooter").show();
      })
      $("#chatback").on("click", function () {
        $("#chatbar").hide();
        $("#chatfooter").hide();
        $("#chatlist").show();
        if($("#chatlist").css('display') != ('none')){
          $("#chatback").hide();
        }
      })
    })
  </script>

</body>

</html>
