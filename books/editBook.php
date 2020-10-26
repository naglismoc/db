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
    $b = new Book();
    $b->getBook($_GET["book_id"]);
if(isset($_POST['updateBook'])){
    $b = new Book();
    $b->getBook($_POST["book_id"]);
    $_POST['person_id']=$b->person_id;
    // var_dump($b);die;
    $b->updateBook($_POST);
 
    header("Location: ./showBooks.php?person_id=".$b->person_id);
    } 

?>
<form action=""  method="post">
  <label for="author">author:</label><br>
  <input type="text"  name="author" value="<?=$b->author?>"><br>

  <label for="title">title:</label><br>
  <input type="text"  name="title" value="<?=$b->title?>"><br><br>  
  
  <label for="year">year:</label><br>
  <input type="text"  name="year" value="<?=$b->year?>"><br><br>
  <label for="pages">pages:</label><br>
  <input type="text"  name="pages" value="<?=$b->pages?>"><br><br>
  <input type="hidden"  name="book_id" value="<?=$_GET["book_id"]?>"><br><br>

  <input type="submit" name="updateBook" value="Submit">
</form>  
</body>
</html>
