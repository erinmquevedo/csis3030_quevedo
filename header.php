<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Hour</title>
    <link rel="stylesheet" href="css/app.css" />
    <link href='https://fonts.googleapis.com/css?family=Oswald|Titillium+Web:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>

<!-- Nav -->
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
        <h1><a href="index.php">Happy Hour</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
    <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="index.php">Home</a></li>
            <li class="has-dropdown">
            <a href="category_list.php">Booze</a>
            <ul class="dropdown">
                <?php 
                    $sql = "select * from categories order by category_name";
                    $result = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='product_list.php?categories_id=" . $row["id"] . "'>" . $row["category_name"] . "</a></li>";}
                ?>
            </ul>
            </li>
            <li class="active"><a href="cart_list.php">Shopping Cart</a></li>
        </ul>

    </section>
</nav>

<!-- End Nav -->
      
      
