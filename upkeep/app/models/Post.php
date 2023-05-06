<?php

class Post
{
    use Model;

    private $allowed_columns = [
        'post_id',
        'user_id',
        'item_id',
        'untracked_item_id',
        'post_type',
        'post_title',
        'post_content',
        'status'
    ];

    private $validation_rules = [
        'post_title' => [
            'alpha',
            'required',
        ],

        'post_type' => [
            'alpha',
            'required',
        ],

        'status' => [
            'alpha',
            'required',
        ],
    ];

//    model for all database operations for posts even to query with search params




}