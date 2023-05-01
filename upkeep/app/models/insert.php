<?php
    include "<?=ROOT?>/core/config.php";

    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $phone_number = $_POST['mobile_number'];
    


    $query = "INSERT INTO moderators(first_name , last_name , email , nic , address , mobile_no ) values(?,?,?,?,?,?)";
    
    $statment = $connection->prepare($query);

    $statment->bind_param("sssiss" , $first_name , $last_name , $email , $nic , $address , $phone_number);
    $statment->execute();







?>