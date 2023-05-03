<?php 

class Categories 
{
    use Model;

    protected $table = "categories";

    protected $allowedColumns = [
        "category_id ",
        "category_name ",
    ];

}
