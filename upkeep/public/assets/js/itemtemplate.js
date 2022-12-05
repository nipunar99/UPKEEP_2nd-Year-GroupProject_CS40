const checkStatus = document.getElementById("a").innerHTML;

console.log(checkStatus);

if(checkStatus == "Pending")
{
    document.getElementById("a").classList.add("danger");
}
else
{
    document.getElementById("a").classList.add("success");
}
// // const element = document.getElementById("a");
//   if (element.className == "checkStatus") {
//     element.className = "success";
//   } else {
//     element.className = "danger";
//   }