

<?php
echo "labas<br>";
require 'connect.php';
require 'Person.php';
require 'Book.php';

if(isset($_POST['id'])){
   echo "paspaudei trinti ".$_POST['id']." zmogu";
   $p = new Person();
   $p->getPerson($_POST['id']);
   $p->deletePerson();
}


$sql = "SELECT * FROM `persons`;";
$sql2 = "SELECT * FROM `persons` inner join books on persons.id = books.person_id;";

// $result = mysqli_query($conn,$sql2);

// print_r($result);
// while ($row = mysqli_fetch_assoc($result)) {
//    echo $row['person_id']." ".$row['name']." ".$row['surname']." ".$row['address'].
//    "  perskaite: ".$row['author']." ".$row['title']." ".$row['year']." ".$row['pages']."<br>";
// }
echo "<br>"."<br>"."<br>";
$person = new Person();
$person->getPerson(3);
echo "<br>"."<br>"."<br>";
echo $person->surname;
$people = Person::getAllPeople();
echo "<br>"."<br>"."<br>";
foreach ($people as $person) {
   echo $person->name.'<form action="" method="post">
   <input type="hidden" name="id" value="'.$person->id.'">
   <button type="submit">trinti</button></form>';
   // foreach ($person->books as $book) {
   //   echo $book->title.", ";
   // }
   echo "<br>";
}
// $person = Person::getPerson($conn,4);
echo "<br>"."<br>"."<br>";

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