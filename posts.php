<?php

class Post{
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $database = 'asteriskaig';

  protected $connection;

  public function __construct(){

      if (!isset($this->connection)) {

          $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

          if (!$this->connection) {
              echo 'Cannot connect to database server';
              exit;
          }
      }


  }

public function registerposts($content){

        $result = mysqli_query($this->connection,"INSERT INTO aigposts(content)VALUES('$content')");
         return $result;

    }

     public function selectposts(){

         $result = mysqli_query($this->connection,"SELECT * FROM aigposts");
         return $result;
     }


 }
 ?>
