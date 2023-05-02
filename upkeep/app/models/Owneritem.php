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
                    if($data["item_type"] == "Other"){
                        $data["item_type"] = $data["alter_type"];
                        unset($data["alter_type"]);
                    }
                    show($data);
                    $this->insert($data);
                    $_SESSION['item_id'] =$this->getLastID();
                    
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
        unset($_FILES);

    }
    

    public function delete($id, $id_column = "item_id"){
        
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";

        $this->query($query,$data);
        return false;
    }
  public function itemUsersCount($item_nme){
    $query = "select COUNT(*) FROM $this->table WHERE item_type = '$item_nme'";
    return  $this->query($query);
  }

    public function getLatestWarrentyDate($user_id){
        $query = "select item_name,warrenty_date from items WHERE owner_id =" . $user_id . " ORDER BY warrenty_date ASC LIMIT 1";
        return $this->query($query);
    }

    public function getLastID(){
        $query = "select MAX(item_id) as 'id' from items";
        return $this->query($query);
    }
}