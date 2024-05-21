<?php include('dbcon.php'); ?>

<?php 
if(isset($_GET['user_Id'])){
    $user_Id = $_GET['user_Id'];


$query = "SELECT * FROM `useraccounts` WHERE `user_Id` = '$user_Id'";
$result = mysqli_query($connection, $query);

if(!$result){
    die("Query Failed" . mysqli_error());
} else {
    $row = mysqli_fetch_assoc($result);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adduser.css">
    <title>Update User</title>
</head>
<body>
     <div class="container">
        <h1>Update User</h1>
 <?php 
       if(isset($_POST['update_student'])){
    if(isset($_GET['user_Id_new'])){
        $idnew = $_GET['user_Id_new'];
            }
            $FName = $_POST['FName'];
            $LName = $_POST['LName'];
            $userAge = $_POST['userAge'];
            $userAddress = $_POST['userAddress'];

            // Update the existing record
            $query = "UPDATE `useraccounts` 
                    SET `FName` = '$FName', `LName` = '$LName', `userAge` = '$userAge', `userAddress` = '$userAddress' 
                    WHERE `user_Id` = '$idnew'";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query Failed" . mysqli_error());
            } else {
                // Redirect to zakk.php after successful update
                header('location:zakk.php?update_msg=You have successfully updated the data.');
                exit();
            }
        }
        ?>



        <form action="update_page1.php?user_Id_new=<?php echo $user_Id; ?>" method="POST">
            <label for="FName">First Name:</label>
            <input type="text" id="FName" name="FName" required oninput="this.value = this.value.toUpperCase()" value="<?php echo $row['FName'] ?>"><br>

            <label for="LName">Last Name:</label>
            <input type="text" id="LName" name="LName" required oninput="this.value = this.value.toUpperCase()" value="<?php echo $row['LName'] ?>"><br>

            <label for="userAge">Age:</label>
            <input type="number" id="userAge" name="userAge" required min="1" max="100"  maxlength="3" value="<?php echo $row['userAge'] ?>"><br>

            <label for="userAddress">Address:</label>
            <input type="text" id="userAddress" name="userAddress" required oninput="this.value = this.value.toUpperCase()" value="<?php echo $row['userAddress'] ?>"><br>

            <input type="submit" name="update_student" value="UPDATE">
        </form>
    </div>
    
</body>
</html>