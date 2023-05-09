document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems();
    getCategory();

});

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
                let tags = JSON.parse(json[i].work_tags);
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

//   itemtemplates.addEventListener('change', function() {
// //    setSubInputNull();
//       for (var a = 0; a < json.length; a++) {
//           if (itemtemplates.value === json[a].itemtemplate_name) {
//             Item_id.value = json[a].id;
//             getSubItemsTemplates(json[a].id);
//           }
//       }
//   });

}