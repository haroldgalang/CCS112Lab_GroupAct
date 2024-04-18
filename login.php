<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        header("Location: signup.php");
        exit();
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "prelimdb";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $password = $_POST['password'];
        $username = $_POST['username'];

        $stmt = $conn->prepare("SELECT * FROM tblUsers WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: homepage.php?notification=success");
            exit();
        } else {
            header("Location: login.php?notification=error");
            exit();
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="style.css">
    <script src="./script.js"></script>
</head>

<body>
    <div class="login-form">
        <form action="login.php" method="POST"> <!-- Specify method as POST -->
            <h1 style="text-align: center; color: green; font-weight: bold;">LOGIN</h1>
            <div class="content">
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" autocomplete="nope"> <!-- Add name attribute for username -->
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" autocomplete="new-password"> <!-- Add name attribute for password -->
                    <br>
                    <div id="notification" style="color: #FF0000;"></div>
                    <br>
                    <div class="action">
                        <button type="submit" name="register">Register</button>
                        <button type="submit">Sign in</button>
                    </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const notification = urlParams.get('notification');

            const notificationElement = document.getElementById('notification');

            if (notification === 'success') {
                notificationElement.innerText = "Login successful. Redirecting to homepage...";
                setTimeout(function () {
                    window.location.href = "homepage.php";
                }, 3000);
            } else if (notification === 'error') {
                // Display error message
                notificationElement.innerText = "Invalid username or password.";
                setTimeout(function () {
                    notificationElement.innerText = "";
                }, 3000);
            }
        });
    </script>
</body>

</html>
