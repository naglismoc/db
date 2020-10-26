<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require '../objects/Person.php';
require '../objects/Book.php';
//     $p = new Person();
//     $p->getPerson($_GET["user_id"]);
// if(isset($_POST['updatePerson'])){
//     $p = new Person();
//     $p->updatePerson($_POST);
//     header("Location: ./index.php");
//     } 
if(isset($_POST['deleteBook'])){
    echo "paspaudei trinti ".$_POST['book_id']." knyga";
    $b = new Book();
    $b->getBook($_POST['book_id']);
    $b->deleteBook();
 }

 if(isset($_POST['addBook'])){
    // var_dump("wwwwwwwwwwwweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee");
    $p = new Book();
    $p->setBook($_POST);
 }

$book = new Book();
$books = $book->getBooks($_GET['person_id']);
echo ' <h1>Skaitovo knygos</h1>
<table>
<tr>
  <th>author</th>
  <th>title</th>
  <th>year</th>
  <th>pages</th>
  <th>edit</th>
  <th>delete</th>
</tr>';
foreach ($books as $book) {
//    $bookList = "";
//    foreach ($person->books as $book) {
//       $bookList .= $book->title.", ";
//       }
//       $bookList = substr( $bookList, 0, -2);
   echo 
   '<tr>
      <td> '.$book->author.'</td>
      <td> '.$book->title.'</td>
      <td> '.$book->year.'</td>
      <td> '.$book->pages.'</td>
      <td><a href="./editBook.php?book_id='.$book->id.'">Edit`a</a></td>
      <td>
         <form action="" method="post">
            <input type="hidden" name="book_id" value="'.$book->id.'">
            <button type="submit" name="deleteBook">trinti</button>
         </form>
      </td>
   </tr>';
    }
// ?>
<form action=""  method="post">
  <label for="name">author:</label><br>
  <input type="text"  name="author" ><br>

  <label for="surname">title:</label><br>
  <input type="text"  name="title" ><br><br>  
  
  <label for="address">year:</label><br>
  <input type="text"  name="year" ><br><br>
  <label for="address">pages:</label><br>
  <input type="text"  name="pages"><br><br>
  <input type="hidden"  name="person_id" value="<?=$_GET["person_id"]?>"><br><br>

  <input type="submit" name="addBook" value="Submit">
</form>

<!-- <form action=""  method="post">
  <label for="name">author:</label><br>
  <input type="text"  name="author" value="<?=$b->author?>"><br>

  <label for="surname">title:</label><br>
  <input type="text"  name="title" value="<?=$b->title?>"><br><br>  
  
  <label for="address">year:</label><br>
  <input type="text"  name="year" value="<?=$b->year?>"><br><br>
  <label for="address">pages:</label><br>
  <input type="text"  name="pages" value="<?=$b->pages?>"><br><br>
  <input type="hidden"  name="book_id" value="<?=$_GET["person_id"]?>"><br><br>

  <input type="submit" name="updateBook" value="Submit">
</form>  -->
</body>
</html>
