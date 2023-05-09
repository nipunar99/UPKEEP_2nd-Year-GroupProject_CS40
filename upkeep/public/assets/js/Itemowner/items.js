document.addEventListener("DOMContentLoaded",function(){
  getCategory();
});
////////////////////////Inportant elements///////////////////////////////////////////////////
const categary = document.getElementById("categary");// categary selector
const itemtemplates = document.getElementById("itemtype");// Item selector
const Item_id = document.getElementById('id');
const SubItem_id = document.getElementById('sub_id');

const subitemtemplates = document.getElementById("subitemtype");// Sub Item selector
const altertypeinput = document.getElementById('altertypeinput');

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

  const categoryid = document.getElementById('categoryid');
  categary.addEventListener('change', function() {
    setBothInputNull(); hideAlterTypeDiv(); 

    for (var a = 0; a < json.length; a++) {
        if (categary.value === json[a].category_name) {
          categoryid.value = json[a].category_id;
          getItemsTemplates(json[a].category_id);
        }
    }
  });

}

function setBothInputNull(){
  Item_id.value='';
  SubItem_id.value='';
  itemtemplates.innerHTML = ""; 
  subitemtemplates.innerHTML = ""; 
}
// categary.addEventListener('click', function() {
//   itemtemplates.innerHTML = ""; 
//   subitemtemplates.innerHTML = ""; 
// });
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

itemtemplates.innerHTML = ""; 

function setToItemSelector(json){
  // itemtemplates.innerHTML = ""; subitemtemplates.innerHTML = ""; // set null value of both templates selctor when changing category
  var itemtemplatesArr = [];
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

  itemtemplates.addEventListener('change', function() {
   setSubInputNull();
      for (var a = 0; a < json.length; a++) {
          if (itemtemplates.value === json[a].itemtemplate_name) {
            Item_id.value = json[a].id;
            getSubItemsTemplates(json[a].id);
          }
      }
  });

}
function setSubInputNull(){
  SubItem_id.value='';
  subitemtemplates.innerHTML = ""; 
}
// itemtemplates.addEventListener('click', function() { 
//   subitemtemplates.innerHTML = ""; 
// });
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

  subitemtemplates.addEventListener('change', function() {
      for (var a = 0; a < json.length; a++) {
          if (subitemtemplates.value === json[a].itemtemplate_name) {
            SubItem_id.value = json[a].id;
          }
      }
  });

}
////////////////////////////////////////////////////////////////////////////


//////////Alter type take div show and off/////////////////////////
const subItemDiv = document.getElementById('subIteminput'); //subIteminput Div 


itemtemplates.addEventListener('change', function() {
  if (itemtemplates.value === 'Other') {
    openAlterTypeDiv();
    subItemDiv.classList.add("hidden");
    Item_id.value=''; SubItem_id.value='';

  } else {
    hideAlterTypeDiv();
    subItemDiv.classList.remove("hidden");
  }
});

subitemtemplates.addEventListener('change', function() {
  if (subitemtemplates.value === 'Other') {
    openAlterTypeDiv();
    SubItem_id.value='';

  } else {
    hideAlterTypeDiv();
  }
});

function hideAlterTypeDiv(){
  altertypeinput.classList.add("hidden");
}
function openAlterTypeDiv(){
  altertypeinput.classList.remove("hidden");
}

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
    modal.classList.add("show");
    overlay.classList.add("show");
}; 

const showModal1 = function () {
    modal1.classList.add("show");
    overlay.classList.add("show");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.remove("show");
    overlay.classList.remove("show");

};
const closeModal1 = function () {
    modal1.classList.add("hidden");
    overlay.classList.remove("show");

};
// show modal click event
addItem.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal1);
overlay.addEventListener("click", closeModal);




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

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/Item");

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

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/Item");


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



//////////////////////Item Search//////////////////////

const searchInput = document.getElementById('searchItem');

    // Add an event listener for the input event
searchInput.addEventListener('input', (event) => {
  const searchTerm = event.target.value;
    console.log(searchTerm);
  const form = new FormData();
  form.append("item_name",searchTerm);
  const url = ""+ROOT+"/Itemowner/Item/searchItem";
  // const json = performSearch(form,url)

  performSearch(form, url).then(json => {
    // console.log(json);
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
  });

  
});
