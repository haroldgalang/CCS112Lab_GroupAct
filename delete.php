<?php
include_once('config.php');

$sticker_id = $_GET['sticker_id'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_sticker WHERE sticker_id = $sticker_id");

header("Location: homepage.php");
?>

<?php
        while ($item_data1 = mysqli_fetch_array($result2)) {
            echo "<div class='col s12 m7 l3'><div class='card' style='height: auto; width: 280px;'>";
            echo "<div class='card-image'>";
            echo "<img src='images/coverdump" . $item_data1['image'] ."' style='object-fit: cover; height: 220px;'";
            echo "<span class='card-title truncate".'">' . $item_data1['sticker_name'] . "</span></div>" ;
            echo "<div class='card-content'>";
            echo "<h4 class='black-text truncate'>₱" . $item_data1['sticker_price'] . "</h4>";
            echo "<h6 class='black-text truncate'>Stocks: " . $item_data1['sticker_quantity'] . "</h6>";
            echo "</div>";
            echo "<div class='card-action'><a href='#'>Buy This Book</a></div></div></div>";
        }
        ?>