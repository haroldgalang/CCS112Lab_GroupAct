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
    </div>


    <div class="container">

        <a class="waves-effect waves-light btn-large z-depth-2" href="add.php"><i class="material-icons right">add</i>Add Sticker</a>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>
                        Sticker ID
                    </th>
                    <th>
                        Sticker Name
                    </th>
                    <th>
                        Sticker Seller
                    </th>
                    <th>
                        Sticker Set
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Stocks
                    </th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($item_data = mysqli_fetch_array($result)) {
                    echo
                    "<tr>
                        <td>" . $item_data['sticker_id'] . "</td>
                        <td>" . $item_data['sticker_name'] . "</td>
                        <td>" . $item_data['sticker_seller'] . "</td>
                        <td>" . $item_data['sticker_set'] . "</td>
                        <td>₱" . $item_data['sticker_price'] . "</td>
                        <td>" . $item_data['sticker_quantity'] . "</td>
                        <td>
                            <a href='edit.php?sticker_id=$item_data[sticker_id]'>Edit</a> | <a href='delete.php?sticker_id=$item_data[sticker_id]'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <blockquote style="font-weight: lighter;">This is a simple Library Management and Book Store System. This web-based program offers Crud ADD, EDIT and DELETE having the abilty for the user to interact with the library. This is a prelim project to submit in this subject in CCS112: Applications Development and Emerging Technologies. Thank you for using this website!</blockquote>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>