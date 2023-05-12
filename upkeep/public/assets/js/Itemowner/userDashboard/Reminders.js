function ajax_getAllReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/Userdashboard/getAllReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
            var html="";
            var i= 0;
            for( i=0; i<json.length; i++){
                html+= "<div onclick='loadupcomeview("+(i+1)+")'  class='maintenceBox' role='button'><h3>Maintenance Schedule</h3>";   
                html+= "<div><div class='middle'>";   
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h4>"+truncateString(json[i].description,27)+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span>";
                html+= "<h4>"+json[i].start_date+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h4>"+json[i].sub_component+"</h4></div>";
                html+= "<div class='maintenanceStatus'><span class='material-icons-sharp'>error_outline</span>";
                html+= "<h4>Pending</h4></div></div>";
                html+= "<img src='"+ROOT+"/assets/images/uploads/"+json[i].image+"'></div></div>";
                
                html+= "<div  class='upcomepopupview"+(i+1)+"  popupview'><button onclick='unloadupcomeview("+(i+1)+")' class='closebtn'>&times;</button>";
                
                html+= "<div class='maintenaceview"+(i+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Item name</h3><h2>"+json[i].item_name+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3>Maintenance task</h3><h2>"+json[i].description+"</h2>";
                html+= "<h2 id='itemid'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                html+= "<div class='action_btn'><button class='confirmbtn' onclick='completeTask("+(i+1)+")'>Complete</button>  <button class='deletebtn' id='deletebtn"+(i+1)+"' onclick='deleteTask("+(i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='description' id='' required  placeholder='Enter Description'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Maintenance Cost'>";
                html+= "            </div>";
                html+= "        <h2 id='taskID"+(i+1)+"' style='display: none;'>"+json[i].task_ID+"</h2>";// GET TASK ID
                html+= "        </div>";
                html+= "        <div onclick='submitTask("+(i+1)+")' class='button completebtn'>";
                html+= "            <input type='button' value='Done' class='completeTaskbtn confirmbtn action_btn'>";       
                html+= "        </div>";
                html+= "</form>";
                html+= "<div class='action_btn'>";
                html+= "    <button onclick='cancelcompleteTask("+(i+1)+")' class='cancelbtn'>Cancel</button>";
                html+= "</div> </div>";
                html+= "</div>";
            }
            document.querySelector(".maintenceBoxes").innerHTML=html;
            firstIndex = i;
        }

    }
    xhr.send();
}


function ajax_getAllOverdueReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/Userdashboard/getAllOverdueReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
            var html="";
            for(var i=0; i<json.length; i++){
                html+= "<div onclick='loadupcomeview("+(firstIndex+i+1)+")'  class='maintenceBox' role='button'><h3>Maintenance Schedule</h3>";   
                html+= "<div><div class='middle'>";   
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h4>"+truncateString(json[i].description,30)+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span>";
                html+= "<h4>"+json[i].start_date+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h4>"+json[i].sub_component+"</h4></div>";
                html+= "<div class='maintenanceStatus'><span class='material-icons-sharp'>error_outline</span>";
                html+= "<h4>Pending</h4></div></div>";
                html+= "<img src='"+ROOT+"/assets/images/uploads/"+json[i].image+"'></div></div>";
                
                html+= "<div  class='upcomepopupview"+(firstIndex+i+1)+" popupview'><button onclick='unloadupcomeview("+(firstIndex+i+1)+")' class='closebtn'>&times;</button>";
                
                html+= "<div class='maintenaceview"+(firstIndex+i+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Item name</h3><h2>"+json[i].item_name+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3>Maintenance task</h3><h2>"+json[i].description+"</h2>";
                html+= "<h2 id='itemid'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<h2 id='taskID"+(firstIndex+i+1)+"' style='display: none;' >"+json[i].task_ID+"</h2>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                // html+= "<h2 id='taskID"+(firstIndex+i+1)+"' style='display: none;'>"+json[i].task_ID+"</h2></div>";
                html+= "<div class='action_btn'><button class='confirmbtn' onclick='completeTask("+(firstIndex+i+1)+")'>Complete</button> <button class='deletebtn' id='deletebtn"+(firstIndex+i+1)+"' onclick='deleteTask("+(firstIndex+i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(firstIndex+i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(firstIndex+i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='description' id='' required  placeholder='Enter description'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Maintenance Cost'>";
                html+= "            </div>";
                html+= "        </div>";
                html+= "        <div onclick='submitTask("+(firstIndex+i+1)+")' class='button completebtn'>";
                html+= "            <input type='button' value='Done' class='completeTaskbtn'>";       
                html+= "        </div>";
                html+= "</form>";
                html+= "<div class='action_btn'>";  
                html+= "    <button onclick='cancelcompleteTask("+(firstIndex+i+1)+")' class='cancelbtn'>Cancel</button>";
                html+= "</div> </div>";
                html+= "</div>";
            }
            document.querySelector(".overduemaintenceBoxes").innerHTML=html;
        }

    }
    xhr.send();
}


function submitTask(number){ // Complete task handing fucntion
    submintFormNum = number;
    ajax_completeTask();
    ajax_generateReminder();
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
}

function ajax_completeTask() { // this is invoked by submitTask fucntion. submit complete task and delete 
    const formCompleteDetails = document.getElementById("form_completeTask"+submintFormNum+"");
    const itemid = document.getElementById("itemid").innerHTML;
    const taskId = document.getElementById("taskID"+submintFormNum+"").innerHTML;
    console.log(taskId);


    const form = new FormData(formCompleteDetails);
    form.append("action", "completeTask");
    form.append("item_id", itemid);
    form.append("task_ID", taskId);
    const xhr = new XMLHttpRequest();
    xhr.open("POST",""+ROOT+"/Itemowner/Userdashboard/completeTask");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };
    xhr.send(form);
    document.getElementById("deletebtn"+submintFormNum+"").click(); // Delete the form after complete task
    cancelcompleteTask(submintFormNum);
    unloadupcomeview(submintFormNum);
}

function ajax_generateReminder(){  // After complete the reminder then genereate a new reminder i=
    const taskId = document.getElementById("taskID"+submintFormNum+"").innerHTML;
    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/generateReminder/"+taskId+"",true);   

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send();
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
}


function deleteTask(number,id){ // controller delete opreations of reminder tasks
    deleteTaskNum = number;
    reminderid = id;
    ajax_deleteTask();
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
}

function ajax_deleteTask() { // send delete requset using ajax
    const form = new FormData();
    form.append("action","deleteTask");
    form.append("reminder_id",reminderid);
    const urlparams = new URLSearchParams(form);
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Itemowner/Userdashboard/deleteTask");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);
    unloadupcomeview(deleteTaskNum);
}


// Form viweing section
let element= "";

function loadupcomeview(popup){ // load view of reminder form
    element = ".upcomepopupview"+popup+"";
    
    document.querySelector(element).classList.add("show");
    overlay.classList.add("show");
}

function unloadupcomeview(popup){ // unload view of reminder 
    element = ".upcomepopupview"+popup+"";
    
    document.querySelector(element).classList.remove("show");
    overlay.classList.remove("show");
}


function completeTask(window){ // load complete task form
    
    document.querySelector(".maintenaceview"+window+"").classList.add("hidden");
    document.querySelector(".completeform"+window+"").classList.remove("hidden");

}

function cancelcompleteTask(window){ // unload complete task form
    document.querySelector(".maintenaceview"+window+"").classList.remove("hidden");
    document.querySelector(".completeform"+window+"").classList.add("hidden");

}
