<?php

class ADM{

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

    public function register($username,$password,$sex,$usertype){
    	$result = mysqli_query($this->connection,"INSERT INTO admusersaig(username,password,sex,usertype )VALUES('$username','$password','$sex','$usertype')");
    	 return $result;

    }

 public function verifylogin($username,$password){
 	$result=mysqli_query($this->connection,"SELECT * FROM admusersaig WHERE username = '$username' AND password = '$password'");
       	return $result;
    }

 public function Deleteusers($username,$password){
    $result=mysqli_query($this->connection,"DELETE FROM admusersaig WHERE username = '$username' AND password = '$password'");
    return $result;
 }
 public function resetpassword($password){
    $result=mysqli_query($this->connection,"UPDATE admusersaig SET  password = '$password'");
    return $result;
 }
 public function addnewuser($username,$password,$sex,$usertype)
 {
     $result=mysqli_query($this->connection,"INSERT INTO admusersaig(username,password,sex,usertype )VALUES('$username','$password','$sex','$usertype')");
     if ($result) {
         $msg='<strong>Success,New user added !</strong>';
         return $msg;
     }
         else{

            $msg='<strong>Error! Something went wrong</strong>';
            return $msg;
         }
     }
      }

  /*   $connect = mysqli_connect("localhost","root","","asteriskaig"); OR $db = mysqli_connect("localhost","root","","asteriskaig"); //You can use any variable
       $insert = "INSERT INTO admusersaig(username,password,sex,usertype) VALUES('$username','$password','$sex','$usertype')";
       $sql or   $query = "SELECT * FROM admusersaig WHERE username = $username AND password = $password";
      //Store records in one variable $result
       $result = mysqli_query($connect,$insert,$query);

//Using while loop to fetch all data from the database and we have a $row variable = mysqli_fetch_array() function with a parameter mysqli_query $result which is stored in the $result variable
//The function will convert mysli_query $result into associative array and stored into $row variable
      while($row = mysqli_fetch_array($result)){

        //Now we print the data
        echo $row["username"];
        echo $row["password"];
      } */
