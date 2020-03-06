<?php
class DBStrings {
  private $servername = "some ip address"; 
  private $username = "username";
  private $password = "password";
  private $dbname = "database name";

  public function getServer(){
    return $this->servername;
  }
  public function getUser(){
    return $this->username;
  }
  public function getPass(){
    return $this->password;
  }
  public function getDB(){
    return $this->dbname;
  }
}
?>
