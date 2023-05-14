document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems();
    getCategory();
    loadCitiesJson();
    getAddress();
    loadItems();

});
// document.addEventListener("DOMContentLoaded",function(){loadItems();loadCitiesJson();getAddress()});

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

//..........................Ajax function for load gigs......................................

function ajax_getItems(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET","http://localhost/upkeep/upkeep/public/Itemowner/TechnicianGigs/findAllGigs");

    xhr.onload = function(){
        if(xhr.status == 200){  
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
            var html = "";

            for (var i = 0; i < json.length; i++) {
                html += "<div class='gig-card'>";
                html += "            <div class='middle'>";
                html += "                <div class='technician-profile'>";                                
                html += "                    <div class='profilepic'>";
                html += "                        <img src='http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg'>";
                html += "                    </div>";
                html += "                    <div class='profile-info'>";
                html += "                        <h3><span>"+json[i].first_name+"<span/> <span>"+json[i].last_name+"</span></h3>";
                html += "                        <p>No Reviews Yet |</p> ";
                html += "                        <span class='fa fa-star checked'></span>";        
                html += "                        <span class='fa fa-star'></span>   ";                         
                html += "                    </div>";
                html += "                </div>";
                html += "                <div class='gigDesc'><h2>"+json[i].title+"</h2></div>";
                html += "                <div class='worktagsContainer'>";
                let tags = JSON.parse(json[i].items);
                for(var j = 0; j < tags.length; j++) {
                    html += "<h3>"+tags[j]+"</h3>"
                    // console.log(tags[j]);
                }                
                html +=                 "</div>";
                html += "                <div class='location'><span class='material-icons-sharp'>location_on</span><h3>"+json[i].location+"</h3></div>";
                html += "            </div>";
                html += "            <div class='action-bar'>";
                html += "                <a href='http://localhost/upkeep/upkeep/public/itemowner/ViewGig/selectGig/"+json[i].gig_id+"' class='view'>View</a>";
                html += "            </div>";
                html += "        </div>";
            }
            document.querySelector(".insight").innerHTML = html;
        }
    }
    xhr.send();

}


const categary = document.getElementById("categary");// categary selector
const itemtemplates = document.getElementById("itemtype");// Item selector

////////////////////////// SET CATEGORY SELECTOR //////////////////////////
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
  })();

  categary.addEventListener('change', function() {
    setBothInputNull();

    for (var a = 0; a < json.length; a++) {
        if (categary.value === json[a].category_name) {
          getItemsTemplates(json[a].category_id);
        }
    }
  });

}

function setBothInputNull(){
  itemtemplates.innerHTML = ""; 
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

itemtemplates.innerHTML = ""; 

function setToItemSelector(json){
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

}


// cities json file................................................................

var districtNames;
function loadCitiesJson(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/UpKeep/upkeep/public/assets/js/Itemowner/cities.json', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const res = xhr.responseText;
            citiesjson = JSON.parse(res);
            districtNames = Object.keys(citiesjson);
            console.log(districtNames.length);

            loadCitiestoSelect();
        }
      };
    xhr.send();
      
}

// cities json file................................................................

// Set data form elements (district and cites)......................................................................

const districtSelect1 = document.getElementById('district1');
const inputcity1 = document.getElementById('city1');

function loadCitiestoSelect(){
  districtNames = Object.keys(citiesjson);

  const districtSelect = document.getElementById('district');

  for (var a = 0; a < districtNames.length; a++) {
      const option = document.createElement('option');
      option.textContent =districtNames[a];
      districtSelect.appendChild(option);
  }
  for (var a = 0; a < districtNames.length; a++) {
    const option = document.createElement('option');
    option.textContent =districtNames[a];
    districtSelect1.appendChild(option);
}
}

const districtSelect = document.getElementById('district');
const inputcity = document.getElementById('city');

districtSelect.addEventListener('input', function() {
  inputcity.innerHTML = '';
  var district = districtSelect.value;
  var cities = citiesjson[district].cities;
  
  for (var a = 0; a < cities.length; a++) {
      const option = document.createElement('option');
      option.textContent =cities[a];
      inputcity.appendChild(option);
  }
});

districtSelect1.addEventListener('input', function() {
  inputcity1.innerHTML = '';
  var district = districtSelect1.value;
  var cities = citiesjson[district].cities;
  
  for (var a = 0; a < cities.length; a++) {
      const option = document.createElement('option');
      option.textContent =cities[a];
      inputcity1.appendChild(option);
  }
});

// Set data form elements (district and cites)......................................................................

////////////////////////////Load Delicarymthods//////////////////////////
const delivarymethod = document.getElementById("delivarymethod");

const values = ['Home Visit','Workshop Visit','Other'];

(function populateValues (){
    for(let i=0; i<values.length; i++){
        const option = document.createElement('option');
        option.textContent = values[i];
        delivarymethod.appendChild(option);
    }
    delivarymethod.value = 'others';
})();

//////////////////////////////////////////////////////////////////////////

///.................................Filter Gigs.................................///

function filterGigs(){
  let items = document.getElementById('itemtype').value;
  let location = document.getElementById('city1').value;
  if(items !="" && location!=""){
    const form = new FormData();
    form.append("items",items);
    form.append("location",location);

    const xhr = new XMLHttpRequest();
    xhr.open("POST",""+ROOT+"/Itemowner/TechnicianGigs/filterGigs");
    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
            var html = "";
            if(json.length>0){
              for (var i = 0; i < json.length; i++) {
                  html += "<div class='gig-card'>";
                  html += "            <div class='middle'>";
                  html += "                <div class='technician-profile'>";                                
                  html += "                    <div class='profilepic'>";
                  html += "                        <img src='http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg'>";
                  html += "                    </div>";
                  html += "                    <div class='profile-info'>";
                  html += "                        <h3><span>"+json[i].first_name+"<span/> <span>"+json[i].last_name+"</span></h3>";
                  html += "                        <p>No Reviews Yet |</p> ";
                  html += "                        <span class='fa fa-star checked'></span>";        
                  html += "                        <span class='fa fa-star'></span>   ";                         
                  html += "                    </div>";
                  html += "                </div>";
                  html += "                <div class='gigDesc'><h2>"+json[i].title+"</h2></div>";
                  html += "                <div class='worktagsContainer'>";
                  let tags = JSON.parse(json[i].items);
                  for(var j = 0; j < tags.length; j++) {
                      html += "<h3>"+tags[j]+"</h3>"
                      // console.log(tags[j]);
                  }                
                  html +=                 "</div>";
                  html += "                <div class='location'><span class='material-icons-sharp'>location_on</span><h3>"+json[i].location+"</h3></div>";
                  html += "            </div>";
                  html += "            <div class='action-bar'>";
                  html += "                <a href='http://localhost/upkeep/upkeep/public/itemowner/ViewGig/selectGig/"+json[i].gig_id+"' class='view'>View</a>";
                  html += "            </div>";
                  html += "        </div>";
              }
              document.querySelector(".insight").innerHTML = html;
            }else{
              document.querySelector(".insight").innerHTML = html;

            }
              
        }
    }

    xhr.send(form);
  }

}

const address = document.getElementById("address");
const district = document.getElementById("district");
const city = document.getElementById("city");
const addressid = document.getElementById("addressid");

function getAddress() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/upkeep/upkeep/public/Itemowner/ViewGig/getAddresses', true);
    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            json = JSON.parse(res);

            districtSelect.innerHTML = ''; // initaly set districtSelect empty
            const option1 = document.createElement('option');
            const option2 = document.createElement('option');
            option1.textContent =json[0].district;
            option2.textContent =json[0].city;
            
            address.value = json[0].address;
            districtSelect.appendChild(option1);
            inputcity.appendChild(option2);
            addressid.value = json[0].address_id;
        }
    }
    xhr.send();
}

address.addEventListener('input',function() {
    loadCitiesJson();
    addressid.value ='';

});

function loadItems(){
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'http://localhost/upkeep/upkeep/public/Itemowner/ViewGig/getAllItem', true);
  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          itemsjson = JSON.parse(res);
          const itemNameSelect = document.getElementById('itemname');

          for (var a = 0; a < itemsjson.length; a++) {
              const option = document.createElement('option');
              option.textContent = itemsjson[a].item_name;
              itemNameSelect.appendChild(option);
          }
          itemNameSelect.value = "";
      }
  }
  xhr.send();
    
}

// Set data form elements (item_name and Item_id)......................................................................

const itemNameSelect = document.getElementById('itemname');
const inputItemId = document.getElementById('itemid');

itemNameSelect.addEventListener('change', function() {
    for (var a = 0; a < itemsjson.length; a++) {
        if (itemNameSelect.value === itemsjson[a].item_name) {
            inputItemId.value = itemsjson[a].item_id;
        }
    }
});
// Set data form elements (item_name and Item_id)......................................................................



// Show and close Public form
const overlay = document.querySelector(".overlayview");
const popupview = document.querySelector(".popupview");
const closebtn = document.querySelector(".closebtn");

function pubicJobForm(){
  overlay.classList.add("show");
  popupview.classList.add("show");
}

closebtn.addEventListener("click", function(){
    overlay.classList.remove("show");
    popupview.classList.remove("show");
});


// Post the public job


function submitPost(e){ 
  e.preventDefault();
  ajax_submitPost();
}
const description = document.getElementById('description');
const jobtype = document.getElementById('jobtype');
const schedule_date = document.getElementById("schedule_date");
const contact_no = document.getElementById("contact_no");

function ajax_submitPost(){
  setSmallNull();
  checkRequired([itemNameSelect,description,delivarymethod,jobtype,schedule_date,contact_no,address,district,city]);
  checkFutureDate(schedule_date);
  checkPhoneNo(contact_no);

  if(errocheckflag == 0){
      const formCompleteDetails = document.getElementById("form_JobDetails");
      const form = new FormData(formCompleteDetails);
      form.append("action", "addJob");
      const xhr = new XMLHttpRequest();
      xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/TechnicianGigs/postJob");

      xhr.onload = function(){
          if(xhr.status == 200){
              const res = xhr.responseText;
              console.log(res);
          }
      };

      xhr.send(form);

      document.querySelector(".closebtn").click();
  }
}
