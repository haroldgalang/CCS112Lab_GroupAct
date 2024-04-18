<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Kaisei+Tokumin&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Monopoly Go Organization</title>
</head>

<body class="grey darken-4 white-text text-darken-3">

    <div class="parallax-container z-depth-2">
        <div class="parallax"><img class="responsive-img" src="images/imageRes/monoWallpaper.webp"></div>
    </div>

    <div class="container">
        <h2>Stickers</h2>
    </div>
    
    <div class="container">
        <div class="row">
            <?php
            while ($item_data1 = mysqli_fetch_array($result2)) {
                echo "<div class='col s6 m7 l3'>";
                echo "<div class='card' style='height: auto; width: 200px;'>";
                echo "<div class='card-image'>";
                echo "<img src='images/coverdump" . $item_data1['image'] . "'style='object-fit: cover; height: 275px;'>";
                echo '<span class="card-title truncate">' . $item_data1['sticker_name'];
                echo '</span></div> <div class="card-content" style="height: 140px">';
                echo '<p class="black-text truncate">';
                echo "<i class='material-icons right-align'>store_mall_directory</i>" . $item_data1['sticker_seller'] . "</p>";
                echo '<h5 class="black-text truncate">₱' . $item_data1['sticker_price'] . "</h5>";
                echo "<h6 class='black-text truncate'>Stocks: " . $item_data1['sticker_quantity'] . "</h6>";
                echo "</div>";
                echo "<div class='card-action'><a href='#'><i class='material-icons'>add_shopping_cart</i>add to cart</a></div></div></div>";
            }
            ?>
        </div>
        
        <a class="waves-effect waves-light btn-large z-depth-2" href="add.php"><i class="material-icons right">add</i>Add Sticker</a>
    </div>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>