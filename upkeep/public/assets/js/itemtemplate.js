
// const checkStatus = document.getElementById("a").innerHTML;

// console.log(checkStatus);

// if(checkStatus == "Pending")
// {
//     document.getElementById("a").classList.add("danger");
// }
// else
// {
//     document.getElementById("a").classList.add("success");
// }
// // const element = document.getElementById("a");
//   if (element.className == "checkStatus") {
//     element.className = "success";
//   } else {
//     element.className = "danger";
//   }
// const checkStatus = document.getElementById("a");
// checkStatus.addEventListener("click", dosomething)
//  function dosomething(event){
//     console.log(event);
//  }
elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
  if (elements[i].innerHTML === "Pending") {
   //  elements[i].style.color = "red";
   elements[i].classList.add("danger");

  }
  if (elements[i].innerHTML === "Approved") {
   //  elements[i].style.color = "green";  
    elements[i].classList.add("success");  
  }
  
}

// function showUser(str) {
//    if (str=="") {
//      document.getElementById("txtHint").innerHTML="";
//      return;
//    }
//    var xmlhttp=new XMLHttpRequest();
//    xmlhttp.onreadystatechange=function() {
//      if (this.readyState==4 && this.status==200) {
//        document.getElementById("txtHint").innerHTML=this.responseText;
//      }
//    }
//    xmlhttp.open("GET","itemTemplate.view.php?q="+str,true);
//    xmlhttp.send();
//  }