<?php
//Database class

Trait Database {

    private function connect(){

        $string = "mysql:hostname =".DBHOST.";dbname=".DBNAME;
        try{
            $con = new PDO($string,DBUSER,DBPASS);

            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $con;
        }
        catch(PDOException $e){
            echo "Database connection failed";
            die();
        }
    }

    public function query($query, $data=[]){
        $con = $this->connect();
        $stm = $con->prepare($query);

        //select * from users where user_role = :user_role 
        //select * from users where user_role = "moderator"
        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;
            }
            return false;
        }

    }

}


