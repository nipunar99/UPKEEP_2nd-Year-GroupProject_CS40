<?php 

class Categories 
{
    use Model;

    protected $table = "categories";

    protected $allowedColumns = [
        "category_id",
        "category_name"
        
    ];
  
        public function getCategoryId($category_name){
            $query = "select category_id from $this->table where category_name = '$category_name' ";
            echo($category_name);
            return $this->query($query);
        }
}

          
        
    