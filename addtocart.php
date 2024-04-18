<?php
session_start();

// Check if item ID is provided
if(isset($_GET['sticker_id']) && !empty($_GET['sticker_id'])) {
  $sticker_id = $_GET['sticker_id'];

  // Include the configuration file
  include_once("config.php");

  // Retrieve sticker details from the database based on the provided ID
  $result = mysqli_query($mysqli, "SELECT * FROM tbl_sticker WHERE sticker_id='$sticker_id'");

  if(mysqli_num_rows($result) == 1) {
    // Fetch sticker details
    $row = mysqli_fetch_assoc($result);
    $sticker_name = $row['sticker_name'];
    $sticker_price = $row['sticker_price'];

    // Add sticker to the cart session
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      // If item already exists in the cart, update the quantity
      if(array_key_exists($sticker_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$sticker_id]['quantity']++;
      } else {
        // If item does not exist in the cart, add it
        $_SESSION['cart'][$sticker_id] = array(
          'name' => $sticker_name,
          'price' => $sticker_price,
          'quantity' => 1
        );
      }
    } else {
      // If cart session does not exist, create it and add item
      $_SESSION['cart'] = array(
        $sticker_id => array(
          'name' => $sticker_name,
          'price' => $sticker_price,
          'quantity' => 1
        )
      );
    }

    // Redirect to homepage or cart page (optional message)
    header("Location: homepage.php");
    // echo "Sticker added to cart successfully!"; // Optional success message
  } else {
    echo "Sticker not found.";
  }
} else {
  echo "Invalid sticker ID.";
}
?>