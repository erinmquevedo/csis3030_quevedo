<?php 
include("global.php");
include("header.php");

$session_id = session_id();
$sql = "select * from products,cart where (cart.session_id='$session_id') and (cart.product_id = products.id)";
$result = mysqli_query($connection,$sql);
?>


<div class="fullContent">
    <div class="row">
        <form action="cart_process.php" method="POST" class="text-center">
            <?php 
                while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class=\"small-5 columns\">" . $row["product_name"] . "</div>";
                echo "<div class=\"small-2 columns\">$" . $row["price"] . " x</div>";    
                echo "<div class=\"small-2 columns\"><input type=\"text\" name=\"product_" . $row["product_id"] . "\" value=\"" . $row["quantity"] . "\" size=\"1\"></div>";
                echo "<div class=\"small-3 columns\"> = $" . $row["price"]*$row["quantity"]. "</div><br /><br />";}
            ?>
            <br />
            <input type="submit" name="update_cart" value="Update Cart" class="button round">
            <input type="submit" name="checkout" value="Checkout" class="button round">
        </form>
    </div></div>
    

<?php include("footer.php") ?>