//image upload handling
const imagesInput = document.getElementById('images_input');
const imagesPreview = document.getElementById('preview');
const list = document.createElement('ol');
imagesPreview.appendChild(list);
const Files=[];



imagesInput.addEventListener('change', updateImageDisplay);


function updateImageDisplay() {
	const curFiles = imagesInput.files;
	if (curFiles.length ==5) {
		alert("You can't upload more than 5 images");
		imagesInput.value = "";
		return;
	} else {
		for (const file of curFiles) {
			if (validFileType(file)) {
				const listItem = document.createElement('li');
				const para = document.createElement('p');

				//add remove button
				const removeBtn = document.createElement('button');
				removeBtn.classList.add('remove-btn');
				removeBtn.innerHTML = "X";
				removeBtn.addEventListener('click', (e) => {
					e.preventDefault();
					listItem.remove();
					Files.splice(Files.indexOf(file), 1);
					imagesInput.value = "";
					console.log(Files);
				});
				listItem.appendChild(removeBtn);
				const image = document.createElement('img');
				image.src = URL.createObjectURL(file);
				Files.push(file);
				listItem.appendChild(image);
				list.appendChild(listItem);
			} else {
				imagesInput.value = "";
				showErrors(imagesInput,'Invalid file type');
				setTimeout(()=>{
					clearErrorsInput(imagesInput);
				},3000);
			}

		}
	}
}


const fileTypes = [
	'image/jpeg',
	'image/pjpeg',
	'image/png'
];

function validFileType(file) {
	return fileTypes.includes(file.type);
}

function returnFileSize(number) {
	if (number < 1024) {
		return number + 'bytes';
	} else if (number >= 1024 && number < 1048576) {
		return (number / 1024).toFixed(1) + 'KB';
	} else if (number >= 1048576) {
		return (number / 1048576).toFixed(1) + 'MB';
	}
}
//end of image upload handling









//const overlay = document.querySelector(".overlay"); //popup overlay
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
	// console.log("button clicked");
	// e.preventDefault();
	// overlay.classList.remove("hidden");
	// popup.classList.remove("hidden");
	e.preventDefault()
	openPopup('add-gig');

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
	console.log(addGigForm);
	const form = new FormData();

	//handle data from form
	form.append("title", addGigForm.querySelector("#title").value);
	form.append("description", addGigForm.querySelector("#description").value);
	form.append("location", addGigForm.querySelector("#city").value);
	form.append('delivery_method', addGigForm.querySelector('#delivery_method').value);

	var itemsInArray = $('#item').val();
	var selectedValues = itemsInArray.join(",");
	form.append("items", selectedValues);

	//image
	for (let i = 0; i < Files.length; i++) {
		form.append("images[]", Files[i]);
	}


	console.log(selectedValues);
	console.log(form);
	console.log(addGigForm);

	console.log(form.getAll);

	const xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost/upkeep/upkeep/public/Technician/Gigs/addgig", true);

	xhr.send(form);

	xhr.onload = function () {
		if (xhr.status == 200) {
			// handle server response

			console.log("success");
			console.log(this.responseText);
		}
	};

}


//populate distritcs using cities.json and then when user selets a district populate cities using cities.json. cities.json structure is as follows: {"districtname1" : {cities:["city1","city2","city3"]},"districtname2" : {cities:["city1","city2","city3"]}}

// const cities = document.getElementById("city");
const districts = document.getElementById("district");
const cities = document.getElementById("city");

//populate districts
function populateDistricts() {
	// console.log("populateDistricts called");
	const xhr = new XMLHttpRequest();
	xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
	xhr.send();

	xhr.onload = function () {
		if (this.status == 200) {
			const districtsObj = JSON.parse(this.responseText);
			// console.log(districtsObj);
			let output = "";
			output += `<option value="" selected disabled>Select District</option>`;
			for (let district in districtsObj) {
				output += `<option value="${district}">${district}</option>`;
			}
			districts.innerHTML = output;
		}
	};
}

populateDistricts();

//populate cities
function populateCities(district) {
	// console.log("populateCities called");
	const xhr = new XMLHttpRequest();
	xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
	xhr.send();

	xhr.onload = function () {
		if (this.status == 200) {
			const citiesObj = JSON.parse(this.responseText);
			// console.log(citiesObj);
			let output = "";
			output += `<option value="" selected disabled>Select City</option>`;
			for (let city of citiesObj[district].cities) {
				output += `<option value="${city}">${city}</option>`;
			}
			cities.innerHTML = output;
		}
	};
}

//event listner for district change
districts.addEventListener("change", function () {
	// console.log("district changed");
	populateCities(this.value);
});

// <select multiple className="chosen-select" id="item">
// 	<optgroup label="Group 1">
// 		<option value="1">Option 1</option>
// 		<option value="2">Option 2</option>
// 	</optgroup>
// 	<optgroup label="Group 2">
// 		<option value="3">Option 3</option>
// 		<option value="4">Option 4</option>
// 	</optgroup>
// </select>
//populate items using templates json encoded variable. the structure is as follows: [{category_id:1,category_name:"category1",items:[{item_id:1,item_name:"item1"},{item_id:2,item_name:"item2"}]},{category_id:2,category_name:"category2",items:[{item_id:1,item_name:"item1"},{item_id:2,item_name:"item2"}]}]. category name goes to optgroup label (create opt group element and set label) and item name goes to option value. the html structure is as above

const items = document.querySelector("select#item");
console.log(items);
//no need of xhr data already in templates variable
function populateItems() {
	// console.log("populateItems called");
	// const xhr = new XMLHttpRequest();
	// xhr.open("GET", ROOT+"/assets/js/Technician/templates.json", true);
	// xhr.send();

	// xhr.onload = function () {
	// 	if (this.status == 200) {
	// 		const templatesObj = JSON.parse(this.responseText);
	// 		// console.log(templatesObj);
	// 		let output = "";
	// 		for (let template of templatesObj) {
	// 			output += `<optgroup label="${template.category_name}">`;
	// 			for (let item of template.items) {
	// 				output += `<option value="${item.item_id}">${item.item_name}</option>`;
	// 			}
	// 			output += `</optgroup>`;
	// 		}
	// 		items.innerHTML = output;
	// 	}
	// };
	categories = JSON.parse(templates);
	console.log(categories);

	let output = "";
	for (let category of categories) {
		output += `<optgroup label="${category.category_name}">`;
		for (let template of category.itemtemplates) {
			console.log(template);
			output += `<option value="${template.itemtemplate_name}">${template.itemtemplate_name}</option>`;

		}
		output += `</optgroup>`;
	}
	items.innerHTML = output;
}

populateItems();
// select
$(".chosen-select").chosen({
	disable_search_threshold: 10,
	width: "100%"
});


//image carousel
const delay = 3000; //ms

const slides = document.querySelectorAll(".slides");
slides.forEach(function (slide, index) {
	const slidesCount = slides.childElementCount;
	const maxLeft = (slidesCount - 1) * 100 * -1;

	let current = 0;

	function changeSlide(next = true) {
		if (next) {
			current += current > maxLeft ? -100 : current * -1;
		} else {
			current = current < 0 ? current + 100 : maxLeft;
		}

		slides.style.left = current + "%";
	}
});

// let autoChange = setInterval(changeSlide, delay);
// const restart = function() {
// 	clearInterval(autoChange);
// 	autoChange = setInterval(changeSlide, delay);
// };
//
// // Controls
// document.querySelector(".next-slide").addEventListener("click", function() {
// 	changeSlide();
// 	restart();
// });
//
// document.querySelector(".prev-slide").addEventListener("click", function() {
// 	changeSlide(false);
// 	restart();
// });




