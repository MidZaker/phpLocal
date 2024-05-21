<?php 

define("HOSTNAME" , "localhost");
define("USERNAME" , "root");
define("PASSWORD" , "");
define("DATABASE", "useraccount");


$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if(!$connection){   
    die("Connection Failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if add_user button is clicked for insertion
    if (isset($_POST['add_user'])) {
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $userAge = $_POST['userAge'];
        $userAddress = $_POST['userAddress'];

        // Insert query
        $query = "INSERT INTO useraccounts (FName, LName, userAge, userAddress) 
                  VALUES ('$FName', '$LName', '$userAge', '$userAddress')";
        
        if(mysqli_query($connection, $query)) {
            // Redirect back to zakk.php after successful submission
            header("Location: zakk.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }
    }
}



if (isset($_POST['add_user'])) {
        $FName = $_POST['FName'];
      $LName = $_POST['LName'];
      $userAge = $_POST['userAge'];
      $userAddress = $_POST['userAddress'];

    // Assuming user_Id is auto-incremented by the database
    $query = "INSERT INTO useraccounts (FName, LName, userAge, userAddress) VALUES ('$FName', '$LName', '$userAge', '$userAddress')";
    
    if(mysqli_query($connection, $query)) {
        // Redirect back to zakk.php after successful submission
        header("Location: zakk.php");
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}



if(isset($_POST['delete_user'])) {
    $userId = $_POST['user_id']; // Retrieve the user ID from the form
    
    // Query to delete user from database
    $deleteQuery = "DELETE FROM useraccounts WHERE user_Id = '$userId'";
    
    if(mysqli_query($connection, $deleteQuery)) {
        // Redirect back to the same page after deletion
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

?>