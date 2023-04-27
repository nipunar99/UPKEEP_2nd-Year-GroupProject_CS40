<?php

class Itemtemplates
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "id",
        "itemtemplate_name",
        "item_type",
        "image",
        "category_id",
        "status",
        "description",
        "moderator_id",
        "parent_id"

    ];
    public function insertItemtemplate($data)
    {

        try {
            $data["moderator_id"] = $_SESSION['ID'];

            $this->insert($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //view parent id null itemtemplates
    public function completeItemTemplate()
    {
        $query = "select i.image,i.id, i.itemtemplate_name, c.category_name, i.description, i.status from itemtemplate i inner JOIN categories c on c.category_id = i.category_id where parent_id IS NULL ";

        return $this->query($query);
    }

    public function getBasicitem($id)
    {

        $query = "select i.image,i.id,i.category_id, i.itemtemplate_name, c.category_name, i.status from itemtemplate  i inner JOIN categories c on  c.category_id = i.category_id where id = $id[0]";
        return $this->query($query);
    }
    public function viewChildItems($id)
    {
        $query = "select itemtemplate.category_id,itemtemplate.status,itemtemplate.description, categories.category_name,itemtemplate.itemtemplate_name,itemtemplate.id from itemtemplate  inner JOIN categories on  categories.category_id = itemtemplate.category_id where parent_id = '$id[0]'";
        return $this->query($query);
    }
    public function insertChildItem($data)
    {
        try {
            // $data["moderator_id"] = $_SESSION['ID'];

            $this->insert($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function inser($parent_id, $status, $description, $itemtemplate_name, $category_id)
    {
        $query = "insert into $this->table (itemtemplate_name,status,category_id,description, parent_id) values('$itemtemplate_name','$status', $category_id,'$description',$parent_id)";
        return $this->query($query);
    }

    public function deleteChildItemtemplate($id)
    {
        $this->delete($id);
    }

    public function findCategoryName($id)
    {
        $query = "select c.category_name from $this->table i inner JOIN categories c on  i.category_id = c.category_id where id = $id[0] ";
        return $this->query($query);
    }

    public function getItemtemplateById($id)
    {
        // show($id);
        $arr['id'] = $id;
        $item = $this->where($arr);
        return $item;
    }
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

    // public function delete($id, $id_column = "id"){

    //     $data[$id_column] = $id;
    //     $query = "delete from $this->table where $id_column = :$id_column";

    //     $this->query($query,$data);
    //     return false;
    // }