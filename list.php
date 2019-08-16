<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Document</title>

    <style>
  table {
    border-collapse: collapse;
   
  }
  th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
  }
  tr:nth-child(even) {
    background-color: #eee;
  }
  tr:nth-child(odd) {
    background-color: #fff;
  }            
</style>
</head>
<body>

<?php require_once 'processInfo.php'; ?>

<?php

//connecting to  mysql using my  hostname, username, password,  and db name
// Or  return the error description if the connection fails
$mysqli = new mysqli( 'localhost', 'jrcd102193', 'mypass123', 'book') or die($mysqli_error($mysqli));

//Retrieve all the data from the table info or return the error message if the retrieval fails
$result = $mysqli->query("SELECT * FROM info") or die($mysqli->error());
//pre_r($result);

//pre_r($result->fetch_assoc());
/*
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
*/

?>

<div class = container>


<table class = "table" >
<thead>
  <tr>
  <!--Display the content of the table headings-->
    <th>Date Published</th>
    <th>Author Name</th>
    <th>Book Title</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  </thead>
  
  <?php
    //Retrieve each record using fetch_assoc()
    while ($row = $result->fetch_assoc()): ?>
    <tr>
        <!--Display the book records on each row of the table, including the delete, edit-post, and 
        view-details buttons-->
        <td><?php echo $row['date_published']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['title'];?></td>
        <td><a href = "list.php?delete=<?php echo $row['id']; ?>" class ="btn btn-danger">Delete</a></td>
        <td><a href = "header.php?display=edit&id=<?php echo $row['id']; ?>" class ="btn btn-primary">Edit Post</a></td>
        
        <td><a href = "header.php?display=details&id=<?php echo $row['id']; ?>" class ="btn btn-primary">View Details</a></td>
    </tr>
<?php endwhile;?>
</table>
<a href = "header.php?display=<?php echo 'create'; ?>" class ="btn btn-primary">Add Book</a></td>
</body>
</html>