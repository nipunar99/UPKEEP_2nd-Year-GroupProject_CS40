const filterButton = document.querySelector('.filter-button');
const slideOutForm = document.querySelector('.slide-out-form');
const closeButton = document.querySelector('.close-button');

filterButton.addEventListener('click', function(e) {
  slideOutForm.classList.toggle('open');
});

closeButton.addEventListener('click', function() {
    slideOutForm.classList.remove('open');
  });
  