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
        public function setBook($post){

            $this->author=$post['author'];
            $this->title=$post['title'];
            $this->year=$post['year'];
            $this->pages=$post['pages'];
            $this->person_id=$post['person_id'];
            $conn = $this->connect();
            // var_dump(  "INSERT INTO `books` (`id`, `author`, `title`, `year`, `pages`, `person_id`)
            // VALUES (NULL, ".$this->author.", ".$this->title.", ".$this->year.", ".$this->pages.", '4');");die;
            $conn->query(
           "INSERT INTO `books` (`id`, `author`, `title`, `year`, `pages`, `person_id`)
            VALUES (NULL, 'asdf', 'asdfg', '4645', '45', '2');");
            $conn->query(
                "INSERT INTO `books` (`id`, `author`, `title`, `year`, `pages`, `person_id`)
                 VALUES (NULL, '".$this->author."', '".$this->title."', '".$this->year."', '".$this->pages."', '4');"
            );
            $this->id = $conn->insert_id;
        }
        public function updateBook($post){
            $this->author=$post['author'];
            $this->title=$post['title'];
            $this->year=$post['year'];
            $this->pages=$post['pages'];
            $this->person_id=$post['person_id'];
            $this->connect()->query(
                "UPDATE `books` 
                SET 
                `author` = '$this->author',
                `title` = '$this->title',
                `year` = '$this->year' ,
                `pages` = '$this->pages'
                WHERE `books`.`id` = ".$this->id.";"
            );
            $this->id = $conn->insert_id;
        }
        public function deleteBook(){
            $this->connect()->query("DELETE FROM `books` WHERE `books`.`id` = '".$this->id."';");
            $this->id=0;
            $this->author="";
            $this->title="";
            $this->year="";
            $this->pages="";
            $this->person_id="";
                

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