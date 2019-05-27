var captcha = false;
var i = 1;

$( document ).ready(function() {
  $('#form-content').addClass("hidden");
});
$( document ).ready(function() {
  validationform1();
  validationform2();
});

function validationform1() {
  var language = $("#languages").val();
  var city = $('#city').val();
  var state = $('#state').val();
  var country = $('#country').val();
  var budget = $('#budget').val();
  var price = $('#price').val();
  var scheduling = $('#scheduling').val();
  var platform = $('#platform').val();
  console.log(language);



  if(language != '' && city != '' && state != '' && country != '' && budget != '' && !isNaN(price) && price >= 100000 && scheduling != '' && platform != '')
  {
    $('#nextpageads').removeAttr('disabled');
  }else{
    $('#nextpageads').attr('disabled',true);
  }
}

function validationform2() {
  var title = $('#title').val();
  var photo = $('#photo').val();
  var adsclick = $('#adsclick').val();
  

  if(title != '' && photo != '' && adsclick != '' && captcha == true)
  {
    $('#finish').removeAttr('disabled');
  }else{
    $('#finish').attr('disabled',true);
  }
}

// $( document ).ready(function() {
//   $("#form-content").removeClass("hidden");
//   $("#form-preference").addClass("hidden");
//   $("#adpref").removeClass("active");
//   $("#adcontent").addClass("active");
// });

$("#nextpageads").click(function(){
    $("#form-content").removeClass("hidden");
    $("#form-preference").addClass("hidden");
    $("#adpref").removeClass("active");
    $("#adcontent").addClass("active");
  });

$("#prevpageads").click(function(){
    $("#form-preference").removeClass("hidden");
    $("#form-content").addClass("hidden");
    $("#adcontent").removeClass("active");
    $("#adpref").addClass("active");
  });

function recaptchaCallback() {
  $('#finish').removeAttr('disabled');
  captcha = true;
  return captcha
};

$("#addnewterms").click(function(){
  var x = i+1;
  var form = `
  <div id="formterms`+i+`" class="col-md-8 col-sm-8">
    <div class="form-group col-md-12 col-sm-12">
      <input type="text" class="form-control" onInput="validationform2()" name="terms[]" id="terms`+i+`" placeholder="Terms & Conditions `+x+`" required>
    </div>
  </div>                           
  `;
  $("#formtermscontainer #addFormsBtn").before(form);
  // $(form).insertBefore$("#formtermscontainer .content:last")
  $("#minnewterms").removeClass("btn-danger");
  $("#minnewterms").addClass("btn-danger");
  i++;
});

$("#minnewterms").click(function(){
  if(i>1){
    var x = i-1;
    // $("#formterms" + x).html('');
    var elementId = 'formterms'+x;
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
    i--;
  }
  if(i<2){
    $("#minnewterms").removeClass("btn-danger");
  }
});

$("#adsclick").change(function(){
  var clickId = $("#adsclick").val();
  if(clickId == 1){
    $("#formterms").removeClass("hidden");
    $("#forminfo").addClass("hidden");
    $("#formsubs").addClass("hidden");
    $(".terms").attr("required");
    $(".infograph").removeAttr("required");
    $(".subs").removeAttr("required");
  }else if(clickId == 2){
    $("#formterms").addClass("hidden");
    $("#forminfo").removeClass("hidden");
    $("#formsubs").addClass("hidden");
    $(".infograph").attr("required");
    $(".terms").removeAttr("required");
    $(".subs").removeAttr("required");
  }else if(clickId == 3){
    $("#formterms").addClass("hidden");
    $("#forminfo").addClass("hidden");
    $("#formsubs").removeClass("hidden");
    $(".subs").attr("required");
    $(".terms").removeAttr("required");
    $(".infograph").removeAttr("required");
  }
});

function print(divName) {
  
}


$("#printbtn").click(function(){

  // var printContents = document.getElementById('printarea').innerHTML;
  //    var originalContents = document.body.innerHTML;

  //    document.body.innerHTML = printContents;

  //    window.print();

  //    document.body.innerHTML = originalContents;
  //    console.log(printContents);
  
  var divToPrint=document.getElementById('printarea');
  var linkassets = 'http://localhost/project/neuthings/';
  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write(`<html>
  <head>
  <link href="`+linkassets+`assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="`+linkassets+`assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body onload="window.print()" style="padding-top:50px;">`+divToPrint.innerHTML+`</body></html>`);

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
})

