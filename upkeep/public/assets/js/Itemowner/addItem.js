// // Dropdown functionalities
// const districtSelect = document.getElementById("itemtype");

// const district = ['Refrigerator','Air Conditioner','Washer','TV','Solor Panel',
// 'Projector','AMP','Home Theater', 'Other'];

// (function populateDistrict (){
//     for(let i=0; i<district.length; i++){
//         const option = document.createElement('option');
//         option.textContent = district[i];
//         districtSelect.appendChild(option);
//     }
//     districtSelect.value = 'Ampara';
// })();

// //Ajax for add item details

// document.getElementById("itemDetails").addEventListener('click',ajax_call);

// function ajax_call(e){
//     e.preventDefault();

//     const formItemDetails = document.getElementById("form_itemDetails");
//     const upfile = document.getElementById("upfile").files[0];

//     const form = new FormData(formItemDetails);
//     // form.delete("image");
//     // form.append("image",upfile);
//     const urlparams = new URLSearchParams(form);

    
//     const xhr = new XMLHttpRequest();

//     xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/Additem");
//     // xhr.setRequestHeader("Content-Type","application/json");             
//     // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

//     xhr.onload = function(){
//         if(xhr.status == 200){
//             const res = xhr.responseText;
//             console.log(res);
//         }
//     }


//     // 4 send request
//     // const urlparams = new URLSearchParams(form);
//     // const data = {name:'kamal'};
//     // const json = JSON.stringify(data);
//     // xhr.send(urlparams);
//     // const data = {name:"kavindu"};
//     // const json = JSON.stringify(data);
//     xhr.send(form);

// }