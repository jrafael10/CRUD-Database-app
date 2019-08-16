# CRUD-Database-app

This app is a form that allows user to create, read, update and delete book information from a database using the the following
technologies.
<li>Php</li>
<li>MySQL</li>
<li>HTML5</li>
<li>CSS3</li>
<li>jQuery</li>
<li>Bootstrap 4.3.1</li>

The app will display the following functionality depending on the query string variable <strong>display</strong>. By default,
the page will display the list of books from the database.
Functionalities: 
<li><strong>List all books:</strong>--will be displayed if the query string variable is set to <strong>list.</strong> From this page
users can access the add, edit, and delete functionality.</li>
<li><strong>Add a book:</strong>--will be displayed if the query string variable is set to <strong>create.</strong>The form is validated
using JQuery before it can be submitted.</li>
<li><strong>View Book Details:</strong>--will be displayed if the query variable is set to <strong>details</strong></li>
<li><strong>Edit Book Details:</strong>-- will be displayed if the query string variable is set to <strong>edit.</strong>The 
form is validated using javascript before it can be submitted. This form will look exactly like the add form except that it contains
current values for the record being edited.</li>
