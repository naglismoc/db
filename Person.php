<?php
class Person{

    public $id;
    public $name;
    public $surname;
    public $address;
    
    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->surname="";
        $this->address="";
        

    }
    public function getPerson($conn,$id){
        $sql = "SELECT * FROM `persons` where `persons`.`id`=".$id.";";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->id=$row['id'];
            $this->name=$row['name'];
            $this->surname=$row['surname'];
            $this->address=$row['address'];
         }
        return "zinute informacine";
    }
    public function setPerson($conn,$name,$surname,$address){
    }
    public function updatePerson($conn,$name,$surname,$address){
    }
    public function deletePerson($conn,$id){

        return "pavyko istrinti/nepavyko istrinti";
    }

    public function getAllPeople($conn){
        $sql = "SELECT * FROM `persons`;";
        $result = mysqli_query($conn,$sql);
        $people=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $person = new Person();
            $person->id=$row['id'];
            $person->name=$row['name'];
            $person->surname=$row['surname'];
            $person->address=$row['address'];
            array_push($people,$person);
         }
         return $people;
    }


}
?>