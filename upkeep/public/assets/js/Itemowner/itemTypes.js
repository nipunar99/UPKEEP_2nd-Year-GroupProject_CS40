const districtSelect = document.getElementById("itemtype");

const district = ['Refrigerator','Air Conditioner','Washer','TV','Solor Panel',
'Projector','AMP','Home Theater', 'Other'];

(function populateDistrict (){
    for(let i=0; i<district.length; i++){
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);
    }
    districtSelect.value = 'Ampara';
})();