const form = document.querySelector('#myform');
const place = document.querySelector('#plc');
const city = document.querySelector('#city');
const iframe = document.querySelector('#iframe');


form.addEventListener('submit', function (event) {
  
    event.preventDefault();
    const plc = place.value;
    const cities = city.value;
    const iframes = iframe.value;

    // check if input contains only letters
    if (!/^[a-zA-Z]+$/.test(cities)) {
      alert('Please enter only letters.');
      return;
    }
    if(plc.trim() === ''){
        alert('please enter place');
        return;
      }
  
  if(iframes.trim() === ''){
    alert('please enter iframe');
    return;
  }
  // Get the source of the iframe
var src = iframe.src;

// Define a regular expression to match the required pattern
var pattern = /^https:\/\/www\.google\.com\/maps\/embed\?.*$/;

// Check if the source matches the pattern
if (pattern.test(src)) {
  console.log('Valid iframe link');
} else {
  alert('Invalid iframe link');
  return;
}
  form.submit();
});