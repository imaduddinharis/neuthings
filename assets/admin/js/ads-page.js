var captcha = false;

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

