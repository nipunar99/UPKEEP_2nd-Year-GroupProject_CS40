// window.addEventListener('DOMContentLoaded', function() {
//     var tabs = document.querySelectorAll('.tabs .tab-link');
//     var tabContents = document.querySelectorAll('.tab-content');
//
//     for (var i = 0; i < tabs.length; i++) {
//         tabs[i].addEventListener('click', function(e) {
//             e.preventDefault();
//
//             document.querySelector('.tab-link.current').classList.remove('current');
//             document.querySelector('.tab-content.current').classList.remove('current');
//
//             var tab = this.getAttribute('data-tab');
//
//             this.classList.add('current');
//             document.querySelector('#' + tab).classList.add('current');
//         });
//     }
// });


window.addEventListener('DOMContentLoaded', function() {
    // Get all edit buttons
    const editBtns = document.querySelectorAll('.edit-btn');

    // Add click event listener to each edit button
    editBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // Get the input field associated with the clicked edit button
            const inputField = document.getElementById(btn.dataset.input);

            // Toggle the input field between read-only and editable mode
            if (inputField.readOnly) {
                inputField.readOnly = false;
                inputField.focus();
                btn.innerHTML = '<i class="material-icons-sharp">done</i>';
            } else {
                inputField.readOnly = true;
                btn.innerHTML = '<i class="material-icons-sharp">edit</i>';
            }
        });
    });
});

