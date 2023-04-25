// const listViewButton = document.querySelector('.list-view-button');
// const gridViewButton = document.querySelector('.grid-view-button');
const list = document.querySelector('ol');
//
// listViewButton.onclick = function () {
//     list.classList.remove('grid-view-filter');
//     list.classList.add('list-view-filter');
// }
//
// gridViewButton.onclick = function () {
//     list.classList.remove('list-view-filter');
//     list.classList.add('grid-view-filter');
// }



const gridViewButton = document.querySelector('.grid-view');
const listViewButton = document.querySelector('.list-view');

gridViewButton.addEventListener('click', () => {
    gridViewButton.classList.add('active');
    listViewButton.classList.remove('active');
    // Code to switch to grid view goes here
    list.classList.remove('list-view-filter');
    list.classList.add('grid-view-filter');
});

listViewButton.addEventListener('click', () => {
    gridViewButton.classList.remove('active');
    listViewButton.classList.add('active');
    // Code to switch to list view goes here
    list.classList.remove('grid-view-filter');
    list.classList.add('list-view-filter');
});




function addFilterOption() {
    var filterOption = document.createElement("div");
    filterOption.classList.add("filter-option");
    var addButton = document.createElement("button");
    addButton.classList.add("add-filter-btn");
    addButton.setAttribute("onclick", "addFilterOption()");
    addButton.textContent = "[+]";
    var label = document.createElement("label");
    label.textContent = "New Filter:";
    var select = document.createElement("select");
    select.innerHTML = `
    <option>All Options</option>
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
  `;
    filterOption.appendChild(addButton);
    filterOption.appendChild(label);
    filterOption.appendChild(select);
    var filterPanel = document.querySelector(".filter-panel");
    filterPanel.insertBefore(filterOption, filterPanel.lastChild);
}

const profileBtn = document.getElementById('profile');
const menuContainer = document.getElementById('menu-container');

profileBtn.addEventListener('click', () => {
    if (menuContainer.style.display === 'block') {
        menuContainer.style.bottom = '-150px';
        menuContainer.style.display = 'none';
    } else {
        menuContainer.style.display = 'block';
        setTimeout(() => {
            menuContainer.style.bottom = '40px';
        }, 10);
    }
});




const filterButton = document.querySelector('.filter-button button');

filterButton.addEventListener('click', function() {
    const categoryFilters = document.querySelectorAll('.filter-category input[type="checkbox"]:checked');
    const typeFilters = document.querySelectorAll('.filter-type input[type="checkbox"]:checked');
    const deliveryFilters = document.querySelectorAll('.filter-delivery input[type="checkbox"]:checked');
    const distanceFilter = document.querySelector('.filter-distance select');

    // Get selected values from filters
    const selectedCategories = Array.from(categoryFilters).map(function(filter) {
        return filter.value;
    });
    const selectedTypes = Array.from(typeFilters).map(function(filter) {
        return filter.value;
    });
    const selectedDelivery = Array.from(deliveryFilters).map(function(filter) {
        return filter.value;
    });
    const selectedDistance = distanceFilter.value;

    // Pass selected values to backend to filter results
    // Code for passing values to backend goes here

    // Clear all filters
    categoryFilters.forEach(function(filter) {
        filter.checked = false;
    });
    typeFilters.forEach(function(filter) {
        filter.checked = false;
    });
    deliveryFilters.forEach(function(filter) {
        filter.checked = false;
    });
    distanceFilter.selectedIndex = 0;
});


// Get the category and subcategory elements
const categoryFilter = document.getElementById('category-filter');
const subcategoryFilter = document.getElementById('subcategory-filter');
const filterCategory = document.querySelector('.filter-category');

// Add event listener to category filter
categoryFilter.addEventListener('change', function() {
    // If the category filter is checked, show the subcategory filter
    if (this.checked) {
        subcategoryFilter.disabled = false;
        filterCategory.style.display = 'flex';
    } else {
        subcategoryFilter.disabled = true;
        subcategoryFilter.selectedIndex =
            filterCategory.style.display = 'none';
    }
});

// Define a list of categories and subcategories
const categories = {
    'Category 1': ['Item 1', 'Item 2', 'Item 3'],
    'Category 2': ['Item 4', 'Item 5', 'Item 6'],
    'Category 3': ['Item 7', 'Item 8', 'Item 9']
};

// Add event listener to category filter
categoryFilter.addEventListener('change', function() {
    // If the category filter is checked, show the subcategory filter
    if (this.checked) {
        subcategoryFilter.disabled = false;
        filterCategory.style.display = 'flex';

        // Populate the subcategory filter based on the selected category
        const selectedCategory = this.value;
        const subcategories = categories[selectedCategory];
        let subcategoryOptions = '';
        for (let i = 0; i < subcategories.length; i++) {
            subcategoryOptions += '<option value="' + subcategories[i] + '">' + subcategories[i] + '</option>';
        }
        document.getElementById('subcategory-select').innerHTML = subcategoryOptions;
    } else {
        subcategoryFilter.disabled = true;
        subcategoryFilter.selectedIndex = -1;
        filterCategory.style.display = 'none';
    }
});


// Define an object to store selected filters
const selectedFilters = {};

// Add event listeners to filters
filters.forEach(function(filter) {
    const filterSelect = filter.querySelector('.filter-select');
    const filterTagList = filter.querySelector('.filter-tag-list');

    // Add event listener to filter select
    filterSelect.addEventListener('change', function() {
        // If the filter is checked, add it to the selected filters object and display a tag
        if (this.checked) {
            const filterName = this.name;
            const filterValue = this.value;

            // If the filter is a category, add the subcategory value to the filter value
            if (filterName === 'category') {
                const subcategorySelect = filter.querySelector('#subcategory-select');
                const subcategoryValue = subcategorySelect.value;
                filterValue += ' (' + subcategoryValue + ')';
            }

            selectedFilters[filterName] = filterValue;
            const tag = document.createElement('span');
            tag.classList.add('filter-tag');
            tag.innerHTML = filterValue + '<i class="fas fa-times filter-tag-close"></i>';
            filterTagList.appendChild(tag);

            // Add event listener to filter tag close icon
            const tagClose = tag.querySelector('.filter-tag-close');
            tagClose.addEventListener('click', function() {
                // Remove the tag and the corresponding filter from the selected filters object
                filterTagList.removeChild(tag);
                delete selectedFilters[filterName];

                // Uncheck the filter select and update the subcategory filter if necessary
                filterSelect.checked = false;
                if (filterName === 'category') {
                    const subcategorySelect = filter.querySelector('#subcategory-select');
                    subcategorySelect.disabled = true;
                    subcategorySelect.selectedIndex = -1;
                    filterCategory.style.display = 'none';
                }
            });
        } else {
            // If the filter is unchecked, remove it from the selected filters object and the tag list
            const filterName = this.name;
            const filterValue = this.value;
            delete selectedFilters[filterName];
            const tags = filterTagList.querySelectorAll('.filter-tag');
            tags.forEach(function(tag) {
                if (tag.textContent === filterValue + '×') {
                    filterTagList.removeChild(tag);
                }
            });
        }
    });
});
