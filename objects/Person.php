<?php
    require 'Dbh.php';
    class Person extends Dbh{

        public $id;
        public $name;
        public $surname;
        public $address;
        public $books;
        
        public function __construct(){
            $this->id=0;
            $this->name="";
            $this->surname="";
            $this->address="";
            $this->books=[];
            

        }
        public function getPerson($id){
            $sql = "SELECT * FROM `persons` where `persons`.`id`=".$id.";";
            $result = $this->connect()->query($sql);
            // $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $this->id=$row['id'];
                $this->name=$row['name'];
                $this->surname=$row['surname'];
                $this->address=$row['address'];
                $this->books = Book::getBooks($this->id);
            }
            return $this;
        }
        public function setPerson($post){
            $this->name=$post['name'];
            $this->surname=$post['surname'];
            $this->address=$post['address'];
            $conn = $this->connect();
            $conn->query(
                "INSERT INTO `persons` (`id`, `name`, `surname`, `address`)
                 VALUES (NULL, '".$post['name']."', '".$post['surname']."', '".$post['address']."');"
            );
          
        }
        public function updatePerson($post){
            $this->connect()->query(
                "UPDATE `persons` 
                SET 
                `name` = '".$post['name']."',
                `surname` = '".$post['surname']."',
                `address` = '".$post['address']."' 
                WHERE `persons`.`id` = ".$post['person_id'].";"
            );
            $this->name=$post['name'];
            $this->surname=$post['surname'];
            $this->address=$post['address'];
            // var_dump($this);die;
            $this->id = $conn->insert_id;
        }
        public function deletePerson(){
           if(!$this->connect()->query("DELETE FROM `persons` WHERE `persons`.`id` = '".$this->id."';")){
            echo "neina trint, nes apsiskaites zmogus";
           }else{
                $this->id=0;
                $this->name="";
                $this->surname="";
                $this->address="";
            }
        }

    
        public function getAllPeople(){
            $sql = "SELECT * FROM `persons`;";
            $person = new Person();
            $result = $person->connect()->query($sql);
            $people=[];
            while ($row = mysqli_fetch_assoc($result)) {
                $person = new Person();
                $person->id=$row['id'];
                $person->name=$row['name'];
                $person->surname=$row['surname'];
                $person->address=$row['address'];
                $person->books = Book::getBooks($person->id);
                array_push($people,$person);
            }
            return $people;
        }


    }
?>