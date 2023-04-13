const districtSelect = document.getElementById("status");

const district = ['Approved','Pending'];

(function populateDistrict (){
    for(let i=0; i<district.length; i++){
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);
    }
    districtSelect.value = 'Select the status';
})();

