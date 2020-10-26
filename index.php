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

<?php

require './objects/Person.php';
require './objects/Book.php';

if(isset($_POST['deletePerson'])){
   echo "paspaudei trinti ".$_POST['person_id']." zmogu";
   $p = new Person();
   $p->getPerson($_POST['person_id']);
   $p->deletePerson();
}

if(isset($_POST['addPerson'])){
   // var_dump("wwwwwwwwwwwweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee");
   $p = new Person();
   $p->setPerson($_POST);
}



$people = Person::getAllPeople();

echo '<h1>Klubo nariai</h1>';
?>

<form action=""  method="post">
  <label for="name">First name:</label><br>
  <input type="text"  name="name" value=""><br>

  <label for="surname">Last name:</label><br>
  <input type="text"  name="surname" value=""><br><br>  
  
  <label for="address">address:</label><br>
  <input type="text"  name="address" value=""><br><br>

  <input type="submit" name="addPerson" value="Submit">
</form> 

<?php
echo '
<table>
<tr>
  <th>name</th>
  <th>surname</th>
  <th>address</th>
  <th>boooks</th>
  <th>show boooks</th>
  <th>edit</th>
  <th>delete</th>
</tr>';
foreach ($people as $person) {
   $bookList = "";
   foreach ($person->books as $book) {
      $bookList .= $book->title.", ";
      }
      $bookList = substr( $bookList, 0, -2);
   echo 
   '<tr>
      <td> '.$person->name.'</td>
      <td> '.$person->surname.'</td>
      <td> '.$person->address.'</td>
      <td> '.$bookList.'</td>
      <td> <a href="./books/showBooks.php?person_id='.$person->id.'">show books</a></td>
      <td><a href="./editPerson.php?person_id='.$person->id.'">Edit`a</a></td>
      <td>
         <form action="" method="post">
            <input type="hidden" name="person_id" value="'.$person->id.'">
            <button type="submit" name="deletePerson">trinti</button>
         </form>
      </td>
   </tr>';
  
 
}
// $person = Person::getPerson($conn,4);
echo "</table><br>"."<br>"."<br>";

$book = new Book();
// print_r($book->getBook(7));

// $person = new Person();
// $person->setPerson('Rimantas','Belovas','Vilnius');
$person = new Person();
$person->getPerson(5);
print_r($person);
// $person->updatePerson('Rimantas2','Belovas2','Vilnius2');
// print_r($person);
// $person->deletePerson();
// print_r($person);

$person->deletePerson();







// function consoleLog($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
?>