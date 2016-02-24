<?php 
include("global.php");
include("header.php");
?>

<div class="fullContent"><div class="row">
<?

$session_id = session_id();
$sql = "select * from products where id = $_GET[product_id] order by product_name";
$result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class=\"large-6 columns\"><img src=\"images/" . $row["image"]  . "\"></div>";
    
    echo "<div class=\"large-6 columns\">";
    echo "<h4>" . $row["product_name"] . "</h4><hr />";
    echo "$" . $row["price"]  . "<br /><br />";
    echo "<form action=\"cart_process.php\" method=\"POST\"><div class=\"row\">
            <div class=\"small-6 columns\"><input type=\"text\" name=\"product_" . $row["id"] . "\" size=\"3\" placeholder=\"Quantity\" onkeyup=\"quantityAlert(this.value)\"><br /><span id=\"quantityAlert\"></span></div>
            <div class=\"small-6 columns text-center\"><input class=\"button round\" type=\"submit\" value=\"Get Some\"></div>
        </form><br /><br /><br /><br />";
    echo $row["description"] . "<br />";
    echo "<a href=\"product_quantity.php?product_id=" . $row["id"] . "\">Remaining</a>";
    echo "</div>";
    }
?>
</div></div>

<script>
var id= "<?php echo $row["id"]?>";

function quantityAlert() {
  var xhttp;
  if ("input".length == 0) { 
    document.getElementById("quantityAlert").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("quantityAlert").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "product_quantity.php?product_id="+id, true);
  xhttp.send();   
}
</script> 
    
<?php include("footer.php");?>


    
    
    








