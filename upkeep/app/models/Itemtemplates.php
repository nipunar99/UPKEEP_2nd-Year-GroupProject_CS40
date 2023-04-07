<?php 

class Itemtemplates 
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "id",
        "itemtemplate_name",
        "item_type",
        "type_id",
        "category",
        "status",
        "description",
        "moderator_id",
        "parent_id"
        
    ];
    public function insertItemtemplate($data){

        try{
            $data["moderator_id"] = $_SESSION['ID'];
            $this->insert($data);   
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }        
        }
        public function insertCategory($name,$status,$image, $type_id,$category,$description,$parent_id){

            // $keys = array_keys($data);
            // echo($keys);
    
          //  $query = "insert into $this->table (itemtemplate_name,image,status,type_id, category, parent_id) values ($keys->itemtemplate_name, ";
            
         //   $this->query($query,$data);


         $query = "insert into $this->table (itemtemplate_name,status,image,type_id, category,description, parent_id) values('$name','$status','$image', $type_id,'$category','$description',$parent_id)";
         return $this->query($query);
            // return false;
    
        }
        public function completeItemTemplate(){
            $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate i inner JOIN item_type i_type on  i_type.type_id = i.type_id where parent_id IS NULL ";
            return $this->query($query);
        }
       public function item($id){
        
        $query = "select i.image,i.id,i.category, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate  i inner JOIN item_type  i_type on  i_type.type_id = i.type_id where id = $id[0]";
        return $this->query($query);
        // $qu = "select itemtemplate_name where id = $id";
        // return(category($qu));

    

       }
    //    public function name($category_name){
    //     $query = "select category where  itemtemplate_name = $category_name[0]";
    //     return $this->query($query);
    //    }
       public function category($itemtemplate_name,$category_name){
        $query = "select itemtemplate.category,itemtemplate.description, item_type.type_name,itemtemplate.id from itemtemplate  inner JOIN item_type on  item_type.type_id = itemtemplate.type_id where  itemtemplate_name = '$itemtemplate_name' AND type_name = '$category_name'";
        return $this->query($query);
       }

        public function pending(){
         $query = "select * from itemtemplate where status='Pending'";
         return $this->query($query);
        }
        // public function viewItem($data){
        //     try{
        //         $data["moderator_id"] = $_SESSION['ID'];
        //         $this->insert($data);   
        //     }
        //     catch(PDOException $e){
        //         echo $e->getMessage();
        //     }        
            // $sql = "select * from `itemtemplate` where id=:id";
        // }  

        public function delete($id, $id_column = "id"){
        
            $data[$id_column] = $id;
            $query = "delete from $this->table where $id_column = :$id_column";
    
            $this->query($query,$data);
            return false;
        }
}

          
        
    