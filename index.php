<?php
echo "labas<br>";
require 'connect.php';
require 'Person.php';

$sql = "SELECT * FROM `persons`;";
$sql2 = "SELECT * FROM `persons` inner join books on persons.id = books.person_id;";

$result = mysqli_query($conn,$sql2);

// print_r($result);
while ($row = mysqli_fetch_assoc($result)) {
   echo $row['person_id']." ".$row['name']." ".$row['surname']." ".$row['address'].
   "  perskaite: ".$row['author']." ".$row['title']." ".$row['year']." ".$row['pages']."<br>";
}
echo "<br>"."<br>"."<br>";
$person = new Person();
echo $person->getPerson($conn, 5);
echo $person->surname;
$people = Person::getAllPeople($conn);
foreach ($people as $key => $person) {
   echo $person->name."<br>";
}
// $person = Person::getPerson($conn,4);
echo "<br>"."<br>"."<br>";










// function consoleLog($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
?>