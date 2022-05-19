<?php
class DBConfig {

 public $db       = 'ogsdb';
 public $server   = 'localhost';
 public $username = 'root';
 public $password = '';

 public function GetConnectionString() {
  return new PDO('mysql:host=' . $this->server . ';dbname=' . $this->db, $this->username, $this->password);
 }
}

?>