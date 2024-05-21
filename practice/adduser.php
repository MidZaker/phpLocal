<?php include('dbcon.php'); 

if(isset($_POST['add_user'])){
    $FName = $_POST['FName'];
     $LName = $_POST['LName'];
      $userAge = $_POST['userAge'];
      $userAddress = $_POST['userAddress'];


      if($FName == "" || empty ($FName)){
        header('location:zakk.php?delete_msg=You have to fill in the first name!');
      } else{
        $query = "insert into `useraccounts` (`FName`, `LName`, `userAge`, `userAddress`) value ('$FName', '$LName', '$userAge', $userAddress')";
        $result = mysqli_query($query);

        if(!$result){
            die("Query Failed" .mysqli_error());
        }
      }
    
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="adduser.css">
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form action="zakk.php" method="POST">
            <label for="FName">First Name:</label>
            <input type="text" id="FName" name="FName" required oninput="this.value = this.value.toUpperCase()"><br>

            <label for="LName">Last Name:</label>
            <input type="text" id="LName" name="LName" required oninput="this.value = this.value.toUpperCase()"><br>

            <label for="userAge">Age:</label>
            <input type="number" id="userAge" name="userAge" required min="1" max="100"  maxlength="3"><br>

            <label for="userAddress">Address:</label>
            <input type="text" id="userAddress" name="userAddress" required oninput="this.value = this.value.toUpperCase()"><br>

            <input type="submit" value="Add User" name="add_user">
        </form>
    </div>
</body>
</html>
