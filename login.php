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
        $database = "ccs112lab";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $password = $_POST['password'];
        $username = $_POST['username'];

        $stmt = $conn->prepare("SELECT * FROM tblusers WHERE username = ? AND password = ?");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Kaisei+Tokumin&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Sticker Shop</title>
</head>

<body class="grey darken-4 white-text text-darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 offset-l3">
                <div class="card" style="background-image: url(images/imageRes/MononopolyWall.webp);">
                    <div class="card-content white-text">
                        <div class="login-form">
                            <form action="login.php" method="POST">
                                <h1 class="center">LOGIN</h1>
                                <div class="content">
                                    <div class="input-field">
                                        <input type="text" name="username" placeholder="Username" autocomplete="nope"> <!-- Add name attribute for username -->
                                    </div>
                                    <div class="input-field">
                                        <input type="password" name="password" placeholder="Password" autocomplete="new-password"> <!-- Add name attribute for password -->
                                        <div id="notification" style="color: #FF0000;"></div>
                                        <div class="action">
                                            <button type="submit" name="register">Register</button>
                                            <button type="submit">Sign in</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>