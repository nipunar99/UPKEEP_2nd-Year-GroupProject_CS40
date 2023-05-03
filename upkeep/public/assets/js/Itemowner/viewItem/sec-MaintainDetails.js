const editReminderForm = document.querySelector(".editReminderForm");

/////////// load Ongoing Maintenance///////////////////////

function loadOngoingReminderList(){
    var html = "";
    if(ongoingReminders!=null){ 
        for (var a = 0; a < ongoingReminders.length; a++) {
    
            html +="<tr><td>"+ongoingReminders[a].description+"</td>";
            html +="<td>"+ongoingReminders[a].sub_component+"</td>";
            html +="<td class='warning' >"+ongoingReminders[a].start_date+"</td>";
            html +="<td class='danger'>"+ongoingReminders[a].reminder_status+"</td>";
            html +="<td class='primary test'><button onclick='reminderTableRowView("+a+",1)' class='tableAction'>Action</button></td></tr>";

        }
        document.querySelector(".ongoingReminderListTbody").innerHTML = html;
    }

}
////////////////////////////////////////////////////////////


///////////load Ongoing Maintenance/////////////////////////

function loadOverdueReminderList(){
    var html = "";
    if(overdueReminders!=null){ 
        for (var a = 0; a < overdueReminders.length; a++) {
    
            html +="<tr><td>"+overdueReminders[a].description+"</td>";
            html +="<td>"+overdueReminders[a].sub_component+"</td>";
            html +="<td class='warning' >"+overdueReminders[a].start_date+"</td>";
            html +="<td class='danger'>"+overdueReminders[a].reminder_status+"</td>";
            html +="<td class='primary test'><button onclick='reminderTableRowView("+a+",2)' class='tableAction'>Action</button></td></tr>";

        }
        document.querySelector(".overdueReminderListTbody").innerHTML = html;
    }

}

////////////////////////////////////////////////////////////

function reminderTableRowView(num,status){
    overlay.classList.remove("hidden");
    var json = "";
    var argEdit = "";
    if (status == 1) {
        json = ongoingReminders;
        argEdit="("+(num+1)+",1)";
    }else{
        json = overdueReminders;
        argEdit="("+(num+1)+",2)";
    }
    var html = "";
    
    html+= "<div  class='popupMaintask"+(num+1)+ " popupMaintask popupview'><button onclick='unloadMaintask("+(num+1)+")' class='closebtn'>&times;</button>";
                
    html+= "<div class='maintenaceview"+(num+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Description</h3><h2>"+json[num].description+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[num].start_date+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3> Sub Component</h3><h2>"+json[num].sub_component+"</h2>";
    html+= "<h2 id='itemid'style='display: none;'>"+json[num].item_id+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>construction</span><h3> Sub Component Image</h3><img src='"+ROOT+"/assets/images/uploads/"+json[num].image+"'></div>";
    html+= "<div class='maintenanceStatus success'><span class='material-icons-sharp'>error_outline</span><h3> Reminder Status</h3><h2 class='success'>"+json[num].reminder_status+"</h2></div></div>";
    html+= "<div class='action_btn'><button class='edit' onclick='editReminder"+argEdit+"'>Edit</button>  <button class='cancel' onclick='ajax_deleteReminder("+json[num].reminder_id+","+(num+1)+")'>Delete</button> </div> </div>";

    document.querySelector('.loadDivViews').innerHTML=html;
}

//Get element of edit form
const reminder_description= document.getElementById("reminder_description");
const reminder_sub_component= document.getElementById("reminder_sub_component");
const reminder_upfile= document.getElementById("reminder_upfile");
const reminder_startDate= document.getElementById("reminder_startDate");
const reminder_id= document.getElementById("reminder_id");
document.getElementById("updateReminderbtn").addEventListener("click",ajax_editReminder);

function editReminder(num,status){
    var element = ".popupMaintask"+num+"";
    document.querySelector(element).classList.add("hidden");
    editReminderForm.classList.remove("hidden");

    var json = "";
    if (status == 1) {
        json = ongoingReminders;
    }else{
        json = overdueReminders;
    }
    
    // set previous value
    reminder_description.value =json[num-1].description;
    reminder_sub_component.value =json[num-1].sub_component;
    reminder_startDate.value =json[num-1].start_date;
    reminder_id.value =json[num-1].reminder_id;
}
// function updateReminder(){}
function ajax_editReminder(e){
    const form_editReminder = document.getElementById("form_editReminder");
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    if(reminder_upfile.value!=""){
        checkImageType(reminder_upfile);
    }
    checkStartDate(reminder_startDate);

    if(errocheckflag == 0){
        const form = new FormData(form_editReminder);
        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/ViewItem/updateReminder");

        xhr.onload = function(){
            if(xhr.status == 200){
                const res = xhr.responseText;
                console.log(res);
            }
        }

        xhr.send(form);
        closeModal();
        form_editReminder.reset();

    }
}

// Delete reminders

function ajax_deleteReminder(id,formNum) {
    const form = new FormData();
    form.append("action","deleteTask");
    form.append("reminder_id",id);
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
    unloadMaintask(formNum);
    
}