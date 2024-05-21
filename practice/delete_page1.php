<?php
include('dbcon.php');

if(isset($_GET['id'])){
    $user_Id = $_GET['id'];

    $query = "DELETE FROM useraccounts WHERE user_Id = '$user_Id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($connection));
    } else {
        
        header('location:zakk.php?delete_msg=You have deleted the record.');
         exit();
    }
} else {
    // Handle case when user_Id is not provided
    echo "User ID not provided.";
}
?>
