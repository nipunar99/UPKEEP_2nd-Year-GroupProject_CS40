document.addEventListener("DOMContentLoaded",function(){
  getCategory();
});

////////////////////////// SET CATEGORY SELECTOR //////////////////////////
const catDetails = null;
function getCategory(){
  const xhr = new XMLHttpRequest();
  xhr.open("GET",""+ROOT+"/Itemowner/Item/getCategoryDetails");
  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          setToCategarySelector(json);
      }
  }
  xhr.send();
}

const categary = document.getElementById("categary");// categary selector
function setToCategarySelector(json){
  var categaryTypes = [];
  for (var i = 0; i < json.length; i++) {
    categaryTypes.push(json[i].category_name);
  }
  (function loadCategaries (){
      for(let i=0; i<categaryTypes.length; i++){
          const option = document.createElement('option');
          option.textContent = categaryTypes[i];
          categary.appendChild(option);
      }
      categary.value = 'Ampara';
  })();

  const categary_id = document.getElementById('categary_id');
  categary.addEventListener('change', function() {
      for (var a = 0; a < json.length; a++) {
          if (categary.value === json[a].category_name) {
            // categary_id.value = json[a].category_id;
            getItemsTemplates(json[a].category_id);
          }
      }
  });

}
////////////////////////////////////////////////////////////////////////////

////////////////////////// SET Items SELECTOR //////////////////////////


function getItemsTemplates(catValue){
  const form = new FormData();
  form.append("category_id",catValue);
  form.append("parent_id",0);

  const xhr = new XMLHttpRequest();
  xhr.open("POST",""+ROOT+"/Itemowner/Item/getItemTemplatesDetails");
  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          setToItemSelector(json);
      }
  }

  xhr.send(form);
}

const itemtemplates = document.getElementById("itemtype");// Item selector
itemtemplates.innerHTML = ""; 

function setToItemSelector(json){
  var itemtemplatesArr = [];
  itemtemplates.innerHTML = ""; 
  for (var i = 0; i < json.length; i++) {
    itemtemplatesArr.push(json[i].itemtemplate_name);
  }
  itemtemplatesArr.push("Other");

  (function loadTemplates(){
      for(let i=0; i<itemtemplatesArr.length; i++){
          const option = document.createElement('option');
          option.textContent = itemtemplatesArr[i];
          itemtemplates.appendChild(option);
      }
      itemtemplates.value = '';
  })();

  const Item_id = document.getElementById('id');
  itemtemplates.addEventListener('change', function() {
      for (var a = 0; a < json.length; a++) {
          if (itemtemplates.value === json[a].itemtemplate_name) {
            Item_id.value = json[a].id;
            getSubItemsTemplates(json[a].id);
          }
      }
  });

}
////////////////////////////////////////////////////////////////////////////

////////////////////////// SET Items SELECTOR //////////////////////////


function getSubItemsTemplates(parent_id){
  const form = new FormData();
  form.append("parent_id",parent_id);

  const xhr = new XMLHttpRequest();
  xhr.open("POST",""+ROOT+"/Itemowner/Item/getItemTemplatesDetails");
  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json);
          if (json.length > 0){
            setToSubItemSelector(json);
            subIteminput.classList.remove("hidden");
          }else{
            subIteminput.classList.add("hidden");
          }
      }
  }

  xhr.send(form);
}

const subitemtemplates = document.getElementById("subitemtype");// Sub Item selector
function setToSubItemSelector(json){
  var itemtemplatesArr = [];
  subitemtemplates.innerHTML = ""; 
  for (var i = 0; i < json.length; i++) {
    itemtemplatesArr.push(json[i].itemtemplate_name);
  }
  itemtemplatesArr.push("Other");

  (function loadTemplates(){
      for(let i=0; i<itemtemplatesArr.length; i++){
          const option = document.createElement('option');
          option.textContent = itemtemplatesArr[i];
          subitemtemplates.appendChild(option);
      }
      subitemtemplates.value = '';
  })();

  const Item_id = document.getElementById('sub_id');
  subitemtemplates.addEventListener('change', function() {
      for (var a = 0; a < json.length; a++) {
          if (subitemtemplates.value === json[a].itemtemplate_name) {
            Item_id.value = json[a].id;
          }
      }
  });

}
////////////////////////////////////////////////////////////////////////////

const itemtypeselect = document.getElementById('itemtype');
const altertypeinput = document.getElementById('altertypeinput');
const subIteminput = document.getElementById('subIteminput');

const input = document.getElementById('altertypeinput');

itemtypeselect.addEventListener('change', function() {
  if (itemtypeselect.value === 'Other') {
    altertypeinput.classList.remove("hidden");
    subIteminput.classList.add("hidden");
  } else {
    altertypeinput.classList.add("hidden");
  }
});


//......................................................................

//...............................slide bar.......................
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener("click", () => {
    sideMenu.style.display = "block";
})
 closeBtn.addEventListener("click", () => {
    sideMenu.style.display = "none";
})
//...............................................................

// Add Item view
const addItem = document.querySelector(".addItem");
const modal = document.querySelector(".popupview1");
const modal1 = document.querySelector(".popupview2");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnCloseModal1 = document.querySelector(".closebtn1");



// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

const showModal1 = function () {
    console.log("showModal1");
    modal1.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");

};
const closeModal1 = function () {
    modal1.classList.add("hidden");
    overlay.classList.add("hidden");

};
// show modal click event
addItem.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal1);
overlay.addEventListener("click", closeModal);



/////////////////////////////////Valideation check functions //////////////////////////////////////////////

//validataion checking flag
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

function checkRange(input, min, max) {
    if (parseFloat(input.value) < min) {
      showError(input, `${getFieldName(input)} must be at least ${min}`);
    } else if (parseFloat(input.value) > max) {
      showError(input, `${getFieldName(input)} must be less than ${max} characters`);
    } else {
      showSuccess(input);
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

function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

///////////////////////////////////////////////////////////////////////////////
// //Ajax for add item details
document.getElementById("nextBtn").addEventListener('click',ajax_addItem);

const item_name = document.getElementById("item_name");
const itemtype = document.getElementById("itemtype");
const alter_type = document.getElementById("alter_type");
const brand = document.getElementById("brand");
const purchase_price = document.getElementById("purchase_price");
const purchase_date = document.getElementById("purchase_date");
const warrenty_date = document.getElementById("item_name");

function setSmallNull(){
    var smallTags = document.querySelectorAll('small');
    for (var i = 0; i < smallTags.length; i++) {
      smallTags[i].innerHTML = null;
    }
}

function ajax_addItem(e){
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("form_itemDetails");

    checkRequired([item_name, itemtype, brand]);
    checkRange(purchase_price, 0, 10000000);
    checkPurchaseDate(purchase_date);
    

    if(errocheckflag == 0){
        const form = new FormData(formItemDetails);
        form.append("action","addItem");
        form.delete('alter_type');
        // const urlparams = new URLSearchParams(form);

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/Item");
        // xhr.setRequestHeader("Content-Type","application/json");             
        // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        xhr.onload = function(){
            if(xhr.status == 200){
                const res = xhr.responseText;
                console.log(res);
            }
        }

        xhr.send(form);
        
        closeModal();
        ajax_getItems();
        formItemDetails.reset();
        showModal1();
    }
    
}


//.........................................Handling document inputs

function checkFileType(file){
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

document.getElementById("finishBtn").addEventListener('click',ajax_addDoc);

const billfile = document.querySelector('.billfile');
const Warrentyfile = document.querySelector('.Warrentyfile');
const manualfile = document.querySelector('.manualfile');

function ajax_addDoc(e){
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formdocfiles = document.getElementById("form_docFiles");


    checkFileType(billfile);
    checkFileType(Warrentyfile);
    checkFileType(manualfile);

    if(errocheckflag == 0){
        const form = new FormData(formdocfiles);
        console.log(form);
        form.append("action","adddoc");

        // const urlparams = new URLSearchParams(form);

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/Item");
        // xhr.setRequestHeader("Content-Type","application/json");             
        // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        xhr.onload = function(){
            if(xhr.status == 200){
                const res = xhr.responseText;
                console.log(res);
            }
        }

        xhr.send(form);
        
        closeModal1();
        ajax_getItems();
        
    }

}



document.addEventListener("DOMContentLoaded",function(){ajax_getItems()});

function ajax_getItems(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/Item/getAllItem");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";

            for (var a = 0; a < json.length; a++) {
                html += "<div style='position: relative;'>";
                html += "<div class='middle'>";
                html += "<div class='left'>";
                html += "<h3>"+json[a].item_name+"</h3>";
                html += "<h2>"+json[a].item_type+"</h1>";
                html += "</div>";
                html += "<div class='progress'>";
                html += "<img src='"+ROOT+"/assets/images/uploads/"+json[a].image+"'</div>";
                html += "</div></div>";
                html += "<div class='itemCard'>";
                html += "<form  method='post'>";
                html +="<input  style='display:none;' type='text' name='item_id' value='"+json[a].item_id+"'>";
                html +="<input  style='display:none;' type='text' name='owner_id'value='"+json[a].owner_id+"'>";
                html +="<div class='button moreBtn'> <input type='submit' value='More Details' style='background: navajowhite;background: none;'></div></form></div></div></div>";
            }
            document.querySelector(".insight").innerHTML = html;
        }
    }
    xhr.send();

}
