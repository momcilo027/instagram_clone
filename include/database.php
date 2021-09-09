<?php

class Database{
  public $connection;

  function __construct(){
    $this->connection();
  }

  public function connection(){
    $host = "localhost";
    $admin = "root";
    $password = "";
    $db_name = "instagram_app";
    $this->connection = mysqli_connect($host, $admin, $password, $db_name);
    if($this->connection){
      return $this->connection;
    }else{
      die($this->connection);
      echo mysqli_connect_errno()." -> ".mysqli_connect_error();
    }
  }
}
$database = new Database();

 ?>
