
const form = document.querySelector('#myform');
const input = document.querySelector('#category');
const inputs = document.querySelector('#name');
const statu = document.querySelector('#status');
const description = document.querySelector('#des_id');

form.addEventListener('submit', function (event) {

  event.preventDefault();
  const category = input.value;
  const text = inputs.value;
  const stat = statu.value;
  const descrip = description.value;


  if (!/^[a-zA-Z\s]+$/.test(text)) {
    alert('Please enter only letters and spaces.');
    return;
  }
  
  if (category === "") {
    alert('Please select the category');
    return;
  }
  if (stat === "") {
    alert('Please select the status');
    return;
  }
  if (descrip.trim() === '') {
    alert('please enter description');
    return;
  }
  form.submit();
});
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

