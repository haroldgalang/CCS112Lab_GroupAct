<?php
include_once("config.php");

if (isset($_POST['sticker_id'])) {
    $sticker_id = $_POST['sticker_id'];
    $sticker_name = $_POST['sticker_name'];
    $sticker_author = $_POST['sticker_seller'];
    $sticker_category = $_POST['sticker_set'];
    $sticker_price = $_POST['sticker_price'];
    $sticker_quantity = $_POST['sticker_quantity'];

    $result = mysqli_query($mysqli, "UPDATE tbl_sticker SET sticker_name = '$sticker_name', sticker_seller = '$sticker_seller', sticker_set = '$sticker_set', sticker_price = '$sticker_price',sticker_quantity = '$sticker_quantity' WHERE sticker_id = $sticker_id");

    header("Location: homepage.php");
}
?>

<?php
$sticker_id = $_GET['sticker_id'];

$result = mysqli_query($mysqli, "SELECT * FROM tbl_sticker WHERE sticker_id = '$sticker_id'");

while ($item_data = mysqli_fetch_array($result)) {
    $sticker_name = $item_data['sticker_name'];
    $sticker_seller = $item_data['sticker_seller'];
    $sticker_set = $item_data['sticker_set'];
    $sticker_price = $item_data['sticker_price'];
    $sticker_quantity = $item_data['sticker_quantity'];
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Kaisei+Tokumin&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Edit Stickers</title>
</head>

<body class="grey darken-4 white-text text-darken-3">
    <div class="container">

    <h2>Edit Sticker Info</h2>
        <div class="row">
            <div class="col s12 m12 l2 offset-l10">
                <a href="homepage.php" class="waves-effect waves-light btn">Back<i class="material-icons right">arrow_back</i></a>
            </div>
        </div>
        <form name="update_book" method="post" action="edit.php">
            <table>
                <tr>
                    <td>Sticker Name</td>
                    <td><input type="text" name="sticker_name" required class="white-text" value='<?php echo $sticker_name; ?>'></td>
                </tr>
                <tr>
                    <td>Seller</td>
                    <td><input type="text" name="sticker_seller" required class="white-text" value='<?php echo $sticker_seller; ?>'></td>
                </tr>
                <tr>
                    <td>Sticker Set</td>
                    <td><input type="text" name="sticker_set" required class="white-text" value='<?php echo $sticker_set; ?>'></td>
                </tr>
                <tr>
                    <td>Sticker Price</td>
                    <td><input type="text" name="sticker_price" required class="white-text" value='<?php echo $sticker_price; ?>'></td>
                </tr>
                <tr>
                    <td>Sticker Quantity</td>
                    <td><input type="text" name="sticker_quantity" required class="white-text" value='<?php echo $sticker_quantity; ?>'></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="sticker_id" value=<?php echo $_GET['sticker_id']; ?>></td>
                    <td><button type="submit" name="submit" class="waves-effect waves-light btn">Save<i class="material-icons right">save</i></button></td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>