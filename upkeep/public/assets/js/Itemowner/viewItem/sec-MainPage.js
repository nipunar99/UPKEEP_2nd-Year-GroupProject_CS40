document.addEventListener("DOMContentLoaded",function(){
    ajax_getMaintenanceTemplatesforAnItem();
});
// Set the Item Template task to table
function ajax_getMaintenanceTemplatesforAnItem(){

    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/getMaintenanceTemplatesforAnItem");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            MaintainTemplateTaskjson=json;
            console.log(json);
            var html = "";

            if (json.length < 1){   
                html += "<tr><td>No data available</td></tr>";
            }else{
                for (var a = 0; a < json.length; a++) {
  
                        html +="<tr><td>"+json[a].description+"</td>";
                        html +="<td>"+json[a].sub_component+"</td>";
                        if(json[a].years =='0'){
                            html +="<td>";
                        }else{
                            html +="<td ><span class='warning'>"+json[a].years+"</span> <span class='warning'> years</span> ";
                        }
                        if(json[a].months =='0'){
                            html +="";
                        }else{                        
                            html +="<span class='warning'>"+json[a].months+"</span> <span class='warning'>months</span> ";
                        }
                        if(json[a].weeks =='0'){
                            html +="";
                        }else{
                            html +="<span class='warning'>"+json[a].weeks+"</span> <span class='warning'> weeks</span></td>";
                        }
                        if(json[a].status =="Approved"){
                            html +="<td class='success'>"+json[a].status+"</td>";
                        }else{
                            html +="<td class='danger'>"+json[a].status+"</td>";
                        }
                        html +="<td class='primary test '><button onclick='loadTemplateTableRowView("+a+")' class='tableAction'>Action</button></td></tr>";


                }
            }
            document.querySelector(".maintenanceTemplateListTbody").innerHTML = html;
        }
    }

    xhr.send();
}

// Load the Rows data as popupview
function loadTemplateTableRowView(num){
    overlay.classList.add("show");

    console.log(num);
    var html = "";
    
    html+= "<div  class='popupMaintaskTemplates"+(num+1)+ "  popupMaintask popupview show'><button onclick='unloadMaintaskTemplate("+(num+1)+")' class='closebtn'>&times;</button>";
                
    html+= "<div class='maintenaceview"+(num+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Description</h3><h2>"+MaintainTemplateTaskjson[num].description+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3> Sub Component</h3><h2>"+MaintainTemplateTaskjson[num].sub_component+"</h2>";
    html+= "<h2 id='template_task_id' style='display: none;'>"+MaintainTemplateTaskjson[num].task_ID+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub compontant Image</h3><img src='"+ROOT+"/assets/images/uploads/"+MaintainTemplateTaskjson[num].image+"'></div>";

    html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Sub component</h3>";

    if(MaintainTemplateTaskjson[num].years =='0'){
        html +="<h2>";
    }else{
        html +="<h2><span>"+MaintainTemplateTaskjson[num].years+"</span> <span> years</span> ";
    }
    if(MaintainTemplateTaskjson[num].months =='0'){
        html +="";
    }else{                        
        html +="<span>"+MaintainTemplateTaskjson[num].months+"</span> <span>months</span> ";
    }
    if(MaintainTemplateTaskjson[num].weeks =='0'){
        html +="</h2></div>";
    }else{
        html +="<span>"+MaintainTemplateTaskjson[num].weeks+"</span> <span> weeks</span></h2></div>";
    }

    html+= "<div class='maintenanceStatus success'><span class='material-icons-sharp'>error_outline</span><h2 class='success'>"+MaintainTemplateTaskjson[num].status+"</h2></div></div>";
    html+= "<div class='action_btn'><button class='edit' onclick='AddTaskToList("+num+")'>Add to list</button> </div> </div>";

    document.querySelector('.loadTemplateMaintenancepopup').innerHTML=html;

}

function unloadMaintaskTemplate(popup){
    element = ".popupMaintaskTemplates"+popup+"";
    
    document.querySelector(element).classList.remove("show");
    overlay.classList.remove("show");
}

const editformTemplateTask = document.getElementById("addingTemplateTaskPopup");// select template task form element

const TemplateTask_sub_component = document.getElementById('TemplateTask_sub_component');
const TemplateTask_description = document.getElementById('TemplateTask_description');
const TemplateTask_years = document.getElementById('TemplateTask_years');
const TemplateTask_months = document.getElementById('TemplateTask_months');
const TemplateTask_weeks = document.getElementById('TemplateTask_weeks');
const TemplateTask_strt_date = document.getElementById('TemplateTask_strt_date');
const TemplateTask_upfileimage = document.getElementById('TemplateTask_upfileimage');
const templatetaskid = document.getElementById('template_task_id');

function AddTaskToList(num){
    element = ".popupMaintaskTemplates"+(num+1)+"";
    document.querySelector(element).classList.remove("show");
    editformTemplateTask.classList.add("show");

    TemplateTask_sub_component.value = MaintainTemplateTaskjson[num].sub_component; 
    TemplateTask_description.value = MaintainTemplateTaskjson[num].description;
    TemplateTask_years.value = MaintainTemplateTaskjson[num].years;
    TemplateTask_months.value = MaintainTemplateTaskjson[num].months;
    TemplateTask_weeks.value = MaintainTemplateTaskjson[num].weeks;

}


//////////////////////// Adding process of TemplateTask ////////////////////////
const addTemplateTaskbtn = document.querySelector("#addTemplateTaskbtn");
addTemplateTaskbtn.addEventListener("click",addTemplateTask);

function addTemplateTask(e){
    e.preventDefault();
    ajax_addTemplateTask();
    ajax_getMaintenanceTemplatesforAnItem();
    ajax_getAllMaintenance();
    ajax_getAllReminders();
}
function ajax_addTemplateTask(){
    errocheckflag = 0;
    setSmallNull();

    checkRequired([TemplateTask_description,TemplateTask_strt_date]);

    if(TemplateTask_years.value=='' && months .value=='' && weeks.value==''){
        showError(months,"Please Enter a time");
    }else{
        if(TemplateTask_years.value!=''){
            checkRange(TemplateTask_years,0,50);
        }else{
            TemplateTask_years.value=0;
        }
        if(TemplateTask_months.value!=''){
            checkRange(months,0,12);
        }else{
            TemplateTask_months.value=0;
        }
        if(TemplateTask_weeks.value!=''){
            checkRange(TemplateTask_weeks,0,4);
        }else{
            TemplateTask_weeks.value=0;
        }
    }
    // checkImageType(TemplateTask_upfileimage);

    checkStartDate(TemplateTask_strt_date);
    
    if(errocheckflag == 0){
        const formMaintenanceDetails = document.getElementById("form_TemplateTaskDetails");

        const form = new FormData(formMaintenanceDetails);
        form.append("action", "addMaintenance");
        form.append("template_task_id", document.getElementById('template_task_id').innerHTML);

        const xhr = new XMLHttpRequest();
        xhr.open("POST",""+ROOT+"/Itemowner/ViewItem");

        xhr.onload = function(){
            if(xhr.status == 200){
                const res = xhr.responseText;
                console.log(res);
            }
        };

        xhr.send(form);

        closeModal();
        formMaintenanceDetails.reset();
    }

}