const form = document.querySelector('#myform');
const place = document.querySelector('#plc');
const city = document.querySelector('#city');
const iframe = document.querySelector('#iframe');
const category_selection = document.querySelector('#category');

// form.addEventListener('submit', function (event) {
  
//     event.preventDefault();
//     const plc = place.value;
//     const cities = city.value;
//     const iframes = iframe.value;

//     // check if input contains only letters
//     if (!/^[a-zA-Z]+$/.test(cities)) {
//       alert('Please enter only letters.');
//       return;
//     }
//     if(plc.trim() === ''){
//         alert('please enter place');
//         return;
//       }
  
//   if(iframes.trim() === ''){
//     alert('please enter iframe');
//     return;
//   }
//   // Get the source of the iframe
// var src = iframe.src;

// // Define a regular expression to match the required pattern
// var pattern = /^https:\/\/www\.google\.com\/maps\/embed\?.*$/;

// // Check if the source matches the pattern
// // if (pattern.test(src)) {
// //   console.log('Valid iframe link');
// // } else {
// //   alert('Invalid iframe link');
// //   return;
// // }
//   form.submit();
// });
const categorytSelect = document.getElementById("category");

const Category = ['Electronics', 'Appliances', 'Tools and equipment', 'Vehicles', 'Furniture', 'Home and garden', 'Other'];

(function populateDistrict() {
  for (let i = 0; i < Category.length; i++) {
    const option = document.createElement('option');
    option.textContent = Category[i];
    categorytSelect.appendChild(option);
  }
  categorytSelect.value = 'Select category';
})();

// validation 
//validate functions
function setSmallNull() {
  var smallTags = document.querySelectorAll('small');
  for (var i = 0; i < smallTags.length; i++) {
      smallTags[i].innerHTML = null;
  }
}
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
      }

      else {
          showSuccess(input);
      }
  });
}
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//new itemtemplate form submission
document.getElementById("submitBtn").addEventListener('click', ajax_addItem);
function ajax_addItem(e) {
  errocheckflag = 0;
  e.preventDefault();
  setSmallNull();
  const formItemDetails = document.getElementById("myform");
  checkRequired([place, city, iframe,category_selection]);
  if (errocheckflag == 0) {
      const form = new FormData(formItemDetails);
      form.append("action", "addDisposal_places");

      // form.delete('alter_type');
      // const urlparams = new URLSearchParams(form);

      // console.log(form);
      const xhr = new XMLHttpRequest();

      xhr.open("POST", "" + ROOT + "/Moderator/AddDisposal_places/");
      // xhr.setRequestHeader("Content-Type","application/json");             
      // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

      xhr.onload = function () {
          if (xhr.status == 200) {
              const res = xhr.responseText;
              console.log(res);
          }
      }

      xhr.send(form);
     
  }

}