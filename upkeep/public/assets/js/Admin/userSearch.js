 // Attach event listener to search button
 const searchButton = document.getElementById('searchButton');
 searchButton.addEventListener('click', searchUsers);



// Function to search for users in the table
function searchUsers() {
    // Get the search input value
    const searchInput = document.getElementById('searchInput');
    const searchTerm = searchInput.value.toLowerCase();
  
    // Get all table rows
    const rows = document.querySelectorAll('#userTable tbody #usertable_row');
  
    // Loop through each row and check for a match
    rows.forEach(row => {
      const username = row.cells[1].textContent.toLowerCase();
  
      if (username.includes(searchTerm)) {
        row.style.display = '#usertable_row';
      } else {
        row.style.display = 'none';
      }
    });
  }
  
 
  