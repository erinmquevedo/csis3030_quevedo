<?php 
include("global.php");
include("header.php");
?>

<div id="category">
    <div class="row"><div class="large-12 columns text-center">
        <?php
        $sql = "select category_name from categories where id = $_GET[categories_id]";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_assoc($result);
        echo  "<h1>" . $row["category_name"] . "</h1>";
        ?>
    </div></div>
</div>

<div class="fullContent">
    <div class="row">
        <?php
        $sql = "select * from products where category_id = $_GET[categories_id] order by product_name";
        $result = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class=\"large-6 columns text-center\">";
            echo "<img src=\"images/" . $row["image"]  . "\"><br /><hr />";
            echo $row["product_name"] . " | $" . $row["price"]  . "<br />";
            echo "<a href=\"product_detail.php?product_id=" . $row["id"] . "\">View More</a><br />";
            echo "</div>";
        } 
        ?>
    </div>
</div>


<?php include("footer.php");?>








