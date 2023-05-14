class Post {
    constructor(postDetails) {
        this.data = postDetails;
        // this.userId = postDetails.user_id;
        // this.userName = postDetails.user_name;
        // console.log(postDetails.user)
        this.user = postDetails.user;
        this.profilePic = postDetails.profile_pic;
        this.postId = postDetails.post_id;
        this.itemType = postDetails.item_type;
        this.itemBrand = postDetails.item_brand;
        this.itemModel = postDetails.item_model;
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
        // this.fetchComments();

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

        return postElement;

    }

    createPostImageElement(image) {
        let imageElement = document.createElement('div');
        imageElement.className = 'image';
        imageElement.innerHTML = `<img src="<?= ROOT ?>/assets/images/postimages/${image}">`;
        return imageElement;
    }

    createPostTagElement(tag) {
        let tagElement = document.createElement('a');
        tagElement.className = 'tag';
        tagElement.innerHTML = tag;
        return tagElement;
    }


}


