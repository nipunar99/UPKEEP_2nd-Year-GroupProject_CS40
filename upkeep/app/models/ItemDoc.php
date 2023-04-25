<?php 

class ItemDoc {

    use Model;

    protected $table ="item_document";

    // protected $allowedColumns = [
    //     "item_name",
    //     "item_type",
    //     "brand",
    //     "model",
    //     "purchase_price",
    //     "description",
    //     "purchase_date",
    //     "warrenty_date",
    //     "image",
    //     "owner_id",
    // ];

    public function insertDocs($data=[]){
        // show($_FILES);
        foreach ($_FILES as $file_key => $file_data) {
            show($file_key);
            $file_name = $file_data['name'];
            $file_temp = $file_data['tmp_name'];
            $file_size = $file_data['size'];
            $file_type = $file_data['type'];
            $location= "../public/assets/images/uploads/".$file_name;

            if($file_size < 524000){
                if(move_uploaded_file($file_temp,$location)){
                    try{
                        if (!empty($data)) {
                            $arr["item_id"] = $_SESSION['item_id'];
                            $arr["document_name"] = $data['document_name'];
                        }else{
                            $arr["item_id"] = $_SESSION['item_id'][0]->id;
                            $arr["document_name"] = $file_key;
                        }
                        $arr["file_name"] = $file_name;
                        show($arr);
                        $this->insert($arr);
                        
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
            }
        }
        unset($_FILES);

    }
    

    // public function delete($id, $id_column = "item_id"){
        
    //     $data[$id_column] = $id;
    //     $query = "delete from $this->table where $id_column = :$id_column";

    //     $this->query($query,$data);
    //     return false;
    // }
}