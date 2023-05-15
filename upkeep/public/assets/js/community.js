// //...............................slide bar.......................
// const sideMenu = document.querySelector("aside");
// const menuBtn = document.querySelector("#menu-btn");
// const  closebt= document.querySelector("#close-btn");
//
// menuBtn.addEventListener("click", () => {
//     sideMenu.style.display = "block";
// })
//  closebt.addEventListener("click", () => {
//     sideMenu.style.display = "none";
// })
// //...............................................................
//
// const itempannelbtn =  document.querySelector(".itempannelbtn");
// const itempannel = document.querySelector(".right");
// const itempannelclosebtn = document.querySelector(".itempannelclosebtn");
//
// itempannelbtn.addEventListener('click', () => {
//     itempannel.classList.add("animateOpenRight");
//     itempannel.classList.remove("animateCloseRight");
// })
//
// itempannelclosebtn.addEventListener('click', () => {
//     itempannel.classList.remove("animateOpenRight");
//     itempannel.classList.add("animateCloseRight");
// })

//community class structure with post and comment classes fully OOP
//3 classes: Community, Post, Comment
//Community class has posts array and post class has comments array
//comminity deals with back end and use chr xmlhttprequest to get data from server others are more into front end dont use fetch api use xmlhttprequest

//////////////////////
//  Community class //
//////////////////////

class Community {
    constructor() {
        if (Community._instance) {
            throw new Error('Community already has an instance!!!');
        }
        Community._instance = this;

        this.posts = [];
        this.searchPosts = [];
        this.popularPosts = [];
        this.page = 1;
        this.limit = 10;
        this.postCount = 0;
        this.currentPost = null;
        this.postListElement = document.querySelector('.Post-List');
        this.fetchPosts();
        this.renderPosts();
        this.fetchPopularPosts();


    }

    addPost(post) {
        this.posts.push(post);
    }

    addSearchPost(post) {
        this.searchPosts.push(post);
    }

    clearSearchPosts() {
        this.searchPosts = [];
    }

    addPopularPost(post) {
        this.popularPosts.push(post);
    }

    getPost() {
        return this.posts;
    }

    getPostById(postId) {
        return this.posts.find((post) => {
            return post.postId === postId;
        });
    }


    removePost(post) {
        this.posts.splice(post, 1);
    }

    fetchPosts() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Community/getPosts?page=' + this.page, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                let posts = JSON.parse(xhr.responseText);
                posts.forEach((post) => {
                    this.addPost(new Post(post));
                    console.log(post);
                });
                this.renderPosts();
            }
        }
        xhr.send();
    }

    renderPosts() {
        let postContainer = document.querySelector('.Post-List');
        this.posts.forEach((post) => {
            const postElement = document.createElement('li');
            postElement.className = 'card';
            postElement.appendChild(post.createPostElementWithEventListeners());


            //this buttton will open a pop up view_post and render post and comment dta in the 2 separate divs post-details and comment-section
            const commentButton = postElement.querySelector('.comment');
            commentButton.addEventListener('click', () => {
                openPopup('view_post');
                this.currentPost = post.postId;
                console.log(this.currentPost);
                const popup = popups['view_post'];
                popup.dataset.postId = post.postId;
                popup.querySelector('.post-details').innerHTML = '';
                const comments = popups['view_post'].querySelector('.comment-section');
                comments.innerHTML = '';
                document.querySelector('.post-details').append(post.createPostElementWithEventListeners());

                post.renderComments(comments)
            });

            postContainer.appendChild(postElement);
        });
    }

    searchPostsAndRender(searchTerm) {
        this.clearSearchPosts();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Community/getPosts?search=' + searchTerm, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                let posts = JSON.parse(xhr.responseText);
                if (posts.length > 0) {
                    posts.forEach((post) => {
                        this.addSearchPost(new Post(post));
                    });
                }
                this.renderSearchPosts();
            }
        }
        xhr.send();
    }

    renderSearchPosts() {
        let postContainer = document.querySelector('.Post-List');
        postContainer.innerHTML = '';
        this.searchPosts.forEach((post) => {
            const postElement = document.createElement('li');
            postElement.appendChild(post.createPostElement());
            postContainer.appendChild(postElement)
        });
    }

    fetchPostCount() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Community/getPostCount', true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                this.postCount = JSON.parse(xhr.responseText);
            }
        }
        xhr.send();
    }

    upvotePost(postId) {
        //update post upvote count
        const post = this.posts.find((post) => {
            return post.postId === postId;
        });
        //update post upvote count in database
        const data= new FormData();
        data.append('post_id', postId);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', ROOT+'/Community/upvotePost', true);
        xhr.onload = () => {
            let res = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
                console.log(res.success);
                post.addUpvote();
            }else{
                console.log(res.error);
            }
        }
        xhr.send(data);
    }

    downvotePost(postId) {
        console.log('downvote clicked');
        const post = this.posts.find((post) => {
            return post.postId === postId;
        });
        console.log(post);
        //update post downvote count in database
        const data= new FormData();
        data.append('post_id', postId);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', ROOT+'/Community/downvotePost', true);
        xhr.onload = () => {
            let res = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
                console.log(res.success);
                post.addDownvote();
            }else{
                console.log(res.error);
            }
        }
        xhr.send(data);
    }

    updatePostElement(postID) {
        let post = this.posts.find((post) => {
            return post.postId === postID;
        });
        let postElement = document.querySelector(`#post-${postID}`);
        console.log(postElement);
        postElement.querySelector('#upvote-count').innerHTML = post.upvotes;
        postElement.querySelector('#downvote-count').innerHTML = post.downvotes;

        if(post.upvoted) {
            postElement.querySelector('.upvote').classList.add('active');
        }
        if(post.downvoted) {
            postElement.querySelector('.downvote').classList.add('active');
        }

        //update comment count
        postElement.querySelector('#comment-count').innerHTML = post.comments.length;

        //update upvote and downvote count
        postElement.querySelector('#upvote-count').innerHTML = post.upvotes;
        postElement.querySelector('#downvote-count').innerHTML = post.downvotes;



    }

    fetchPopularPosts() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Community/getPopularPosts', true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                let posts = JSON.parse(xhr.responseText);
                posts.forEach((post) => {
                    this.addPopularPost(new Post(post));
                });
                this.renderPopularPosts();
            }
        }
        xhr.send();
    }

    renderPopularPosts() {
        let postContainer = document.querySelector('.Popular-Post-List');
        this.popularPosts.forEach((post) => {
            const postElement = document.createElement('li');
            postElement.append(post.createPopularPostElement());
            postContainer.appendChild(postElement)
        });
    }

    renderNewPostOnTop(post) {
        let postContainer = document.querySelector('.Post-List');
        const postElement = document.createElement('li');
        postElement.appendChild(post.createPostElement());
        postContainer.prepend(postElement);
    }

    loadMorePosts() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Community/getPosts?offset=' + this.posts.length, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                let posts = JSON.parse(xhr.responseText);
                posts.forEach((post) => {
                    this.addPost(new Post(post));
                    this.postListElement.appendChild(post.createPostElement());
                });
            }
        }
        xhr.send();
    }



}



///////////////////
//  POST CLASS  //
//////////////////

class Post {
    constructor(postDetails) {
        this.data = postDetails;
        this.userId = postDetails.user_id;
        this.userName = postDetails.user_name;
        this.user = postDetails.user;
        this.profilePic = postDetails.profile_pic;
        this.postId = postDetails.post_id;
        this.itemName = postDetails.item_name ? postDetails.item_name : 'N/A';
        this.itemType = postDetails.item_type;
        this.itemBrand = postDetails.item_brand;
        this.itemModel = postDetails.item_model;
        this.purchasePrice = postDetails.purchase_price ? postDetails.purchase_price : 'N/A';
        this.warrantyStatus = postDetails.warrenty_date ? (new Date(postDetails.warrenty_date) > new Date() ? 'active' : 'expired') : 'N/A';
        //noimage.jpg is default image
        this.itemImage = postDetails.item_image ? postDetails.item_image : 'noimage.jpg';
        this.postType = postDetails.post_type;
        this.postTitle = postDetails.post_title;
        this.postDescription = postDetails.post_content;
        this.status = postDetails.status;
        this.createdAt = postDetails.created_at;
        this.upvotes = postDetails.upvote_count;
        this.downvotes = postDetails.downvote_count;
        this.commentCount = postDetails.comment_count;
        this.upvoted = postDetails.upvoted;
        this.downvoted = postDetails.downvoted;
        //check if null image list as string->array. if not null split
        this.images = postDetails.images ? postDetails.images.split(',') : [];
        this.comments = [];
        this.commentListElement = document.querySelector(".comment-section")
        this.fetchComments();

    }



    createPostElement() {
        let postElement = document.createElement('div');
        postElement.className = 'post';
        postElement.id = `post-${this.postId}`;
        postElement.innerHTML =
            `<div class="card">
                <div class="post-container">
                    <div class="card-header">
                        <div class="user-profile">
                            <img src="<?= ROOT?>/assets/images/profile-2.jpg">
                            <div>
                                <h3>${this.user}</h3>
                                <p class="text-muted">`+generateTimeAgoString(this.createdAt)+`</p>
                            </div>
                        </div>
                        <a class="post-type-tag">${this.postType}</a>
                    </div>
                    <div class="card-body">
                        <div class="card-row" id="about">
                            <h3 class="about-title">About</h3>
                            <div class="Item-details-tags"></div>
                        </div>

                        <p class="title"><b>${this.postTitle}</b></p>
                        <p class="text">${this.postDescription}</p>
                        <div class="image-grid"></div>

                    </div>
                    <div class="card-footer">
                        <div class="left activity-icons">
                            <a class="action upvote"><span class="material-symbols-outlined">shift</span><p class="count" id="upvote-count">${this.upvotes}</p></a>
                            <a class="action downvote"><span class="material-symbols-outlined">shift</span><p class="count" id="downvote-count">${this.downvotes}</p></a>
                            <a class="action comment"><span class="material-symbols-outlined">comment</span><p class="count" id="comment-count">${this.commentCount}</p></a>
                        </div>
                        <div class="right">
                            <a class="action"><span class="material-icons-sharp">flag</span></a>
                        </div>
                    </div>
                </div>
            </div>`

        let imageGrid = postElement.querySelector('.image-grid');
        if(this.images != null) {
            this.images.forEach((image) => {
                imageGrid.appendChild(this.createPostImageElement(image));
            });
        }

        //load Item-details-tags tag
        let itemDetailsTag = postElement.querySelector('.Item-details-tags');
        if(this.itemType.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemType));
        }
        if(this.itemBrand.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemBrand));
        }
        if(this.itemModel.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemModel));
        }

        //load profile pic
        if(this.profilePic != null) {
            let profilePic = postElement.querySelector('.user-profile img');
            profilePic.src = ROOT+'/assets/images/'+this.profilePic;
        }else{
            let profilePic = postElement.querySelector('.user-profile img');
            profilePic.src = ROOT+'/assets/images/profilepic/user.png';
        }

        //set upvoted and downvoted
        if(this.upvoted == 1) {
            let upvoteButton = postElement.querySelector('.upvote');
            upvoteButton.classList.add('active');
        }
        if(this.downvoted == 1) {
            let downvoteButton = postElement.querySelector('.downvote');
            downvoteButton.classList.add('active');
        }

        return postElement;

    }

    createScrapAndSellPostElement() {
        let postElement = document.createElement('div');
        postElement.className = 'post';
        postElement.id = `post-${this.postId}`;
        postElement.innerHTML =
            `<div class="card">
                <div class="post-container">
                    <div class="card-header">
                        <div class="user-profile">
                            <img src="<?= ROOT?>/assets/images/profile-2.jpg">
                            <div>
                                <h3>${this.user}</h3>
                                <p class="text-muted">`+generateTimeAgoString(this.createdAt)+`</p>
                            </div>
                        </div>
                        <a class="post-type-tag">${this.postType}</a>
                    </div>
                    <div class="card-body">
                        <div class="card-row" id="about">
                            <h3 class="about-title">About</h3>
                            <div class="Item-details-tags"></div>
                        </div>

                        <p class="title"><b>${this.postTitle}</b></p>
                        <div class="card" id="item-details">
                                <div class="item-details-for-scrap">
                                    <div class="card-body">
                                        <div class="card-row">
                                            <div class="image">
                                                <img id="item_image" src="${ROOT}/assets/images/uploads/${this.itemImage}">
                                            </div>
                                            <div class="card-col">
                                                <div class="card-row">
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Item Name</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_name">${this.itemName}</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Item Category</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_type2">${this.itemType}</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Brand</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_brand2">${this.itemBrand}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-row">
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Model</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_model2">${this.itemModel}</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Purchase Price</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="purchase_price">${this.purchasePrice}</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Warranty Status</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="warenty_status">${this.warrantyStatus}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <p class="text">${this.postDescription}</p>
                    </div>
                    <div class="card-footer">
                        <div class="left activity-icons">
                            <a class="action upvote"><span class="material-symbols-outlined">shift</span><p class="count" id="upvote-count">${this.upvotes}</p></a>
                            <a class="action downvote"><span class="material-symbols-outlined">shift</span><p class="count" id="downvote-count">${this.downvotes}</p></a>
                            <a class="action comment"><span class="material-symbols-outlined">comment</span><p class="count" id="comment-count">${this.commentCount}</p></a>
                        </div>
                        <div class="right">
                            <a class="action"><span class="material-icons-sharp">flag</span></a>
                        </div>
                    </div>
                </div>
            </div>`

        //load Item-details-tags tag
        let itemDetailsTag = postElement.querySelector('.Item-details-tags');
        if(this.itemType.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemType));
        }
        if(this.itemBrand.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemBrand));
        }
        if(this.itemModel.length>0) {
            itemDetailsTag.appendChild(this.createPostTagElement(this.itemModel));
        }

        //load profile pic
        if(this.profilePic != null) {
            let profilePic = postElement.querySelector('.user-profile img');
            profilePic.src = ROOT+'/assets/images/'+this.profilePic;
        }else{
            let profilePic = postElement.querySelector('.user-profile img');
            profilePic.src = ROOT+'/assets/images/profilepic/user.png';
        }

        //set upvoted and downvoted
        if(this.upvoted == 1) {
            let upvoteButton = postElement.querySelector('.upvote');
            upvoteButton.classList.add('active');
        }
        if(this.downvoted == 1) {
            let downvoteButton = postElement.querySelector('.downvote');
            downvoteButton.classList.add('active');
        }

        return postElement;

    }

    createPostElementWithEventListeners() {
        var postElement;
        if(this.postType == 'Scrap and Sell') {
            postElement = this.createScrapAndSellPostElement();
        }else if(this.postType == 'Ask Community') {
            postElement = this.createPostElement();
        }

        //event listener for upvote button
        const upvoteButton = postElement.querySelector('.upvote');
        upvoteButton.addEventListener('click', () => {
            community.upvotePost(this.postId);

        });

        //event listener for downvote button
        const downvoteButton = postElement.querySelector('.downvote');
        downvoteButton.addEventListener('click', () => {
            community.downvotePost(this.postId);
        });

        return postElement;
    }

    createPostImageElement(image) {
        let imageElement = document.createElement('div');
        imageElement.className = 'image';
        imageElement.innerHTML = `<img src="`+ROOT+`/assets/images/postimages/${image}">`;
        return imageElement;
    }

    createPostTagElement(tag) {
        let tagElement = document.createElement('a');
        tagElement.className = 'tag';
        tagElement.innerHTML = tag;
        return tagElement;
    }

    createPopularPostElement() {
        let popularPostElement = document.createElement('div');
        popularPostElement.className = 'update';
        popularPostElement.innerHTML = `
            <div class="profile-photo">
                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
            </div>
            <div class="message">
                <p><b>${this.user}</b> ${this.postTitle}</p>
                <small class="text-muted">`+generateTimeAgoString(this.createdAt)+`</small>
            </div>`

        //load profile pic
        if(this.profilePic != null) {
            let profilePic = popularPostElement.querySelector('.profile-photo img');
            profilePic.src = ROOT+'/assets/images/'+this.profilePic;
        }else{
            let profilePic = popularPostElement.querySelector('.profile-photo img');
            profilePic.src = ROOT+'/assets/images/profilepic/user.png';
        }


        return popularPostElement;
    }

    addUpvote() {
        if(this.downvoted) {
            this.removeDownvote();
        }
        if(this.upvoted == 0) {
            this.upvotes++;
            this.upvoted = 1;
        }else if(this.upvoted == 1) {
            this.upvotes--;
            this.upvoted = 0;
        }
        this.updatePostElement();
    }

    removeUpvote() {
        this.upvotes--;
        this.upvoted = 0;
    }

    addDownvote() {
        if(this.upvoted) {
            this.removeUpvote();
        }
        if(this.downvoted == 0) {
            this.downvotes++;
            this.downvoted = 1;
        }else if(this.downvoted == 1) {
            this.downvotes--;
            this.downvoted = 0;
        }
        this.updatePostElement();
    }

    removeDownvote() {
        this.downvotes--;
        this.downvoted = 0;
    }

    addComment(comment) {
        this.comments.push(comment);
        this.commentCount++;
        let commentCount = document.getElementById('comment-count');
        commentCount.innerHTML = this.commentCount;
    }

    removeComment() {
        this.commentCount--;
        let commentCount = document.getElementById('comment-count');
        commentCount.innerHTML = this.commentCount;
    }

    //using xhr same as community fetches post
    async fetchComments() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', ROOT+'/Community/getComments/'+this.postId);
        xhr.onload = () => {
            if(xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                console.log(response.length);
                if(!response) {
                    return;
                }
                response.forEach((comment) => {
                    this.comments.push(new Comment(comment));
                });
                console.log(this.comments);
            }
        }
        xhr.send();
    }

    renderComments(commentDiv) {
        this.comments.forEach((comment) => {
            console.log(this.comments)

            let commentElement = comment.createCommentElement();
            commentDiv.appendChild(commentElement);
        });
    }

    updatePostElement() {
        let postElement = document.querySelectorAll('#post-'+this.postId);
        console.log(postElement);
        postElement.forEach((element) => {
            let upvoteCount = element.querySelector('#upvote-count');
            let downvoteCount = element.querySelector('#downvote-count');
            let commentCount = element.querySelector('#comment-count');
            let upvoteButton = element.querySelector('.upvote');
            let downvoteButton = element.querySelector('.downvote');


            upvoteCount.innerHTML = this.upvotes;
            downvoteCount.innerHTML = this.downvotes;
            commentCount.innerHTML = this.commentCount;

            if (this.upvoted == 1) {
                upvoteButton.classList.add('active');
                downvoteButton.classList.remove('active');
            } else {
                upvoteButton.classList.remove('active');
            }
            if (this.downvoted == 1) {
                downvoteButton.classList.add('active');
                upvoteButton.classList.remove('active');
            } else {
                downvoteButton.classList.remove('active');
            }
        });
    }

    createComment(){
        let commentForm = document.getElementById('add-comment-form');
        if(commentForm.querySelector('textarea').value == '') {
            console.log('empty');
            return;
        }
        console.log(commentForm.querySelector('textarea').value);
        const data = new FormData(commentForm);
        data.append('post_id', this.postId);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', ROOT+'/Community/createComment');
        console.log(data);
        xhr.onload = () => {
            console.log(xhr.responseText);
            if(xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                console.log(response);
                if(response.success) {
                    const comment = new Comment(response.comment);
                    this.addComment(comment);
                    this.renderNewComment(comment);
                    commentForm.querySelector('textarea').value = '';
                }
            }
        }
        xhr.send(data);
    }

    renderNewComment(comment) {
        let commentDiv = document.querySelector('.comment-section');
        let commentElement = comment.createCommentElement();
        //ontop
        commentDiv.insertBefore(commentElement, commentDiv.firstChild);
    }


}



///////////////////////
//  Comment class   //
//////////////////////

class Comment {
    constructor(commentDetails) {
        this.commentId = commentDetails.commentId;
        this.userId = commentDetails.userId;
        this.userName = commentDetails.user;
        this.commentText = commentDetails.comment;
        this.commentDate = commentDetails.created_at;
        this.profilepic = commentDetails.profile_picture;


    }


    createCommentElement() {
        const commentElement = document.createElement('li');
                commentElement.className = 'comment';
                commentElement.innerHTML =`
                    <div class="comment-container">
                        <div class="comment-content">
                            <div class="comment-user-avatar">
                                <img src="${ROOT}/assets/images/profilepic/${this.profilepic}" alt="user avatar">
                            </div>
                            <div class="comment-data">
                                <div class="comment-data-header">
                                    <div class="comment-user-name">${this.userName}</div>
                                    <div class="comment-date">${generateTimeAgoString(this.commentDate)}</div>
                                </div>
                                <div class="comment-text">${this.commentText}</div>
                            </div>
                        </div>
                    </div>
                `;

                //set profile pic
                if(this.profilepic) {
                    console.log('profile pic not null');
                    let profilePic = commentElement.querySelector('.comment-user-avatar img');
                    profilePic.src = ROOT+'/assets/images/profilepic/'+this.profilepic;
                }else{
                    let profilePic = commentElement.querySelector('.comment-user-avatar img');
                    profilePic.src = ROOT+'/assets/images/profilepic/user.png';
                }
        return commentElement;
    }
}


function generateTimeAgoString(datetime) {
    const timestamp = new Date(datetime).getTime() / 1000;
    const currentTime = Math.floor(Date.now() / 1000);
    const timeDiff = currentTime - timestamp;

    const minute = 60;
    const hour = minute * 60;
    const day = hour * 24;
    const week = day * 7;
    const month = day * 30;

    let timeAgo;

    if (timeDiff < minute) {
        timeAgo = 'just now';
    } else if (timeDiff < hour) {
        const minutesAgo = Math.floor(timeDiff / minute);
        timeAgo = `${minutesAgo} minute${minutesAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < day) {
        const hoursAgo = Math.floor(timeDiff / hour);
        timeAgo = `${hoursAgo} hour${hoursAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < week) {
        const daysAgo = Math.floor(timeDiff / day);
        timeAgo = `${daysAgo} day${daysAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < month) {
        const weeksAgo = Math.floor(timeDiff / week);
        timeAgo = `${weeksAgo} week${weeksAgo > 1 ? 's' : ''} ago`;
    } else {
        const monthsAgo = Math.floor(timeDiff / month);
        timeAgo = `${monthsAgo} month${monthsAgo > 1 ? 's' : ''} ago`;
    }

    return timeAgo;
}



let community = new Community();

//search bar event listener
let searchBar = document.getElementById('searchBarInput');
searchBar.addEventListener('keyup', (e) => {
    if(e.keyCode == 13) {
        community.searchPostsAndRender(searchBar.value);
    }
});

//post a comment event listener
let commentButton = document.getElementById('add-comment-btn');
commentButton.addEventListener('click', () => {
    console.log('comment button clicked');
    post = community.getPostById(community.currentPost);
    console.log(post);
    post.createComment();

});

//load more posts event listener
let loadMoreButton = document.getElementById('load-more-btn');
loadMoreButton.addEventListener('click', () => {
    community.loadMorePosts();
});


