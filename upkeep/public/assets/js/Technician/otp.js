// UI elements
const mobile_number = document.getElementById('mobile_number');
const otpnums = document.getElementsByClassName('otp-num');
const verify_button = document.getElementById('OTP-verify');
const error = document.getElementsByClassName('error');
const send_button = document.getElementById('OTP-send');
const finish_button = document.getElementById('finish');
console.log("hello");

//setting up event listeners for the OTP input fields using for loop
for (var i = 0; i < otpnums.length; i++) {
  otpnums[i].addEventListener('input', function() { 
    var index = Array.prototype.indexOf.call(otpnums, this);
    console.log(index)
    if(this.value.length==this.maxLength && index<5){
      otpnums[index+1].focus();
    }

    //check whether a input is in numbers
    if(isNaN(this.value)){
      this.value = this.value.slice(0,-1);
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

//Evenlistners for main functionalities
send_button.addEventListener("click",sendOTP);
verify_button.addEventListener("click",verifyOTP);
finish_button.addEventListener("click",function (e){
  e.preventDefault();
  finish('contact-verification');
});

//Event Lisntner functions
function sendOTP(e){
  e.preventDefault();
  if(validateStep1()) {
    const form = document.getElementById("mobile-details");
    var data = new FormData(form);
    data.append("action", "sendOTP");

    xhr = new XMLHttpRequest();
    xhr.open("POST", ROOT.concat("/Technician/Getverified/sendOTP"));

    console.log("clicked send otp");

    xhr.onprogress = function () {
      console.log('sending');
    }

    xhr.onload = function () {
      if (xhr.status == 200) {
        const res = xhr.responseText;
        //go to next step
        const step1 = document.getElementById("step1");
        const step2 = document.getElementById("step2");
        step1.classList.add("hidden");
        step2.classList.remove("hidden");

        console.log(res);
      } else if (xhr.status == 422) {
        //const res = JSON.parse(xhr.responseText);
        const res = JSON.parse(xhr.responseText);
        showError(mobile_number.parentElement, res.error);
        console.log(res);
      } else {
        const res = JSON.parse(xhr.responseText);
        showError(mobile_number.parentElement, res.error)
        console.log(res);
      }
    }

    xhr.send(data);
  }else{
    console.log("error");
  }
}

function verifyOTP(e){
  e.preventDefault();

  const form = document.getElementById("mobile-details");

  if(validateStep2()){
    var otp = prepareOTP(form);
    var formData = new FormData;
    formData.append("otp",otp);
    formData.append("action","verifyOTP")

    xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Technician/Getverified/verifyOTP");
    xhr.send(formData);
    xhr.onload = function(){
      if(xhr.status == 200){
        const res = xhr.responseText;
        console.log(res);
        formSuccessfull('contact-verification');
      }else if (xhr.status == 400) {
        const res2 = (xhr.responseText);
        console.log(res2);
        const res = JSON.parse(xhr.responseText);
        showError(otpnums[0].parentElement, res.error);

      }
    }
  }
  else{
    console.log("error");
  }
  console.log(prepareOTP(form));
}


//Other Functions

//Prepare OTP
function prepareOTP(form){
  var power=5;
  var otp=0;
  var x = document.getElementsByClassName("otp-num");
  for(i=0;i<6;i++){
    otp+=parseInt(form.querySelector("#num".concat(i+1)).value)*(Math.pow(10,power));
    power-=1;
  }
  return otp;
}

//input restrictions phone number
//make send otp button only active when phone number field is complete
const phone = document.getElementById('mobile_number');
phone.addEventListener('input',function(){
  //check whether a input is in numbers
  if(isNaN(this.value)){
    this.value = this.value.slice(0,-1);
  }

  //eneble button only if phone number is complete
  if(this.value.length==9){
    send_button.disabled = false;
  }else if(this.value.length<9){
    send_button.disabled = true;
  }
});

// show input error message
function showError(input, message) {
  const inputField = input.parentElement;
  inputField.className = 'input-field error';
  const small = inputField.querySelector('small');
  small.innerText = message;
}

// show success message
function showSuccess(input) {
  inputField = input.parentElement;
  inputField.className = 'input-field successs';
}

//VALIDATION FUNCTIONS GENERAL
// Get fieldname
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function checkRequired(inputArr) {
  inputArr.forEach(function (input) {
    if (input.value.trim() === '') {
      showError(input.parentElement, `${getFieldName(input)} is required`);
      return false;
    } else {
      showSuccess(input.parentElement);
    }
  });
  return true;
}

function checkLength(input, min, max) {
  if (input.value.length < min) {
    showError(input.parentElement, `${getFieldName(input)} must be at least ${min} characters`);
    return false;
  } else if (input.value.length > max) {
    showError(input.parentElement, `${getFieldName(input)} must be less than ${max} characters`);
    return false;
  } else {
    showSuccess(input.parentElement);
    return true;
  }
}

//VALIDATION FUNCTIONS SPECIFIC
//validate step1 send otp
function validateStep1(){
  console.log(checkRequired([mobile_number]));
  console.log(checkLength(mobile_number,9,9));
  if (checkRequired([mobile_number]) && checkLength(mobile_number,9,9)) {
    return true;
  }else{
    console.log("error here");
    return false;
  }
}

//validate step2 verify otp
function validateStep2(){
  if(checkRequired([otpnums[0],otpnums[1],otpnums[2],otpnums[3],otpnums[4],otpnums[5]])){
    return true;
  }else{
    return false;
  }
}
