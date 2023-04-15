const overlay = document.querySelector(".overlay"); //popup overlay
const popup = document.querySelector(".popup"); // popup form
const addGigBtn = document.querySelector(".addGig"); //add gig button
const closeBtn = document.getElementById("formClose"); //close buttons
const formSubmitBtn = document.getElementById("submitBtn"); //submit button

//event listners
addGigBtn.addEventListener("click", showPopup); //event listner for addgig button
closeBtn.addEventListener("click", hidePopup); //event listner for close button
formSubmitBtn.addEventListener("click", ajax_addGig); //event listner for submit button

//functions for show and hide popup
function showPopup(e) {
	console.log("button clicked");
	e.preventDefault();
	overlay.classList.remove("hidden");
	popup.classList.remove("hidden");
}

function hidePopup(e) {
	console.log("button clicked");
	e.preventDefault();
	overlay.classList.add("hidden");
	popup.classList.add("hidden");
}

//ajax call for add gig
function ajax_addGig(e) {
	e.preventDefault();

	const addGigForm = document.getElementById("addgigform"); //add gig form
	const form = new FormData(addGigForm);

	console.log(addGigForm);

	console.log(form.getAll);

	const xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost/upkeep/upkeep/public/Technician/Gigs/addgig", true);

	xhr.send(form);

	xhr.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			// handle server response
			console.log("success");
			console.log(this.responseText);
		}
	};

}
