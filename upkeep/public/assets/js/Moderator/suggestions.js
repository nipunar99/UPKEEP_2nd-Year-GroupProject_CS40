document.addEventListener("DOMContentLoaded", function () {
    ajax_getSuggestionItems();
  
});

function ajax_getSuggestionItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST","" + ROOT + "/Moderator/Suggestion/getItemSuggestions", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            itemtemplateDetails = JSON.parse(res);
            var html = "";

            for (var i = 0; i < json.length; i++) {
                console.log(json.length);

                html += "<div class='card-main' role='button'>";
                html += "<a href='"+ROOT+"/Moderator/Suggestion/viewSuggestions/"+json[i].id+"'><img src='"+ROOT+"/assets/images/uploads/" + json[i].image + "'></a>";
                html +="<div class='text'>";
                html += "<div class='warning'><h3>"+json[i].category_name+"</h3></div>";
                html += "<p>"+json[i].itemtemplate_name+"</p>";
                html += "</div>";
                html += "</div>";
            }
            document.querySelector(".card-mainn").innerHTML = html;
        }
    }
    xhr.send();
}
function SearchItem(form,url){
  return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", url);
  console.log(xhr);
      xhr.onload = function () {
        if (xhr.status === 200) {
          const res = xhr.responseText;
          const json = JSON.parse(res);
          resolve(json);
        } 
      };
  
      xhr.send(form);
      console.log(form);
    });
}
const searchInput = document.getElementById('txtHint');
searchInput.addEventListener('input', (event) => {
const searchTerm = event.target.value;
console.log(searchTerm);
const form = new FormData();
form.append("item_name",searchTerm);
const url = ""+ROOT+"/Moderator/Suggestion/searchItem";
const json = SearchItem(form,url)

SearchItem(form, url).then(json => {
  console.log(json);
  var html = "";

  for (var a = 0; a < json.length; a++) {
    // html += "<div class='item' id=item>";
    // html += "<div class=' card-mainn' id='cd'>";
    html += "<div class='card-main' role='button' style='position: relative;'>";
    html += "<a href='"+ROOT+"/Moderator/Suggestion/viewSuggestions/"+json[i].id+"'><img src='"+ROOT+"/assets/images/uploads/" + json[i].image + "'></a>";
    html += "<div class='text'>";
    html += " <div class='warning'><h3>"+json[i].category_name+"</h3></div>";
    html += "<p>"+json[i].itemtemplate_name+"</p>";
    html += "</div>";
    html += "</div>";
    // html += "</div>";
    // html += "</div>";

  }
  document.querySelector(".card-mainn").innerHTML = html;
});


});