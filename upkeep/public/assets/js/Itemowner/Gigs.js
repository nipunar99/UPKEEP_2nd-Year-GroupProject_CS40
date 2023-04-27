document.addEventListener("DOMContentLoaded",function(){
    ajax_getItems();
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
                html += "                    <div class='profile-pic'>";
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