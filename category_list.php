<?php 
include("global.php");
include("header.php");

$sql = "select * from categories";
$result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_assoc($result)) {
echo "<li><a href='product_list.php?category_id=" . $row["id"] . "'>" . $row["category_name"] . "</a></li>";}


include("footer.php");?>





