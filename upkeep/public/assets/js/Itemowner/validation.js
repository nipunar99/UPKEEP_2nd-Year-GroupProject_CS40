/////////////////////////////////Valideation check functions //////////////////////////////////////////////
//validataion checking flag
var errocheckflag = 0;
//////////////////////////

function showError(input, message) {
    errocheckflag++;
    input.classList.add("erroInput");
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    small.innerText = message;

}

function showSuccess(input) {
    input.classList.remove("erroInput");
  }

function checkRequired(inputArr) {
    inputArr.forEach(function (input) {
      if (input.value.trim() === '') {
        showError(input, `${getFieldName(input)} is required`);
      }else{
        showSuccess(input);
      } 
    });
}

function checkRange(input, min, max) {
    if (parseFloat(input.value) < min) {
      showError(input, `${getFieldName(input)} must be at least ${min}`);
    } else if (parseFloat(input.value) > max) {
      showError(input, `${getFieldName(input)} must be less than ${max} characters`);
    } else {
      showSuccess(input);
    }
}
function checkFutureDate(input) {
    var inputDate = new Date(input.value);
    var currentDate = new Date();

    if (inputDate < currentDate) {
        showError(input, `${getFieldName(input)} is invalid Date`);
    } else {
        showSuccess(input);
    }
}

function getFieldName(input) {
    return input.id.replace(/_/g, " ").split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
}

function setSmallNull(){
    var smallTags = document.querySelectorAll('small');
    for (var i = 0; i < smallTags.length; i++) {
      smallTags[i].innerHTML = null;
    }
}

function checkFileType(file){
  if (file.value === '') {
    return;
  } 
    var fileExt = file.value.substring(file.value.lastIndexOf('.')+1);
  
      if (fileExt.toLowerCase() === 'jpeg' || fileExt.toLowerCase() === 'png' || fileExt.toLowerCase() === 'jpg'|| fileExt.toLowerCase() === 'pdf' ||file.type === '') {
          if(parseFloat(file.files[0].size/(1024*1024))>3 ){
            showError(file, 'File size must be less than 3MB.');
          }
          else{
            showSuccess(file);
          }
      }else {
        showError(file, 'File type not supported.');
      }
  }

function checkImageType(file){
  if (file.value === '') {
    return;
  }
    var fileExt = file.value.substring(file.value.lastIndexOf('.')+1);
    if (fileExt.toLowerCase() === 'jpeg' || fileExt.toLowerCase() === 'png' || fileExt.toLowerCase() === 'jpg'|| file.value === '') {
        if(parseFloat(file.files[0].size/(1024*1024))>3 ){
        showError(file, 'File size must be less than 3MB.');
        }
        else{
        showSuccess(file);
        }
    }else {
        showError(file, 'File type not supported.');
    }
}
function checkPurchaseDate(input) {
    var inputDate = new Date(input.value);
    var currentDate = new Date();

    if (inputDate > currentDate) {
        showError(input, `${getFieldName(input)} is invalid Purchase Date`);
    } else {
        showSuccess(input);
    }
}

function checkPhoneNo(input) {
    const strNum = input.value.toString();
  
    const pattern = /^0\d{9}$/; // Define regular expression pattern
    
    if (pattern.test(strNum)) { // Match the pattern against the string number
        showSuccess(input);
    } else {
        showError(input, `${getFieldName(input)} is invalid Purchase Date`);

    }
    var errocheckflag = 0;

function showError(input, message) {
    errocheckflag++;
    input.classList.add("erroInput");
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    small.innerText = message;

}

function showSuccess(input) {
    input.classList.remove("erroInput");
  }

function checkRequired(inputArr) {
    inputArr.forEach(function (input) {
      if (input.value.trim() === '') {
        showError(input, `${getFieldName(input)} is required`);
      }else{
        showSuccess(input);
      } 
    });
}

function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

}
///////////////////////////////////////////////////////////////////////////////