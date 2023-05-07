document.addEventListener("DOMContentLoaded", function () {
  ajax_getItems1();
  ajax_getItems2();
  ajax_getItems3();
  ajax_item_suggestions();
});

function ajax_getItems1() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/total_tem", "true");

  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      console.log(json.length);

      var html = "";
      html += "                 <span class='material-icons-sharp'>analytics</span>";
      html += "                      <div class='middle'>";
      html += "  <h2>" + json.length + "</h2>";
      html += " <h3>Total Templates</h3>";
      html += "                    </div>";
      html += "                     </div>";

      document.querySelector(".mainDisplay1").innerHTML = html;
    }
  }
  xhr.send();
}

function ajax_getItems2() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/approvel", "true");

  xhr.onload = function () {
    if (xhr.status == 200) {
      const res1 = xhr.responseText;
      const json = JSON.parse(res1);
      console.log(json.length);
      var html = "";

      html += "                 <span class='material-icons-sharp'>analytics</span>";
      html += "                      <div class='middle'>";
      html += "  <h2>" + json.length + "</h2>";
      html += " <h3>Pending approvals</h3>";
      html += "                    </div>";
      html += "                     </div>";
      nt.querySelector(".mainDisplay2").innerHTML = html;
    }
  }
  xhr.send();


}

function ajax_getItems3() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Moderatordashboard/complaint", "true");

  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      console.log(json.length);

      var html = "";

      html += "                 <span class='material-icons-sharp'>analytics</span>";
      html += "                      <div class='middle'>";
      html += "  <h2>" + json.length + "</h2>";
      html += " <h3>Unhandled Complaints</h3>";
      html += "                    </div>";
      html += "                     </div>";
      document.querySelector(".mainDisplay3").innerHTML = html;
    }
  }
  xhr.send();
}
function ajax_item_suggestions() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "" + ROOT + "/Moderator/Moderatordashboard/itemsuggestions", "TRUE");
  console.log(xhr);
  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      console.log(json);


      var html = "";
      for (var i = 0; i < json.length; i++) {
        console.log(json.length);
        html += "<tr>";
        html += "<td class='name'>" + json[i].itemtemplate_name + "</td>";
        html += "<td class='primary'>" + json[i].category_name + "</td>";
        html += "<td class='warning'>" + json[i].description + "</td>";
        html += " </tr>";
      }
      document.querySelector(".suggestion_table").innerHTML = html;
    }
  }
  xhr.send();
}