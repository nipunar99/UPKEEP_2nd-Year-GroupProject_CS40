const next = document.querySelectorAll(".next");
const prev = document.querySelectorAll(".prev");
const steps = document.getElementsByClassName("step");
const indicator_steps = document.getElementsByClassName("progress-step");
const progress = document.getElementsByClassName("progress");

var currentStep = 0;
var allSteps = steps.length;

next.forEach(function (item) {
	item.addEventListener("click", nextStep);
});

prev.forEach(function (item) {
	item.addEventListener("click", prevStep);
});

function nextStep(e) {
	e.preventDefault();

	console.log("next button clicked");
	steps[currentStep].classList.add("hideleft");
	indicator_steps[currentStep].classList.remove("current");
	currentStep++;
	steps[currentStep].classList.remove("hideright");
	indicator_steps[currentStep].classList.add("active");
	indicator_steps[currentStep].classList.add("current");
	var width = (currentStep / (allSteps - 1)) * 100;
	progress[0].style.width = width + "%";
}

function prevStep(e) {
	e.preventDefault();

	console.log("prev button clicked");
	steps[currentStep].classList.add("hideright");
	indicator_steps[currentStep].classList.remove("active");
	indicator_steps[currentStep].classList.remove("current");

	currentStep--;
	steps[currentStep].classList.remove("hideleft");
	indicator_steps[currentStep].classList.add("current");
	var width = (currentStep / (allSteps - 1)) * 100;
	progress[0].style.width = width + "%";
}
