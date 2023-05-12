var errocheckflag = 0;

const form = document.querySelector('#myform');
const Input = document.querySelector('#category');
const inputs = document.querySelector('#name');
const statu = document.querySelector('#status');
const description = document.querySelector('#des_id');

// form.addEventListener('submit', function (event) {

//   event.preventDefault();
//   const category = input.value;
//   const text = inputs.value;
//   const stat = statu.value;
//   const descrip = description.value;


//   if (!/^[a-zA-Z\s]+$/.test(text)) {
//     alert('Please enter only letters and spaces.');
//     return;
//   }
  
//   if (category === "") {
//     alert('Please select the category');
//     return;
//   }
//   if (stat === "") {
//     alert('Please select the status');
//     return;
//   }
//   if (descrip.trim() === '') {
//     alert('please enter description');
//     return;
//   }
//   form.submit();
// });
const districtSelect = document.getElementById("status");

const district = ['Approved', 'Pending'];

(function populateDistrict() {
  for (let i = 0; i < district.length; i++) {
    const option = document.createElement('option');
    option.textContent = district[i];
    districtSelect.appendChild(option);
  }
  districtSelect.value = 'Select the status';
})();

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
      if (input == inputs) {
          if (!/^[a-zA-Z\s]+$/.test(input.value)) {
              showError(inputs, `only letters and spaces`);
          }
      }
    
      else {
          showSuccess(input);
      }
  });
}
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
document.getElementById("submitBtn").addEventListener('click', ajax_addItem);
function ajax_addItem(e) {
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("myform");

    checkRequired([inputs, Input, description,statu]);
    console.log(errocheckflag);

    if (errocheckflag == 0) {
        const form = new FormData(formItemDetails);
        form.append("action", "addItem");
        
        const xhr = new XMLHttpRequest();
        // console.log(xhr);
        xhr.open("POST", "" + ROOT + "/Moderator/Additemtemplate/");

        xhr.onload = function () {
            if (xhr.status == 200) {
                const res = xhr.responseText;
                // console.log(res);
            }
        }
        xhr.send(form);
      
    }

}
