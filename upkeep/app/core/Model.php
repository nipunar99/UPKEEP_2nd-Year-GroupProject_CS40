<?php

// Main Model trait

Trait Model
{

    use Database;

    // protected $table = '';
    public $limit = 10;
    public $offset = 0;
    public $order_type = "desc";
    public $order_column = "id";
    public $errors = [];

    public function findAll()
    {

        $query = "select * from $this->table limit $this->limit offset $this->offset";

        // make the query
        return $this->query($query);

    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . "= :" . $key . " && ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . "!= :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset"; // make the query

        $data = array_merge($data, $data_not); // mearge data arrays to put the query function as parameter

        return $this->query($query, $data);

    }

    public function first($data, $data_not = [])
    {

        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . "= :" . $key . " && ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . "!= :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset"; // make the query

        $data = array_merge($data, $data_not); // mearge data arrays to put the query function as parameter

        $result = $this->query($query, $data);

        if ($result) {
            return $result[0];
        }
        return false;

    }

    public function insert($data)
    {

        $keys = array_keys($data);

        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);

        return false;

    }

    public function insertAndGetLastIndex($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if($check){
            return $con->lastInsertId();
        } else {
            return false;
        }
    }

    public function delete($id, $id_column = "id")
    {

        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";

        $this->query($query, $data);
        return false;
    }

    public function update($id, $data, $id_column = "id")
    {

        $keys = array_keys($data);
        $query = "Update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ",";
        }

        $query = trim($query, ',');
        $query .= " where $id_column =:$id_column ";

        // echo $query;

        $data[$id_column] = $id;

        $this->query($query, $data);
        return false;
    }


    public function getColumns($cols=[],$where=[],$wherenot=[]){

            $query = "select ";

            if(empty($cols)){
                $query .= "* ";
            }else{
                $query .= implode(",",$cols);
            }

            $query .= " from $this->table ";

            if(!empty($where)){
                $query .= " where ";
                $keys = array_keys($where);
                foreach($keys as $key){
                    $query .= $key . "= :" . $key . " && ";
                }
                $query = trim($query, " && ");
            }

            if(!empty($wherenot)){
                $query .= " where ";
                $keys = array_keys($wherenot);
                foreach($keys as $key){
                    $query .= $key . "!= :" . $key . " && ";
                }
                $query = trim($query, " && ");
            }

            $query .= " limit $this->limit offset $this->offset"; // make the query

            $data = array_merge($where, $wherenot); // mearge data arrays to put the query function as parameter

            return $this->query($query, $data);

    }


    public function getError($key)
    {
        if (!empty($this->errors[$key]))
            return $this->errors[$key];

        return "";
    }

    protected function getPrimaryKey()
    {

        return $this->primaryKey ?? 'id';
    }

    public function validate($data)
    {

        $this->errors = [];

        if (!empty($this->validationRules)) {
            foreach ($this->validationRules as $column => $rules) {

                if (!isset($data[$column]))
                    continue;

                foreach ($rules as $rule) {

                    switch ($rule) {
                        case 'required':

                            if (empty($data[$column]))
                                $this->errors[$column] = ucfirst($column) . " is required";
                            break;
                        case 'email':

                            if (!filter_var(trim($data[$column]), FILTER_VALIDATE_EMAIL))
                                $this->errors[$column] = "Invalid Email";
                            break;
                        case 'alpha':

                            if (!preg_match("/^[a-zA-Z]+$/", trim($data[$column])))
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters without spaces";
                            break;
                        case 'alpha_space':

                            if (!preg_match("/^[a-zA-Z ]+$/", trim($data[$column])))
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & spaces";
                            break;
                        case 'alpha_numeric':

                            if (!preg_match("/^[a-zA-Z0-9]+$/", trim($data[$column])))
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & spaces";
                            break;
                        case 'alpha_numeric_symbol':

                            if (!preg_match("/^[a-zA-Z0-9\-\_\$\%\*\[\]\(\)\& ]+$/", trim($data[$column])))
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & spaces";
                            break;
                        case 'alpha_symbol':

                            if (!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\& ]+$/", trim($data[$column])))
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters & spaces";
                            break;

                        case 'not_less_than_8_chars':

                            if (strlen(trim($data[$column])) < 8)
                                $this->errors[$column] = ucfirst($column) . " should not be less than 8 characters";
                            break;

                        case 'unique':

                            $key = $this->getPrimaryKey();
                            if (!empty($data[$key])) {
                                //edit mode
                                if ($this->first([$column => $data[$column]], [$key => $data[$key]])) {
                                    $this->errors[$column] = ucfirst($column) . " should be unique";
                                }
                            } else {
                                //insert mode
                                if ($this->first([$column => $data[$column]])) {
                                    $this->errors[$column] = ucfirst($column) . " should be unique";
                                }
                            }
                            break;

                        default:
                            $this->errors['rules'] = "The rule " . $rule . " was not found!";
                            break;
                    }
                }
            }
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }


}