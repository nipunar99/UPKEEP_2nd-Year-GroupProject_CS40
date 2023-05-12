// const listViewButton = document.querySelector('.list-view-button');
// const gridViewButton = document.querySelector('.grid-view-button');
const list = document.querySelector('ol');
//
// listViewButton.onclick = function () {
//     list.classList.remove('grid-view-filter');
//     list.classList.add('list-view-filter');
// }
//
// gridViewButton.onclick = function () {
//     list.classList.remove('list-view-filter');
//     list.classList.add('grid-view-filter');
// }



const gridViewButton = document.querySelector('.grid-view');
const listViewButton = document.querySelector('.list-view');

gridViewButton.addEventListener('click', () => {
    gridViewButton.classList.add('active');
    listViewButton.classList.remove('active');
    // Code to switch to grid view goes here
    list.classList.remove('list-view-filter');
    list.classList.add('grid-view-filter');
});

listViewButton.addEventListener('click', () => {
    gridViewButton.classList.remove('active');
    listViewButton.classList.add('active');
    // Code to switch to list view goes here
    list.classList.remove('grid-view-filter');
    list.classList.add('list-view-filter');
});




function addFilterOption() {
    var filterOption = document.createElement("div");
    filterOption.classList.add("filter-option");
    var addButton = document.createElement("button");
    addButton.classList.add("add-filter-btn");
    addButton.setAttribute("onclick", "addFilterOption()");
    addButton.textContent = "[+]";
    var label = document.createElement("label");
    label.textContent = "New Filter:";
    var select = document.createElement("select");
    select.innerHTML = `
    <option>All Options</option>
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
  `;
    filterOption.appendChild(addButton);
    filterOption.appendChild(label);
    filterOption.appendChild(select);
    var filterPanel = document.querySelector(".filter-panel");
    filterPanel.insertBefore(filterOption, filterPanel.lastChild);
}

const profileBtn = document.getElementById('profile');
const menuContainer = document.getElementById('menu-container');

profileBtn.addEventListener('click', () => {
    if (menuContainer.style.display === 'block') {
        menuContainer.style.bottom = '-150px';
        menuContainer.style.display = 'none';
    } else {
        menuContainer.style.display = 'block';
        setTimeout(() => {
            menuContainer.style.bottom = '40px';
        }, 10);
    }
});




// Define an object to store selected filt ers

var pagination = document.getElementsByClassName('pagination')[0];
var links = pagination.getElementsByTagName('a');

for (var i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function() {
        var current = pagination.getElementsByClassName('active')[0];
        current.className = current.className.replace(' active', '');
        this.className += ' active';
    });
}


//Buttons for the popup form
const applyButton_main = document.querySelectorAll('.apply-button');
const cancelButton = document.querySelectorAll('.popup .btn-cancel');
applyButton_main.forEach((button)=>{
    button.addEventListener('click',()=>{
        //clear form and errors
        const form = popups['apply_job'].querySelector('form');
        form.reset();
        clearErrors('apply_job');
        const jobid = button.closest('li').dataset.jobid;
        console.log(jobid);
        openPopup('apply_job');
        popups['apply_job'].querySelector('.popup-title').innerHTML = "Apply for Job #" +button.id;
        popups['apply_job'].dataset.jobId = jobid;
    });
});

cancelButton.forEach((button)=>{
    button.addEventListener('click',(e)=>{
        e.preventDefault();
        areYouSure('apply_job', 'Are you sure you want to cancel your application?');
    });
});

//event listner to apply job button in popup
popups['apply_job'].querySelector('#apply-job').addEventListener('click', (e)=>{
    e.preventDefault();
    // console.log('apply job');
    applyJob();
});

//function to apply job to back end
function applyJob(){
    // console.log('apply job');
    const jobId = popups['apply_job'].dataset.jobId;
    const form = popups['apply_job'].querySelector('form');
    const formData = new FormData(form);
    formData.append('job_id', jobId);
    formData.append('action', 'apply');
    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Technician/Findjobs/applyJob', true);
    xhr.onload = function () {
        res=JSON.parse(this.responseText);
        if (xhr.status === 200) {
            console.log(xhr.responseText)
            formSuccessfull('apply_job', 'Application Successful', 'Your application has been submitted successfully');
            const response = JSON.parse(xhr.responseText);
            console.log(response);
            setTimeout(() => {
                closePopup('apply_job');
            }, 3000);

        } else{
            console.log(xhr.responseText);
            showErrors(form.querySelector("#quote"),res.error);
        }
    }
    xhr.send(formData);
}