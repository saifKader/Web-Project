

<?php 
require 'db.class.php';

$db = new DB();
if (isset($_POST["name"])){
    $sqlCategorie = 'insert into categorie (categorie) values (:name);';

    $db->query($sqlCategorie, array('name'=>$_POST["name"]));
    
    echo ("Categorie Created");
    
    
} 


?>

<script>window.location.href = "addproduct.php"; </script>