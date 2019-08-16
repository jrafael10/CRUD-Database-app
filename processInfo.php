<?php

//connecting to  mysql using my  hostname, username, password,  and db name
// Or  return the error description if the connection fails
$mysqli = new mysqli('localhost', 'jrcd102193', 'mypass123', 'book') or die(mysqli_error($mysqli));



//Retrieve the date, title, and author through POST request
if(isset($_POST['submitInfo'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];      

   //make a new record in the database and insert the mewly-retrieved data
    $mysqli->query("INSERT INTO info (title, author, date_published, status) VALUES ('$title', '$author', '$date', 'active')") or die($mysqli->error());

    
    header("Location: header.php?display=list");
}
//Delete a book through GET request using the book's id and update its status to 'deleted' in the database when the delete button is clicked
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $mysqli->query("DELETE FROM info WHERE id = $id") or die($mysqli->error());
    $mysqli->query("UPDATE info SET status ='deleted' WHERE id = '$id'")  or die($mysqli->error());
    header("Location: header.php?display=list");
}

//When edit button is clicked, book's id is retrieved from the query string and use it
//to retrieve the books's information from the database and to update its status to 'pending'
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM info WHERE id=$id") or die($mysqli->error());
    $mysqli->query("UPDATE info SET status = 'pending' WHERE id = '$id'") or die($mysqli->error());
    
    //fetching the book's information from the database
    //and save it to variables
    if(count($result) == 1){
    $row = $result->fetch_array();
    $title = $row['title'];
    $author = $row['author'];
     $publishedDate = $row['date_published'];
     //change the date formate from YYYY-MM-DD to Monthe day, year
    $date = date("F d, Y", strtotime($publishedDate));   
    }
}

//Retrieve the information from the form that edits the book information through POST request and use it to update 
// the book's information in the database
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];

    $timeStamp = date('Y-m-d H:i:s');

    $mysqli->query("UPDATE info SET title ='$title', author='$author', date_published='$date', last_modified='$timeStamp', status = 'active' WHERE id = '$id'")
    or die($mysqli->error());
    header("Location: header.php?display=list");
}

?>
