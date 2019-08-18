</div>
<!-- End of Main Content -->
  <button id="chatbutton" class="btn btn-secondary" style="position: fixed; bottom: 1rem; right: 4rem;"><i class="fa fa-comment"></i> Livechat</button>
    <div class="card" style="position: fixed; bottom: 70px; right: 28px; width: 350px; max-height: 500px; display: none;" id="chatbox">
      <div class="card-header bg-primary bg- text-white">
        <!-- <i class="fa fa-chevron-left" id="chatback" style="display: none; cursor:pointer;margin-right:5px;"></i>  -->
        Neuthings Customer Service
        <!-- <i style="width:10px;height:10px;background-color:red;color:red;border-radius:100%; display:inline-block"></i> Offline -->
        <!-- <span><span>Online -->
      </div>
      <div class="card-body" style="overflow-y: scroll">
        <div id="chatbar">
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
      <div class="card-footer" id="chatfooter" style="">
        <div class="row">
          <div class="col-md-9">
            <textarea class="form-control" rows="1" style="font-size: small;" id="message"></textarea>
          </div>
          <div class="col-md-3 d-flex align-items-center">
            <button  onclick="insert()" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Neuthings 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= $userData['authLogout']; ?>">Logout</a>
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
  <script src="<?=base_url()?>assets/admin/js/ads-page.js"></script>

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
  var interval = null;
  var email = '<?=$this->session->userdata('userData')['email']?>';
  function view() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('chatbar').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', baseurl+'chat-cust-get?email='+email, true);
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
        xhr.open('POST', baseurl+'chat-cust-send?email='+email, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('chatname=user' + '&message=' + message);
        // form1.chatname.value = '';
        document.getElementById('message').value = "";
        
        console.log(message);
        return false;
      }
    }
  console.log(baseurl);
    $(document).ready(function () {
      var isOpened = false;
      $("#chatbutton").on("click", function () {
        if(isOpened == false){
          $("#chatbox").show();
          var loading = '<center><h5>Loading</h5></center>';
          $("#chatbar").html(loading);
          interval = setInterval(function() { view() }, 1000);
          isOpened = true;
        }else{
          $("#chatbox").hide();
          clearInterval(interval);
          isOpened = false;
        }
      })

    })
    
  </script>
  <!-- endlivechat -->
</body>

</html>
