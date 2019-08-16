
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php



//Displaying the the create, read, update, and delete functionalities depends on the value of the query variable
//display. They are displayed by including the files that handle these functionalities 
if(isset($_GET['display'])){
    $display = $_GET['display'];
    //display the form that adds book if the query string variable 'display' is set to 'create'
    if($display == 'create'){
    include_once("create.php");
    //display the list of books  if the query string variable 'display' is set to 'list'
    } elseif($display == 'list'){
        include_once("list.php");
        //display the details of the book if the query string variable 'display' is set to 'details'
    } elseif($display == 'details'){
        include_once("details.php");
        //display the form that edits the book if the query string variable 'display' is set to 'edit'
    } elseif($display == 'edit'){
        include_once("edit.php");
    }
}
?>
    
</body>
</html>

