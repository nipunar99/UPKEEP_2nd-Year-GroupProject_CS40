// "use strict";

// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnShowRow1 = document.querySelector(".card-1");
const btnShowRow2 = document.querySelector(".card-2");
const btnShowRow3 = document.querySelector(".card-3");
const btnShowRow4 = document.querySelector(".card-4");



// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};


// show modal click event
btnShowRow1.addEventListener("click", showModal);
btnShowRow2.addEventListener("click", showModal);
btnShowRow3.addEventListener("click", showModal);
btnShowRow4.addEventListener("click", showModal);




// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);
// document.addEventListener("DOMContentLoaded",function(){
//     ajax_getItems();
//   });
  // function ajax_getItems(){
  //   const xhr = new XMLHttpRequest();
  // xhr.open("","http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/","true");
  
  //     xhr.onload = function(){
  //         if(xhr.status == 200){  
  //             const res = xhr.responseText;
  //             //  const json = JSON.parse(res);
  //             // console.log(json);
  //             // try {
  //               const json = JSON.parse(res);
  //               console.log(json);
  //           // }
  //           // catch (error) {
  //               // console.log('Error parsing JSON:', error, res);
  //           // }
  //             var html = "";
              
  //             for (var i = 0; i < json.length; i++) {
  //                 // html += "<tbody>";
  //                 html +=               "<div class='view-1'>";
  //                 html += "                <div class='img'>";                                
  //                 html += "                     <img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/"+json[i].image+"'>";
                  
  //                 // console.log(json[i].id);
  //                 html +="</div>";
  //                 html += "   <div class='view-1-text'>                    ";
                  
  //                 html += "                      <h2>"+json[i].itemtemplate_name+"</h2>";
  //                 html += "                     <div class='name'>";
  //                 // html += "                <td><"+json[i].type_name+"</td>";
  //                 html += "                          <h5>Template Name</h5>";
  //                 html += "<p>"+json[i].type_name+"</p>";
                
  //                 html += "</div>";
  //                 html += "                        <div class='type'>";        
  //                 html += "                        <h5>Item Type</h5>";
  //                html+=" <p>"+json[i].type_name+"</p> ";                         
  //               //  html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/app/Moderator/Item/viewItem/"+json[i].id+"'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button><span class='material-icons-sharp'>delete</span></button></div>";
  //                 html += "                </div>";
  //                 html += "                </div>";
  //               //  html += "                <tr>";
                
  //             }
  //             document.querySelector(".insight").innerHTML = html;
  //         }
  //     }
  //     xhr.send();
     
      
  // }
 
   
    
      
    
    
          
            
       
        
           
            
       
       
  

