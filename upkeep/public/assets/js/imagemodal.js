// Get the modal
var modal = document.getElementById("image-modal");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close-modal")[0];

// Get the previous and next buttons
var prevBtn = document.getElementsByClassName("prev")[0];
var nextBtn = document.getElementsByClassName("next")[0];

// Get the modal image and index
var modalImg = document.getElementById("modal-image");
var modalIndex = 0;

// Get all images and loop through them to add a click event listener
var images = document.querySelectorAll(".image-grid img");
for (var i = 0; i < images.length; i++) {
    images[i].addEventListener("click", function() {
        // Get the index of the clicked image
        modalIndex = parseInt(this.getAttribute("data-index"));

        // Set the modal image source to the clicked image source
        modalImg.src = this.src;

        // Show the modal
        modal.style.display = "block";
    });
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// When the user clicks on the previous button, show the previous image
prevBtn.onclick = function() {
    modalIndex--;
    if (modalIndex < 0) {
        modalIndex = images.length - 1;
    }
    modalImg.src = images[modalIndex].src;
}

// When the user clicks on the next button, show the next image
nextBtn.onclick = function() {
    modalIndex++;
    if (modalIndex >= images.length) {
        modalIndex = 0;
    }
    modalImg.src = images[modalIndex].src;
}