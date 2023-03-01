document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems1();
  });
  
  function ajax_getItems1(){
    const xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/total_tem","true");
  
      xhr.onload = function(){
          if(xhr.status == 200){  
              const res = xhr.responseText;
                const json = JSON.parse(res);
                console.log(json.length);

              var html = "";
                        //   " <div class='mainDisplay1'>";
                  html += "                 <span class='material-icons-sharp'>analytics</span>";                                
                  html += "                      <div class='middle'>";
                  html +="  <h2>"+json.length+"</h2>";
                  html +=" <h3>Total Templates</h3>";
                  html += "                    </div>";
                  html += "                     </div>";
                 
              document.querySelector(".mainDisplay1").innerHTML = html;
          }
      }
      xhr.send();      
  }
 


document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems2();
});
function ajax_getItems2(){
    const xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/approvel","true");
  
      xhr.onload = function(){
          if(xhr.status == 200){  
              const res1 = xhr.responseText;
              //  const json = JSON.parse(res);
              // console.log(json);
              // try {
                const json = JSON.parse(res1);
                console.log(json.length);

               
                   
                   
                          
                   
            // }
            // catch (error) {
                // console.log('Error parsing JSON:', error, res);
            // }
              var html = "";
              
            //   for (var i = 0; i < json.length; i++) {
            //     console.log(json.length);
                  // html += "<tbody>";
                //   html +=               " <div class='mainDisplay1'>";
                  html += "                 <span class='material-icons-sharp'>analytics</span>";                                
                  html += "                      <div class='middle'>";
                  html +="  <h2>"+json.length+"</h2>";
                  // console.log(json[i].id)
                  html +=" <h3>Pending approvals</h3>";
                
                  
                  html += "                    </div>";
                  html += "                     </div>";
                  // html += "                <td><"+json[i].type_name+"</td>";
                //   html +=               " <div class='mainDisplay2'>";
                //   html += "                 <span class='material-icons-sharp'>analytics</span>";                                
                //   html += "                      <div class='middle'>";
                //   html +="  <h2>"+json.length+"</h2>";
                  // console.log(json[i].id)
                //   html +=" <h3>Pending approvals</h3>";
                
                  
                //   html += "                    </div>";
                //   html += "                     </div>";
                
            //   }
              document.querySelector(".mainDisplay2").innerHTML = html;
          }
      }
      xhr.send();
     
      
  }
document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems3();
  });
  function ajax_getItems3(){
    const xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/complaint","true");
  
      xhr.onload = function(){
          if(xhr.status == 200){  
              const res = xhr.responseText;
              //  const json = JSON.parse(res);
              // console.log(json);
              // try {
                const json = JSON.parse(res);
                console.log(json.length);

               
                   
                   
                          
                   
            // }
            // catch (error) {
                // console.log('Error parsing JSON:', error, res);
            // }
              var html = "";
              
            //   for (var i = 0; i < json.length; i++) {
            //     console.log(json.length);
                  // html += "<tbody>";
                //   html +=               " <div class='mainDisplay1'>";
                  html += "                 <span class='material-icons-sharp'>analytics</span>";                                
                  html += "                      <div class='middle'>";
                  html +="  <h2>"+json.length+"</h2>";
                  // console.log(json[i].id)
                  html +=" <h3>Unhandled Complaints</h3>";
                
                  
                  html += "                    </div>";
                  html += "                     </div>";
                  // html += "                <td><"+json[i].type_name+"</td>";
                //   html +=               " <div class='mainDisplay2'>";
                //   html += "                 <span class='material-icons-sharp'>analytics</span>";                                
                //   html += "                      <div class='middle'>";
                //   html +="  <h2>"+json.length+"</h2>";
                  // console.log(json[i].id)
                //   html +=" <h3>Pending approvals</h3>";
                
                  
                //   html += "                    </div>";
                //   html += "                     </div>";
                
            //   }
              document.querySelector(".mainDisplay3").innerHTML = html;
          }
      }
      xhr.send();
     
      
  }
 