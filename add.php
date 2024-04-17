<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $sticker_name = $_POST['sticker_name'];
    $sticker_set = $_POST['sticker_set'];
    $sticker_seller = $_POST['sticker_seller'];
    $sticker_price = $_POST['sticker_price'];
    $sticker_quantity = $_POST['sticker_quantity'];
    if ($_FILES["image"]["error"] === 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "<script> alert('Invalid File Format'); </script>";
        } else if ($fileSize > 1000000) {
            echo
            "<script> alert('Image size is too large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'images/coverdump' . $newImageName);
            $result = mysqli_query($mysqli, "INSERT INTO tbl_sticker(sticker_name, sticker_price, sticker_quantity, sticker_seller, sticker_set, image) VALUES('$sticker_name', '$sticker_price', '$sticker_quantity', '$sticker_seller', '$sticker_set', '$newImageName')" );
            include_once('config.php');
            echo
            "<script> alert('Successfully Added A New Sticker');
            document.location.href = 'homepage.php';
            </script>";
        }
    }
}
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
    <title>Add Book</title>
</head>

<body class="grey darken-4 white-text text-darken-3">
    <div class="container">

        <h1>Add Book</h1>
        <div class="row">
            <div class="col s12 m12 l2 offset-l10">
                <a href="homepage.php" class="waves-effect waves-light btn">Back<i class="material-icons right">arrow_back</i></a>
            </div>
        </div>
        <form action="" method="post" name="addForm" autocomplete="off" enctype="multipart/form-data">


            <label for="sticker_name">Sticker Name</label>
            <input type="text" name="sticker_name" required class="white-text">

            <label for="sticker_set">Sticker Set Number</label>
            <input type="text" name="sticker_set" required class="white-text">

            <label for="sticker_seller">Seller Name</label>
            <input type="text" name="sticker_seller" required class="white-text">

            <label for="sticker_price">Sticker Price</label>
            <input type="text" name="sticker_price" required class="white-text">

            <label for="sticker_quantity">Sticker Quantity</label>
            <input type="text" name="sticker_quantity" required class="white-text">

            <label for="upload">Upload Sticker Cover</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif" value="" class="waves-effect waves-light btn" required>

            <button type="submit" name="submit" class="waves-effect waves-light btn">Add Sticker</button>

        </form>
    </div>


    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>