<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'upkeep');

if(issert($_POST['delete']))

{
    $id = $_POST['id'];

    $query = "DELETE FROM moderators WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:adminDashboard.view.php");

    }
    else{
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}



if(isset($_POST['delete_student']))
{
    $student_id= $_POST['delete_student'];

    try{
        $query = "DELETE FROM moderators WHERE id=:user_id";
        $statement = $conn->prepare($query);
        $data =[':user_id' =>$student_id];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location:adminDashboard.view.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not Updated";
            header('Location:adminDashboard.view.php');
            exit(0);
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}