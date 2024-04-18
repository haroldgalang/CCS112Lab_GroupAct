<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM tbl_sticker ORDER BY sticker_id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Kaisei+Tokumin&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>

<body class="grey darken-4 white-text text-darken-3">
    <div class="container">
        <h1>Sticker's Table</h1>
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

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>