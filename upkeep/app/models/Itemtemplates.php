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
            $data["moderator_id"] = $_SESSION['user_id'];

            $this->insert($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //view parent id null itemtemplates
    public function completeItemTemplate()
    {
        $query = "select i.image,i.id, i.itemtemplate_name, i.description, i.status,i.moderator_id, c.category_name from itemtemplate i inner JOIN categories c on c.category_id = i.category_id where parent_id = 0 AND moderator_id > 0";

        return $this->query($query);
    }

    public function getBasicitem($id)
    {
        $query = "select i.image,i.id,i.category_id, i.itemtemplate_name, c.category_name, i.status from itemtemplate  i inner JOIN categories c on  c.category_id = i.category_id where id = $id[0]";
        return $this->query($query);
    }

    public function insertChildItem($data)
    {
        try {
            $data["moderator_id"] = $_SESSION['user_id'];
            $data['image'] = $_FILES['image']['name'];
            $this->insert($data);
            show($this->insert($data));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function viewChildItems($id)
    {
        $query = "select itemtemplate.category_id, itemtemplate.status, itemtemplate.description, itemtemplate.parent_id, categories.category_name, itemtemplate.itemtemplate_name, itemtemplate.id from itemtemplate  inner JOIN categories on  categories.category_id = itemtemplate.category_id where parent_id = $id";
        return $this->query($query);
    }
    public function updateChildItem($id, $data)
    {
        try {
            $data["moderator_id"] = $_SESSION['user_id'];
            $data['image'] = $_FILES['image']['name'];
            $this->update($id, $data, $data['id'] = "id");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
    public function getItemtemplateDetails($id){
        $query = "select *, categories.category_name  from $this->table inner JOIN categories where categories.category_id = $this->table.category_id AND $this->table.id = $id";
        return $this->query($query);
    }
    public function pending()
    {
        $query = "select * from $this->table where status='Pending'";
        return $this->query($query);
    }
    public function countTotalItemtemplate()
    {
        $query = "select COUNT(*) FROM $this->table where status = 'Approved' ";
        return $this->query($query);
    }
    public function countPendingItemtemplate()
    {
        $query = "SELECT COUNT(*) FROM $this->table where status='pending'";
        return $this->query($query);
    }
    public function getItemcountByCategories(){
        $query = " select c.category_name AS category , COUNT(*) AS total_item from itemtemplate AS i JOIN categories AS c ON i.category_id = c.category_id GROUP BY c.category_id ";
        return $this->query($query);
    }

    public function getSuggestionDetails(){
        $query = "select c.category_name, i.itemtemplate_name, i.image,i.id from $this->table i inner JOIN categories c on i.category_id = c.category_id where moderator_id = 0 AND status='Pending'";
        return $this->query($query);
    }
    
}

