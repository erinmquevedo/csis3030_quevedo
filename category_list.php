<?php 
include("global.php");
include("header.php");
?>

<div class="fullContent">
    <div class="row">
        <?php
$sql = "select * from categories order by category_name";
$result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class=\"large-4 columns text-center\"><a href='product_list.php?categories_id=" . $row["id"] . "'>" . $row["category_name"] . "</a></div>";}
?>
    </div>
</div>


<?php include("footer.php");?>





