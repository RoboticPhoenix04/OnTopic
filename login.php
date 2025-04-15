<?php

session_start();
if (isset($_SESSION["loggedInUser"])) {
    header("Location: index.php");
    exit;
}

require('connect.php');
$invalid = "";
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $sql = "SELECT * FROM users WHERE email LIKE ? AND password LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["email"],  $_POST["password"]]);
    $login = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($login == false) {
        $invalid = "Invalid login!";
    } else {
        session_start();
        $_SESSION["loggedInUser"] = $login["id"];
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>OnTopic</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand"><a href="index.php" class="text-white" style="text-decoration: none;">OnTopic</a></span>
        </div>
    </nav>
    <div class="container-fluid bg-primary">
        <div class="row" style="min-height: 100vh;">
            <div class="col-sm text-white"></div>
            <div class="col-sm align-self-center bg-light border rounded p-3">
                <div class="p-3">
                    <h1>Login</h1>
                </div>
                <form method="post" id="loginform">
                    <div class="form-group">
                        <label for="emailinput">Email</label>
                        <input type="email" class="form-control" id="emailinput" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="wachtwoordinput">Password</label>
                        <input type="password" class="form-control" id="passwordinput" name="password" placeholder="Password">
                    </div>
                    <a href="register.php">Account aanmaken</a>
                    <p class="text-danger"><?= $invalid ?></p>
                    <button type="submit" class="btn btn-primary" form="loginform">Login</button>
                </form>
            </div>
            <div class="col-sm"></div>
        </div>
    </div>
    <footer>
        <div class="container-fluid bg-dark text-white p-3">
            <div class="row">
                <div class="col-md-2">
                    <h4>OnTopic</h4>
                    <p>© RoboticPhoenix04</p>
                </div>
                <div class="col-md-10 d-flex justify-content-center">
                    <div class="w-50">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel">
                                <p>This website is about sharing your interest, beliefs, culture and much more. You can use this website as you see fit but respect other users.</p>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel">
                                <p><i class="bi bi-envelope"></i> bit@info.com</p>
                                <p><i class="bi bi-telephone"></i> 06 40596832</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>