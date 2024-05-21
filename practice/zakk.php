<?php include('dbcon.php'); ?>
<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="zakk.css">
  <title>Dashboard</title>
</head>

<body>
 
  <div class ="tablebody_center">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Address</th>
        <th>Update</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php 

      //dri connection ni sya for the server sa database and e loop sa tables //

     $query = "select * from `useraccounts`";

     $result = mysqli_query($connection, $query);

     if(!$result) {
      die("query Failed" .mysqli_error());
     }
     else{
      while($row = mysqli_fetch_assoc($result)){
         ?>
  <tr>
        <td><?php echo $row['user_Id']; ?></td>
         <td><?php echo $row['FName'];  ?></td>
          <td><?php echo $row['LName'];  ?></td>
           <td><?php echo $row['userAddress'];  ?></td>
       <td><a href="update_page1.php?user_Id=<?php echo $row['user_Id']; ?>">Update</a></td>
          <td><a href="#" onclick="confirmDelete(<?php echo $row['user_Id']; ?>)">Delete</a></td>
      </tr>
<?php
      }
     }

    ?>
      
    </tbody>
  </table>

<?php
if(isset($_GET['delete_msg'])){
    $deleteMsg = $_GET['delete_msg'];
    echo "<h6 id='deleteMsg'>$deleteMsg</h6>";
}
?>
  </div>

  <script>
    function confirmDelete(userId) {
        var confirmation = confirm("Are you sure you want to delete this record?");
        if (confirmation) {
            // If user confirms, redirect to delete_page1.php with user id
            window.location.href = "delete_page1.php?id=" + userId;
        } else {
            // If user cancels, do nothing
        }
    }
</script>



  <script>
    // e Remove ang delete_msg parameter after 3 seconds
    setTimeout(function() {
        var urlWithoutDeleteMsg = window.location.href.split('?')[0];
        history.replaceState({}, document.title, urlWithoutDeleteMsg);
         location.reload(); //e  Refresh the page
    }, 3000);
</script>


  <script>
    function redirectToAddUser() {
      window.location.href = "adduser.php";
    }
    </script>
</body>
</html>