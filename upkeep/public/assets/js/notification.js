window.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('.tabs .tab-link');
    var tabContents = document.querySelectorAll('.tab-content');

    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector('.tab-link.current').classList.remove('current');
            document.querySelector('.tab-content.current').classList.remove('current');

            var tab = this.getAttribute('data-tab');

            this.classList.add('current');
            document.querySelector('#' + tab).classList.add('current');
        });
    }
});



// create class for all notifications
