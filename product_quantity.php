<?php
include ("global.php");

$sql = "select * from products where id = $_GET[product_id]";
$result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row["quantity_remaining"] . "<br />";
    }

// get quantity typed
$product_id = $_REQUEST["product_id"];
$alert = "Not enough product to fufill demand";

// if something is typed in quantity 
if ($product_id !== "") {
    echo $alert;
    // if quantity typed is greater than quantity_remaining
    // show quantityAlert
    
    // else do nothing



}
?>