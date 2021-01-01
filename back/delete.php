<?php
require 'db.class.php';
$DB = new DB();

$pid = $_GET["id"];
$sql = "delete from products where id = :pid";

$DB->query($sql, array("pid"=>$pid));

header('location:addproduct.php');


?>