<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require './objects/Person.php';
require './objects/Book.php';
    $p = new Person();
    $p->getPerson($_GET["user_id"]);
if(isset($_POST['updatePerson'])){
    $p = new Person();
    $p->updatePerson($_POST);
    header("Location: ./index.php");
    } 

?>
<form action=""  method="post">
  <label for="name">First name:</label><br>
  <input type="text"  name="name" value="<?=$p->name?>"><br>

  <label for="surname">Last name:</label><br>
  <input type="text"  name="surname" value="<?=$p->surname?>"><br><br>  
  
  <label for="address">address:</label><br>
  <input type="text"  name="address" value="<?=$p->address?>"><br><br>
  <input type="hidden"  name="user_id" value="<?=$_GET["user_id"]?>"><br><br>

  <input type="submit" name="updatePerson" value="Submit">
</form> 
</body>
</html>
