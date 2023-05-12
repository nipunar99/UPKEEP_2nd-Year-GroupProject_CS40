// Header dropdown
const profile = document.querySelector('.profile');
profile.addEventListener('click', function () {
    document.querySelector('.dropdown-content').classList.toggle('active');
});


// Notification tab js

const tabs = document.querySelectorAll(".tab-item");
const panes = document.querySelectorAll(".tab-pane");

const tabActive = document.querySelector(".tab-item.active");
const line = document.querySelector(".tabs .line");

function openNav() {
    document.getElementById("mySidenav").classList.remove('hiddenNotify');
    // document.getElementById('overlay').classList.remove('hidden');
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").classList.add('hiddenNotify');
    // document.getElementById('overlay').classList.add('hidden');
}


requestIdleCallback(function () {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
});

tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function () {
        document.querySelector(".tab-item.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
});

function truncateString(str, x) {
    console.log("truncateString");
    if (str.length > x) {
      return str.slice(0, x)+". . .";
    } else {
      return str;
    }
}
  
function loadDataToSelector (arry ,input){
    for(let i=0; i<arry.length; i++){
        const option = document.createElement('option');
        option.textContent = arry[i];
        input.appendChild(option);
    }
}


//////////////////Dynamic search 

function performSearch(form,url){
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url);
    
        xhr.onload = function () {
          if (xhr.status === 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            // console.log(json);
            resolve(json);
          } 
        };
    
        xhr.send(form);
      });
}