function myFunction(){
    
    window.location.href = "ViewComplaint";
    
}
function openComplaints(evt, complaintName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("table");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      console.log("a");
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
      console.log("a");
    }
    document.getElementById(complaintName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  
  document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems();
  });
  
  function ajax_getItems(){
    const xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Complaint/complaint","true");
  
      xhr.onload = function(){
          if(xhr.status == 200){  
              const res = xhr.responseText;
              //  const json = JSON.parse(res);
              // console.log(json);
              // try {
                const json = JSON.parse(res);
                console.log(json);
            // }
            // catch (error) {
                // console.log('Error parsing JSON:', error, res);
            // }
              var html = "";
              
              for (var i = 0; i < json.length; i++) {
                  // html += "<tbody>";
                //   html +=

                  html +=               "<tr class='show-r-1' role='button'>";
                  html += "                <td>"+json[i].technician_name+"";                                
                  html += "                     </td>";
                  html +="<td>"+json[i].category+"";
                  // console.log(json[i].id);
                  html +="</td>";
                  html += "                        <td class='level'>"+json[i].status+"";
                  
                  html += "                    </td>";
                //   html += "                     </td>";
                  // html += "                <td><"+json[i].type_name+"</td>";
                  html += "                        <td>"+json[i].date+"</td>";
                  html += " <td><button class='send'onclick='myFunction()'><span class='material-icons-sharp'>view_list</span></button>&nbsp;<button class='send' onclick='myFunctionD()'><span class='material-icons-sharp'>delete</span></button></td>";
                 // if (json[i].status == 'Approved') {
                    // console.log(json[i].status);
                //     html += "class='success'>";
                //   } else {
                  
//                     // console.log(json[i].status);
//                     html+= "class = 'danger'>";
//                   }
//                   html += ""+json[i].status+"</td>";
//                   html += "                        <td>"+json[i].description+"</td>";        
//                   html += "                       <td>";
//                  html+=" <div class='more'>  "; 
//                  var id = encodeURIComponent(json[i].id);
//   var name = encodeURIComponent(json[i].itemtemplate_name);                        
//                   // html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/?param1="+json[i].id+"+&param2="+json[i].itemtemplate_name+"'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button><span class='material-icons-sharp'>delete</span></button></div>";
//                  html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/?id=id'&name= name'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button><span class='material-icons-sharp'>delete</span></button></div>"
//                   html += "                </div>";
                  html += "                </tr>";
                //   html += "                <tr>";
                //   var id = json[i].id;
                
              }
              document.querySelector(".tb").innerHTML = html;
          }
      }
      xhr.send();
     
      
  }