//create post functionality
const postInput = document.getElementById('create-post-input');
const inputBtn = postInput.querySelector('input#create-post-btn');

console.log(postInput);

inputBtn.addEventListener('focus', () => {
    console.log('focus');
    openPopup('create_post');
});

//create post form
const createPostForm = document.querySelector('form#create-post-form');
console.log(createPostForm);

//yes no option
const option1 = createPostForm.querySelector('input#switch_left');
const option2 = createPostForm.querySelector('input#switch_right');

//other form inputs
const selectItem = createPostForm.querySelector('select#select-item');
const itemData = createPostForm.querySelector('#item-data');

//initial state
option1.checked = true;
selectItem.disabled = false;
itemData.classList.add('hidden');

//add my items which is in jsonParsed from the back end myItems to selectItem options
myItems=JSON.parse(myItems);
myItems.forEach((item) => {
    const option = document.createElement('option');
    option.value = item.item_id;
    option.innerHTML = item.item_name;
    selectItem.appendChild(option);
});

//add item_category select options from templates json file
templates=JSON.parse(templates);
console.log(templates);
templates.forEach((template) => {
    const option = document.createElement('option');
    option.value = template.category_id;
    option.innerHTML = template.category_name;
    itemData.querySelector('#item-category').appendChild(option);
});

//add event listner to the item-category to populate item fields when user selects a option of item-category
itemData.querySelector('#item-category').addEventListener('change', () => {
    console.log('item-category change');
    itemData.querySelector('#item_type').innerHTML = "";
    const category_id = itemData.querySelector('#item-category').value;
    templates.forEach((template) => {
        if(template.category_id == category_id) {
            console.log(template);
            template.itemtemplates.forEach((item) => {
                const option = document.createElement('option');
                option.value = item.id;
                option.innerHTML = item.itemtemplate_name;
                itemData.querySelector('#item_type').appendChild(option);
            });
        }
    });
});

//add event listners to the selectItem to populate inputs when user selects a option of selectItem in itemData and make the inputs readonly and make the itemData visible
selectItem.addEventListener('change', () => {
    console.log('selectItem change');
    const item_id = selectItem.value;
    myItems.forEach((item) => {
        if(item.item_id == item_id) {
            itemData.querySelector('#item-category').value = item.category_id;
            const event = new Event('change');
            itemData.querySelector('#item-category').dispatchEvent(event);
            console.log(item);
            if(item.parent_id!=0){
                itemData.querySelector('#item_type').value = item.parent_id;
            }else{
                itemData.querySelector('#item_type').value = item.itemtemplate_id;
            }
            itemData.querySelector('#brand').value = item.brand;
            itemData.querySelector('#model').value = item.model;
            itemData.classList.remove('hidden');
        }
    });
});

//



//input fields
option1.addEventListener('change', () => {
    console.log('option1 change');
    if(option1.checked) {
        selectItem.disabled = false;
        selectItem.closest('.input-field').classList.remove('hidden');
        itemData.classList.add('hidden');
    }else {
        option2.checked = true;
    }
});

option2.addEventListener('change', () => {
    if(option2.checked) {
        selectItem.disabled = true;
        selectItem.closest('.input-field').classList.add('hidden');
        itemData.classList.remove('hidden');
    }else {
        option1.checked = true;
    }
});

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


//Ask Community post creation
popups['create_post'].querySelector('a#create-ask-community-post-btn').addEventListener('click',(e)=>{
    const createPost= document.querySelector('form#create-post-form');

    //validate form inputs
    if(!validateForm(createPost)){
        e.preventDefault();
        return;
    }

    const formData= new FormData();
    formData.append('post_type','Ask Community');

    const itemCategory = createPost.querySelector('#item-category').value;
    const categoryElement = templates.find ((template) => {
        return template.category_id == itemCategory;
    });
    console.log(categoryElement);
    const itemTypeName = categoryElement.itemtemplates.find((item) => {
        return item.id == createPost.querySelector('#item_type').value;
    });

    formData.append('item_type',itemTypeName.itemtemplate_name);
    formData.append('item_brand',createPost.querySelector('#brand').value);
    formData.append('item_model',createPost.querySelector('#model').value);
    formData.append('title',createPost.querySelector('#title').value);
    formData.append('content',createPost.querySelector('#description').value);
    //multiple images
    console.log(Files);
    for (let i = 0; i < Files.length; i++) {
        console.log(Files[i]);
        formData.append('images[]', Files[i]);
    }

    //send data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Community/createPost');
    console.log(formData);
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('success');
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            if(response.success){
                closePopup('create_post');
                const post = new Post(response.post);
                community.addPost(post);
                community.renderNewPostOnTop(post);
            }else{
                alert(response.error);
            }
        } else if (xhr.status !== 200) {
            console.log(xhr.responseText);
        }
    }

    xhr.send(formData);

});

//sacrap and sell post creation
popups['create_post'].querySelector('a#create-scrap-sell-post-btn').addEventListener('click',(e)=>{
    const createPost= document.querySelector('form#create-scrap-post');

    //validate form inputs
    // if(!validateForm(createPost)){
    //     e.preventDefault();
    //     return;
    // }

    if(!validateScrapsellForm(createPost)){
        e.preventDefault();
        return;
    }

    const formData= new FormData();
    formData.append('post_type','Scrap and Sell');
    formData.append('item_id',createPost.querySelector('#select-item2').value);
    formData.append('item_type',createPost.querySelector('#item_type2').innerHTML);
    formData.append('item_brand',createPost.querySelector('#item_brand2').innerHTML);
    formData.append('item_model',createPost.querySelector('#item_model2').innerHTML);
    formData.append('title',createPost.querySelector('#title').value);
    formData.append('content',createPost.querySelector('#description').value);
    formData.append('post_type','Scrap and Sell');
    //multiple images
    console.log(Files);
    for (let i = 0; i < Files.length; i++) {
        console.log(Files[i]);
        formData.append('images[]', Files[i]);
    }

    //send data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Community/createPost');
    console.log(formData);
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('success');
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            if(response.success){
                closePopup('create_post');
                const post = new Post(response.post);
                community.addPost(post);
                community.renderNewPostOnTop(post);
            }else{
                alert(response.error);
            }
        } else if (xhr.status !== 200) {
            console.log(xhr.responseText);
        }
    }

    xhr.send(formData);

});

function validateForm(form){
    const title = form.querySelector('#title');
    const description = form.querySelector('#description');
    const item_type = form.querySelector('#item_type');
    const brand = form.querySelector('#brand');
    const model = form.querySelector('#model');
    const images = form.querySelector('#images_input');
    const selectItem = form.querySelector('#select-item');
    const option1 = form.querySelector('#switch_left');
    const option2 = form.querySelector('#switch_right');
    const itemData = form.querySelector('#itemData');
    const item_category = form.querySelector('#item-category');
    const errors = [];
    if(title.value.trim() == ""){
        errors.push("Title is required");
        showErrors(title,'Title is required');
    }else{
        clearErrorsInput(title);
    }

    if(option1.checked){
        if(selectItem.value == ""){
            errors.push("Select an item");
            showErrors(selectItem,'Select an item');
        }else{
            clearErrorsInput(selectItem);
        }
    }else{
        if(item_category.value == ""){
            errors.push("Select an item category");
            showErrors(item_category,'Select an item category');
        }else{
            clearErrorsInput(item_category);
        }
        if(item_type.value == ""){
            errors.push("Select an item type");
            showErrors(item_type,'Select an item type');
        }else{
            clearErrorsInput(item_type);
        }

    }

    if(errors.length > 0){
        return false;
    }else{
        return true;
    }
}


function validateScrapsellForm(form){
    const title = form.querySelector('#title');
    const description = form.querySelector('#description');
    const item_type = form.querySelector('#item_type2');
    errors = [];

    if(title.value.trim() == ""){
        errors.push("Title is required");
        showErrors(title,'Title is required');
    }

    if(item_type.value == ""){
        errors.push("Select an item type");
        showErrors(item_type,'Select an item type');
    }


}




//create scrap and sell post
const selectItem2 = document.querySelector('select#select-item2');

myItems.forEach((item)=>{
    const option = document.createElement('option');
    option.value = item.item_id;
    option.innerHTML = item.item_name;
    selectItem2.appendChild(option);
});

//event listener for select item
selectItem2.addEventListener('change',(e)=>{
    if(e.target.value != 0) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT + '/Community/getItemDataById/' + e.target.value);
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('success');
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response) {
                    updateItemData(response)
                    document.querySelector('.place-holder').classList.add('hidden');
                } else {
                    alert(response.error);
                }
            } else if (xhr.status !== 200) {
                console.log(xhr.responseText);
            }
        }
        xhr.send();
    }else{
        document.querySelector('.place-holder').classList.remove('hidden');
        resetItemData();
    }
    });

//update item data
function updateItemData(itemData){
    const itemDetailsDiv = document.querySelector('.popup div.item-details-for-scrap');
    const item_category = itemDetailsDiv.querySelector('#item_name');
    const item_type = itemDetailsDiv.querySelector('#item_type2');
    const brand = itemDetailsDiv.querySelector('#item_brand2');
    const model = itemDetailsDiv.querySelector('#item_model2');
    const purchasePrice = itemDetailsDiv.querySelector('#purchase_price');
    const warentyStatus = itemDetailsDiv.querySelector('#warenty_status');
    const itemImage = itemDetailsDiv.querySelector('#item_image');

    item_category.innerHTML = itemData.item_name;
    item_type.innerHTML = itemData.item_type;
    brand.innerHTML = itemData.brand;
    model.innerHTML = itemData.model;
    purchasePrice.innerHTML = itemData.purchase_price;
    itemImage.src = ROOT+'/assets/images/uploads/'+itemData.image;

    const warrenty_date = new Date(itemData.warrenty_date);
    const currentDate = new Date();
    const diffTime = Math.abs(currentDate - warrenty_date);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    if(diffDays > 0){
        warentyStatus.innerHTML = diffDays + ' days left';
    }else{
        warentyStatus.innerHTML = 'Warenty Expired';
    }
}

function resetItemData(){
    const itemDetailsDiv = document.querySelector('div.item-details-for-scrap');
    const item_category = itemDetailsDiv.querySelector('#item_name');
    const item_type = itemDetailsDiv.querySelector('#item_type2');
    const brand = itemDetailsDiv.querySelector('#item_brand2');
    const model = itemDetailsDiv.querySelector('#item_model2');
    const purchasePrice = itemDetailsDiv.querySelector('#purchase_price');
    const warentyStatus = itemDetailsDiv.querySelector('#warenty_status');
    const itemImage = itemDetailsDiv.querySelector('#item_image');

    item_category.innerHTML = '';
    item_type.innerHTML = '';
    brand.innerHTML = '';
    model.innerHTML = '';
    purchasePrice.innerHTML = '';
    itemImage.src = '';
    warentyStatus.innerHTML = '';
}

//listten for the tab switch and change the footter button s id
const askCommunityTab = document.querySelector('#ask-community-form-tab');
const scrapSellTab = document.querySelector('#scrap-and-sell-form-tab');
const createAskCommunityPostBtn = document.querySelector('#create-ask-community-post-btn');
const createScrapSellPostBtn = document.querySelector('#create-scrap-sell-post-btn');
askCommunityTab.addEventListener('click',()=>{
    console.log('ask community tab clicked');
    createAskCommunityPostBtn.classList.remove('hidden');
    createScrapSellPostBtn.classList.add('hidden');
});
scrapSellTab.addEventListener('click',()=>{
    console.log('scrap and sell tab clicked');
    createScrapSellPostBtn.classList.remove('hidden');
    createAskCommunityPostBtn.classList.add('hidden');
});


//Comment on post



