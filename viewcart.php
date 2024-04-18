<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Shopping Cart</title>
</head>
<body>
  <?php
  session_start();

  if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $totalPrice = 0;

    echo "<h2>Your Cart Items</h2>";

    foreach($_SESSION['cart'] as $itemId => $itemDetails) {
      $stickerName = $itemDetails['name'];
      $stickerPrice = $itemDetails['price'];
      $itemQuantity = $itemDetails['quantity']; 
      echo "<p>$stickerName (Quantity: $itemQuantity) - Price: $$stickerPrice</p>";
      $totalPrice += $stickerPrice * $itemQuantity;
    }

    echo "<p><b>Total Price: $$totalPrice</b></p>";
  } else {
    echo "<h2>Your cart is empty.</h2>";
  }
  ?>
</body>
</html>
