document.querySelectorAll('.remove-button').forEach(button => {
    button.addEventListener('click', event => {
      const nic = event.target.getAttribute('data-nic');
      const row = document.querySelector(`#row-${nic}`);
  
      // Send an AJAX request to delete the data from the database
      const xhr = new XMLHttpRequest();
      xhr.open('DELETE', `/delete.php?nic=${nic}`);
      xhr.send();
  
      // Remove the row from the table
      row.remove();
    });
  });
  