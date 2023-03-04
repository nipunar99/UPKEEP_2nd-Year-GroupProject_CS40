<?php 

class Owneritem {

    use Model;

    protected $table ="items";

    protected $allowedColumns = [
        "item_name",
        "item_type",
        "brand",
        "model",
        "purchase_price",
        "description",
        "purchase_date",
        "warrenty_date",
        "image",
        "owner_id",
    ];

    public function insertItem($data){

        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        $location= "../public/assets/images/uploads/".$file_name;

        if($file_size < 524000){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    $data["owner_id"] = $_SESSION['user_id'];
                    $data["image"] = $file_name;
                    // show($data);
                    $this->insert($data);
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
    }

    public function delete($id, $id_column = "item_id"){
        
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";

        $this->query($query,$data);
        return false;
    }
  
}