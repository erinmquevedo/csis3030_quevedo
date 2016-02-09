<?php 
include("global.php");
include("header.php");


    $sql = "select category_name from categories where id = $_GET[id]";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    echo $row["category_name"];


    $sql = "select * from items where category_id = $_GET[id]";
    $result = mysqli_query($connection,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["product_name"] . $row["period"] . $row["quantity_remaining"] . $row["description"];
    }

include("footer.php");?>





