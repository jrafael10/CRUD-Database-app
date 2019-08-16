<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>BOOk INFO</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
    <style>
        .submit-btn{
            background-color: goldenrod;
            color: white;
            width: 200px;

        }
        .form-group{
            width: 75%;
        }
        h2{
            font-size: 1.50em;
            border-bottom-style: solid;
            border-bottom-color: goldenrod;
            border-spacing: 15px;
        }

        .errorTitle, .errorAuthor, .errorDateFormat{
          font-size: .75em;
          color: green;
        }


    </style>

<body>

<!--The form that handles the addition of books to the list-->
<div class ="container">
    <h2>Book Information</h2>
    <form action="processInfo.php" method="POST">
        
        <div class="form-group">
        <label for="booktitle">Title</label>
        <input type="text" id="booktitle" class="form-control" name="title" placeholder="Book title">
        </div>

        <div class="form-group">
        <label for="bookauthor">Author</label>
        <input type="text" id="bookauthor" class="form-control" name="author" placeholder="Book Author">
      </div>
      <div class="form-group">
        <label for="datepublished">Date Published</label>
        <input type="text" id="datepublished" class="form-control" name="date" placeholder="YYYY-MM-DD">
      </div>
      <div class =form-group>
      <button type="submit" class="btn btn-warning submit-btn" name="submitInfo">Submit</button>
      </div>
    </form>
</div>



<!---JavaSCript section-->
<script src = "https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>

$('#booktitle').after('<span class ="errorTitle">Please enter the title of the book.</span>');  
$('.errorTitle').hide();
$('#bookauthor').after('<span class ="errorAuthor">Please enter the author of the book.</span>');  
$('.errorAuthor').hide();
$('#datepublished').after('<span class ="errorDateFormat">Please enter the correct format of the date(YYYY-MM-DD).</span>');  
$('.errorDateFormat').hide();


//function that handles the validation for the author and title input fields
function inputField(name, error){ 
const validateField = name.trim().length > 0;
if(validateField === false){
    
    $(error).show();
      $(name).focus()
}  else {
    $(error).hide();
}
return validateField;
}
//function that handles the validation of the date format
function validateDate(format){
  if(format ==false){
    $('.errorDateFormat').show();
      $('.errorDateFormat').focus();


     } else {
      $('.errorDateFormat').hide();
     }

   return format;  
}
//form is submitted if the user passed the validation. Otherwise, form is not submitted
  function validateAuthorTitleDate() {
  const $title= $('#booktitle').val();
  const errorTitle = $('.errorTitle');
  const errorAuthor = $('.errorAuthor');
  const $author = $('#bookauthor').val();
  const date = $('#datepublished').val().trim();
  const dateFormat = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/.test(date);
  let valid = false;
  console.log(validateDate(dateFormat))
   if(inputField($title, errorTitle) && inputField($author, errorAuthor)  && validateDate(dateFormat)){
   
     valid = true;
   } else {
     
    validateDate(dateFormat);
    inputField($title, errorTitle) ;
     inputField($author, errorAuthor);
     valid = false;
   }
   return valid;
}



//form is submitted if the user passed the validation. Otherwise, form is not submitted
$('.submit-btn').on('click', function(e){
  
  if(validateAuthorTitleDate() === false){
   
    e.preventDefault();
  }  
    else {
       $('form').submit();
    }
    
    
});

  
</script>
    
</body>
</html>