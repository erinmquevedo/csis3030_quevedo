<?php
include ("global.php");

$firstname = $_POST["firstname"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];

if ($firstname == "") {$errormessage = $errormessage . "First Name cannot be blank <br />";}
if ($address == "") {$errormessage = $errormessage . "Address cannot be blank <br />";}
if ($city == "") {$errormessage = $errormessage . "City cannot be blank <br />";}
if ($state == "") {$errormessage = $errormessage . "State cannot be blank <br />";}
if ($zip == "") {$errormessage = $errormessage . "Zip cannot be blank <br />";}


if ($errormessage != "") { //something in errormessage
    include("checkout_form.php");
    die();
}

include ("header.php");?>

<div class="banner">
    <div class="row">
        <h3 class="text-center"><?php echo "Your order was received.  Cheers!<br />";?></h3>
    </div>
</div>

<div class="fullContent"><div class="row">
    <h4>Order Confirmation ID: <?php echo session_ID();?></h4>
    <div class="large-6 columns">
        <?php echo "Order Summary<br />";
        $session_id = session_id();
        $sql = "select * from products,cart where (cart.session_id='$session_id') and (cart.product_id = products.id)";
        $result = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["product_name"] . " | QTY: " . $row["quantity"] . "<br />";
            $contents = $contents . $row["product_name"] . " | QTY: " . $row["quantity"] . "\n";
            $quantity_remaining = $row["quantity_remaining"] - $row["quantity"];
            //update quantity_remaining entry
            mysqli_query($connection,"update products set quantity_remaining='$quantity_remaining' where $row[product_id] = id");}?>

    </div>
    
    <div class="large-6 columns">
        <?php echo "Ship To: " . 
        $firstname . "<br />" . 
        $address . "<br />" . 
        $city . ", " . $state . "  " . $zip . "<br /><hr />";?>
    </div>
</div></div>

<?php
include("jwu_mail.php");      

		
$body = "Ship To: \n" . $firstname .  
        "\n" . $address . 
        "\n" . $city . ", " . $state . "  " . $zip . 
        "\n\nOrder Summary" . 
        "\n" . $contents;

jwu_mail("equevedo01@wildcats.jwu.edu","New Order",$body);

include("footer.php"); ?>