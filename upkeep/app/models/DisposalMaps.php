<?php

class DisposalMaps
{

    use Model;

    protected $table = "disposal_place";

    protected $allowedColumns = [
        "category_id",
        "place_name",
        "city",
        "iframe_link",
    ];
    public function insertDisposalplaces($data)
    {

        try {
            // $itemtemplate_id = $_SESSION['id'];
            $this->insert($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    // public function delete($id, $id_column = "item_id"){

    //     $data[$id_column] = $id;
    //     $query = "delete from $this->table where $id_column = :$id_column";

    //     $this->query($query,$data);
    //     return false;
    // }

    // public function getLatestWarrentyDate($user_id){
    //     $query = "select item_name,warrenty_date from items WHERE owner_id =" . $user_id . " ORDER BY warrenty_date ASC LIMIT 1";
    //     return $this->query($query);
    // }


}
