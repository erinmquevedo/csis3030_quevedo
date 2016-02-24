<?php 
include("global.php");
include("header.php");
?>

<div class="fullContent">
    <div class="row">
    <div class="large-6 columns text-center">
        <h4><?php echo "Order Summary<br />";?></h4>
        <?php
        $session_id = session_id();
        $sql = "select * from products,cart where (cart.session_id='$session_id') and (cart.product_id = products.id)";
        $result = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["product_name"] . " | QTY: " . $row["quantity"] . "<br />";}
        ?>
    </div>
    
    <div class="large-6 columns">
        <span style="color: red;"><?php echo $errormessage; ?></span>
        <form action="checkout_process.php" method="POST">
            <div class="large-12 columns"><input type="text" name="firstname" value="<?php echo $_POST["firstname"];?>" placeholder="First Name"></div>
            <div class="large-12 columns"><input type="text" name="address" value="<?php echo $_POST["address"];?>" placeholder="Address"></div>
            <div class="large-6 columns"><input type="text" name="city" value="<?php echo $_POST["city"];?>" placeholder="City"></div>
            <div class="large-3 columns"><input type="text" name="state" value="<?php echo $_POST["state"];?>" placeholder="State"></div>
            <div class="large-3 columns"><input type="text" name="zip" value="<?php echo $_POST["zip"];?>" placeholder="Zip"></div>
            <input type="submit" value="Place Order" class="large-12 columns button round">
        </form>
        <hr />
    </div>
    </div>
</div>

<?php include("footer.php");?>



