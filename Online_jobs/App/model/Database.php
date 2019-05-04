<?php

class Database extends PDO{
    private $host = 'localhost';
    private $pass = '';
    private $user = 'root';
    private $dbname = 'online_jobs';
  
    public function __construct (){
         parent::__construct("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
    }
   
}
