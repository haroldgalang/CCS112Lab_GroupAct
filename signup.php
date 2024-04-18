<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to your database (using your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "prelimdb";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the INSERT query
    $stmt = $conn->prepare("INSERT INTO tblUsers (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        header("Location: login.php");
        exit();
        
    } else {
        echo "Error in registration";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="./login.css">
</head>
<body>

<div class="login-form">
    <form action="signup.php" method="POST"> <!-- Specify method as POST -->
        <h1 style="text-align: center; color: green; font-weight: bold;">SIGN UP</h1>
        <div class="content">
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" autocomplete="nope"> 
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" autocomplete="nope">  
            </div>
            <div class="action">
                <button type="submit">REGISTER</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
