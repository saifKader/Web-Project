<?php
class DB{
 private $host = 'localhost';
 private $username = 'root';
 private $password = '';
 private $database = 'tuto';
 private $db;

 public function __construct($host = null , $username = null , $password = null , $database = null){
     if ($host != null){
        $this->host =$host;
        $this->username =$username;
        $this->password =$password;
        $this->database =$database;
     }
     try{
     $this->db = new PDO('mysql:host=' .$this->host. ';dbname='.$this->database, $this->username, $this->password,
     array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
//     echo 'database init';
     $initdb = "CREATE TABLE if not exists `products` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `price` float NOT NULL DEFAULT 0,
        `categorie` varchar(50),
        `quantity` int(100),
        PRIMARY KEY (id),
        FOREIGN KEY (categorie) REFERENCES categorie(categorie)
      );
      CREATE TABLE if not exists `categorie` ( `categorie` VARCHAR(50) NOT NULL , PRIMARY KEY (`categorie`));
      ";
      $this->db->exec($initdb);
     //echo 'database init complete';

     }catch(PDOException $e){
         die('impossible de se connecter a la base de donnee');
     }
 }
 public function query($sql, $data = array()){
    $req =$this->db->prepare($sql);
    $req->execute($data);
    return $req->fetchALL(PDO::FETCH_OBJ);
 }
 public function insertWLID($sql, $data = array()){
    $req =$this->db->prepare($sql);
    $req->execute($data);
    $req->fetchALL(PDO::FETCH_OBJ);
    return $this->db->lastInsertId();
 }
}

