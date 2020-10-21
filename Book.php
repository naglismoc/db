<?php
    // require 'Dbh.php';
    class Book extends Dbh{

        public $id;
        public $author;
        public $title;
        public $year;
        public $pages;
        public $person_id;
        
        public function __construct(){
            $this->id=0;
            $this->author="";
            $this->title="";
            $this->year="";
            $this->pages="";
            $this->person_id="";
            

        }
        public function getBook($id){
            $sql = "SELECT * FROM `books` where `books`.`id`=".$id.";";
            $result = $this->connect()->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $this->id=$row['id'];
                $this->author=$row['author'];
                $this->title=$row['title'];
                $this->year=$row['year'];
                $this->pages=$row['pages'];
                $this->person_id=$row['person_id'];
            }
            return $this;
        }
        public function getBooks($id){
            $sql = "SELECT * FROM `books` where `books`.`person_id`=".$id.";";
            $book = new Book();
            $result = $book->connect()->query($sql);
            $books=[];
            while ($row = mysqli_fetch_assoc($result)) {
                $book = new Book();
                $book->id=$row['id'];
                $book->author=$row['author'];
                $book->title=$row['title'];
                $book->year=$row['year'];
                $book->pages=$row['pages'];
                $book->person_id=$row['person_id'];
                array_push($books,$book);
            }
            return $books;

        }
        public function setBook($conn,$name,$surname,$address){
        }
        public function updateBook($conn,$name,$surname,$address){
        }
        public function deleteBook($conn,$id){

            return "pavyko istrinti/nepavyko istrinti";
        }

        // public function getAllPeople(){
        //     $sql = "SELECT * FROM `persons`;";
        //     // $result = mysqli_query($conn,$sql);
        //     $person = new Person();
        //     $result = $person->connect()->query($sql);
        //     $people=[];
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $person = new Person();
        //         $person->id=$row['id'];
        //         $person->name=$row['name'];
        //         $person->surname=$row['surname'];
        //         $person->address=$row['address'];
        //         array_push($people,$person);
        //     }
        //     return $people;
        // }


    }
?>