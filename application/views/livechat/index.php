<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Neuthings Dashboard</title>

  <link href="<?=base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="<?=base_url()?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- MDBootstrap Steppers Pro  -->
  <link href="<?=base_url()?>assets/admin/css/step.css" rel="stylesheet">
  <!-- datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css">

  <style>
    td #chevright
    {
      float:right
    }
    .table-inline
    {
      display:inline-block;
    }
  </style>
</head>

<body>
  <input type="hidden" id="baseurl" value="<?=base_url()?>">
  <center style="margin-top:20%;">
    <h1>Neuthings</h1>
    <small>new way of advertising</small>
  </center>
  <a href="<?=base_url()?>auth/logout" class="btn btn-danger" title="logout" style="position: fixed; bottom: 23px; right: 128px;"><i class="fa fa-power-off"></i></a>
  <button id="chatbutton" class="btn btn-secondary" style="position: fixed; bottom: 23px; right: 28px;"><i class="fa fa-comment-o"></i> Livechat</button>
  <div class="card" style="position: fixed; bottom: 70px; right: 28px; width: 350px; max-height: 500px; display: none;" id="chatbox">
    <div class="card-header bg-primary bg- text-white">
      <i class="fa fa-arrow-left" id="chatback" style="display: none; cursor:pointer"></i> <span id="title">Chat Title</span>
    </div>
    <div class="card-body" style="overflow-y: scroll">
      <ul class="list-group" id="chatlist" style="font-size: small;">
      <!-- <button class="list-group-item list-group-item-action chatroom">Cras justo odio</button> -->
        
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
          <textarea class="form-control" onKeyPress="checkSubmit(event)" rows="1" style="font-size: small;" id="message"></textarea>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <button class="btn btn-primary btn-block" onclick="insert()"><i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url()?>assets/admin/js/demo/chart-pie-demo.js"></script>
  <!-- <script src="<?=base_url()?>assets/admin/js/ads-page.js"></script> -->

  <script src='https://www.google.com/recaptcha/api.js'></script>
  
  <!-- MDBootstrap Steppers Pro  -->
  <script type="text/javascript" src="<?=base_url()?>assets/admin/js/step.js"></script>
  <script>
    // $(document).ready(function () {
    // $('.stepper').mdbStepper();
    // })
  </script>

  <!-- datatables -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script>
          
            $(document).ready(function(){
                $('.tabledata').DataTable({
                  "dom":  '<"search"fl><"top">rt<"bottom"ip>',
                  "oLanguage": {
                        "sSearch": "",
                        "sLengthMenu":"_MENU_"
                  }
                });
            });
            $(document).ready(function(){
              $("#table-invoice_wrapper").removeClass("form-inline");
              // var til = `
              // <select name="table-invoice_length" aria-controls="table-invoice" class="form-control input-sm">
              //   <option value="10">10</option>
              //   <option value="25">25</option>
              //   <option value="50">50</option>
              //   <option value="100">100</option>
              // </select>
              // `;
              // $("#table-invoice_length label").html(til);
              // $("#table-invoice_length label").addClass('table-inline');
              
              // var tif = `
              // <input type="search" class="form-control input-sm" placeholder="search" aria-control="table-invoice">
              // `;
              // $("#table-invoice_filter label").html(tif);
            });
        </script>
<!-- enddatatables -->
<!-- livevchat -->
<script>
  var baseurl = $('#baseurl').val();
  console.log(baseurl);
    function checkSubmit(e) {
      if(e && e.keyCode == 13) {
          insert();
      }
    }
    function view(id,email) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('chatbar').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', baseurl+'chat-get?id='+id+'&email='+email, true);
        xhr.send();
    }

    function viewchat() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('chatlist').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', baseurl+'chat', true);
        xhr.send();
    }

    function insert() {
        if($('#message').val() != ''){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                xhr.responseText;
            }
        }
        var message = $('#message').val();
        console.log(message);
        xhr.open('POST', baseurl+'chat-send?email='+localStorage.getItem("email"), true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('chatname=user' + '&message=' + message);
        // form1.chatname.value = '';
        document.getElementById('message').value = "";
        console.log(message);
        return false;
      }
    }
    var interval = null;
   $(document).ready(function () {
     setInterval(function() { viewchat() }, 1000);
        // console.log($(".chatroom"));
      var isOpened = false;
      $("#chatbutton").on("click", function () {
        if(isOpened == false){
          $("#chatbox").show();
          // viewchat();
          isOpened = true;
        }else{
          $("#chatbox").hide();
          clearInterval(interval);
          isOpened = false;
        }
      })
      // $('#2').click(function(){
      //   console.log('clicked');
      // });
      
      $("#chatback").on("click", function () {
        $("#chatbar").hide();
        $("#chatfooter").hide();
        $("#chatlist").show();
        clearInterval(interval);
        $("#title").html('Chat Title');
        if($("#chatlist").css('display') != ('none')){
          $("#chatback").hide();
        }
      })
    })

    function openchat(id){
        // console.log('clicked');
        getchat = true;
        $("#chatlist").hide();
        $("#chatbar").show();
        $("#chatback").show();
        $("#chatfooter").show();
        var title = $("#email"+id).val();
        console.log(title);
        $("#title").html(title);
        var loading = '<center><h5>Loading</h5></center>';
        $("#chatbar").html(loading);
        interval = setInterval(function() { view(id,title) }, 1000);
        localStorage.setItem("email", title);
        console.log(localStorage.getItem("email"));
      }
    
  </script>
  <!-- endlivechat -->
</body>

</html>
