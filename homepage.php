<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
echo '<script type="text/JavaScript">  
$(document).ready(function () {
    $(".sidenav").sidenav();
  });
     </script>' 
; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Kaisei+Tokumin&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Monopoly Go Organization</title>
</head>

<body class="grey darken-4 white-text text-darken-3">

    <div class="parallax-container z-depth-2">
        <div class="parallax"><img class="responsive-img" src="images/imageRes/monoWallpaper.png"></div>
    </div>

    <nav class="pushpin-demo-nav" data-target="pinnednavbar" style="z-index: 90;" id="navMain">
        <div class="nav-wrapper grey darken-4 z-depth-4">
            <div>
                <a href="#top-page" class="brand-logo center">Monopoly Go Organization</a>
                <ul id="nav-mobile" class="left">
                    <li>
                        <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="right">
                    <li>
                        <a href="#!"><i class="material-icons">account_circle</i></a>
                    </li>
                    <li>
                        <a href="#!" class="dropdown-trigger" data-target="dropdown1"><i class="material-icons">more_vert</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav grey darken-4 white-text text-darken-3">
        <li>
            <div class="user-view">
                <div class="background">
                    <img class="responsive-img" src="images/TheInternational2023.png">
                </div>
                <a href="#user"><img class="circle" src="https://th.bing.com/th/id/OIP.3_rmocxtbNOqkWF4cCFkdwAAAA?rs=1&pid=ImgDetMain"></a>
                <a href="#name"><span class="white-text name">OG Notail</span></a>
                <a href="#email"><span class="white-text email">bigdaddynotail@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!" class="white-text"><i class="material-icons white-text">account_circle</i>My Account</a></li>
        <li><a href="#!" class="white-text"><i class="material-icons white-text">exit_to_app</i>Logout</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader white-text">More Settings</a></li>
        <li><a href="#!" class="white-text"><i class="material-icons white-text">settings</i>General Settings</a></li>
        <li><a href="#about-page" class="sidenav-close white-text"><i class="material-icons white-text">find_in_page</i>About page</a></li>
        <li><a href="#support-page" class="sidenav-close white-text"><i class="material-icons white-text">share</i>Support
                Us</a></li>
    </ul>

    <ul id='dropdown1' class='dropdown-content grey darken-4'>
        <li><a href="#!">Feedback</a></li>
        <li><a href="#!">FAQ</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#about-page">about</a></li>
    </ul>

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
        <a class="waves-effect waves-light btn-large z-depth-2" href="add.php"><i class="material-icons right">shop</i>Sell Stickers</a>
    </div>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>