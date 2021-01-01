<?php
require 'db.class.php';
$DB = new DB();
$target_dir = "images/products/";

if(isset( $_POST["pname"]) && isset($_POST["pprice"]))
{
    $pname = $_POST["pname"];
    $id = $_POST["id"];

    $pprice = $_POST["pprice"];
   if (strlen($pname) <= 3 || $pprice <1 ) {
       die;
   }
    $query = "UPDATE `products` set `name` = :pname, price = :pprice where id=:id;";

    $temparr = array(
        "pname"=> $pname,
        "pprice"=>$pprice,
        'id' => $id
    );


   $DB->query($query,$temparr);
   //echo ($result);
   $target_file = $target_dir . $id . '.jpg';
   unlink($target_file);
   move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
   

}

?>

<center><h3>Product updated, Redirecting in <span id="counter">3</span> seconds... </h3></center>
<script >
let x= 3;
setInterval(() => {
    if (x <= 0){
        
    window.location.href = "addproduct.php";
    return;
    }


    document.getElementById("counter").innerText = x;
    x--;
}, 800);


</script>