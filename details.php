<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        h2{
            font-size: 1.50em;
            border-bottom-style: solid;
            border-bottom-color: goldenrod;
            border-spacing: 15px;
         }
    </style>


</head>
<body>
<!--include the processInfo.php file so we can use the variables from that file-->
<?php require_once 'processInfo.php'; ?>
<div class ="container">
<h2>Book Information</h2>
<!--Dispaly the book's information and the "edit information" and "Delete" in the details section of the page -->
<p><strong>Title:</strong> <?php echo $title?></p>
<p><strong>Author:</strong><?php echo $author?></p>
<p><strong>Date Published:</strong><?php echo $date?></p>
<a href = "header.php?display=edit&id=<?php echo $row['id']; ?>" class ="btn btn-primary">Edit Information</a>
<a href = "list.php?delete=<?php echo $row['id']; ?>" class ="btn btn-danger">Delete</a>
</div>


    
</body>
</html>