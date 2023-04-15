// UI elements
const mobile_number = document.getElementById('mobile_number');
const otpnums = document.getElementsByClassName('otp-num');
const verify_button = document.getElementById('OTP-verify');
const error = document.getElementsByClassName('error');
const send_button = document.getElementById('OTP-send');

//setting up event listeners for the OTP input fields using for loop
for (var i = 0; i < otpnums.length; i++) {
  otpnums[i].addEventListener('input', function() { 
    var index = Array.prototype.indexOf.call(otpnums, this);
    console.log(index)
    if(this.value.length==this.maxLength && index<5){
      otpnums[index+1].focus();
    }
  });

  
  otpnums[i].addEventListener('keyup', function(e){
    var index = Array.prototype.indexOf.call(otpnums, this);
    
    if(e.keyCode===8 && this.value.length===0 && index!=0){
      otpnums[index-1].focus();
    }
  })

  otpnums[i].addEventListener('keydown', function(e){
    var index = Array.prototype.indexOf.call(otpnums, this);
    if(e.keyCode>47 && e.keyCode<58 && this.value.length>=1 && index<5){
      otpnums[index+1].focus();
    }
  });
}

//Evenlistners
send_button.addEventListener("click",sendOTP);
verify_button.addEventListener("click",verifyOTP);

//Event Lisntner functions
function sendOTP(e){
  const form = document.getElementById("mobile-details");
  var data = new FormData(form);
  data.append("action","sendOTP");

  xhr = new XMLHttpRequest();
  xhr.open("POST", ROOT.concat("/Technician/Getverified/sendOTP"));

  console.log("clicked send otp");

  xhr.onprogress = function(){
    console.log('sending');
  }

  xhr.onload = function(){
    if(xhr.status == 200){
      const res = xhr.responseText;
      res = JSON.parse(xhr.responseText);
      console.log(res.sending);

    }
    if(xhr.status == 422){
        const res = JSON.parse(xhr.responseText);
        const error_div = (mobile_number.parentElement).parentElement;
        error_div.className = "input-field error";
        const small = error_div.querySelector('small');
        small.innerHTML = res.error;
        console.log(res);
    }
  }

  xhr.send(data);
  e.preventDefault();

}

function verifyOTP(e){
  const form = document.getElementById("mobile-otp");
  console.log(typeof(form));

  if(validateOTP()){

    var otp = prepareOTP(form);
    var formData = new FormData(form);

    xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Technician/Getverified/verifyOTP");
    xhr.send(otp);
    xhr.onload = function(){
      if(xhr.status == 200){
        const res = xhr.responseText;
        console.log(res);
      }
    }
  }
  else{
    console.log("error");
  }

  console.log(prepareOTP(form));
  e.preventDefault();

}


//Other Functions
function validateOTP(){
  var err='';
  for (var i = 0; i < otpnums.length; i++){
    if(otpnums[i].value==''){
      err="INVALID OTP!"
      break;
    }
  }

  if(err.length!=0){
    error[0].innerHTML="<p>"+err+"</p>";
    console.log(err);
    return false;
  }else{
    return true;
  }

}

function prepareOTP(form){
  var power=5;
  var otp=0;
  for(i=0;i<6;i++){
    otp+=parseInt(form[i].value)*(Math.pow(10,power));
    power-=1;
  }
  return otp;
}


//make send otp button only active when phone number field is complete
const phone = document.getElementById('mobile_number');
phone.addEventListener('input',function(){
  if(this.value.length==9){
    send_button.disabled=false;
  }
  else{
    send_button.disabled=true;
  }
});

