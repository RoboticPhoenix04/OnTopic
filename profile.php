<?php

session_start();
if (!isset($_SESSION["loggedInUser"])) {
    header("Location: login.php");
    exit;
}

require('connect.php');
$query = $pdo->query("SELECT name, age, email, password FROM users WHERE id= {$_SESSION["loggedInUser"]}");
$result = $query->fetch(PDO::FETCH_ASSOC);

$name = $result['name'];

if (isset($_POST["delete"])) {
    $query = $pdo->query("DELETE FROM users WHERE id= {$_SESSION["loggedInUser"]}");
    $query = $pdo->query("DELETE FROM blogs WHERE iduser= {$_SESSION["loggedInUser"]}");
    header("Location: logout.php");
}

$dotcount = strlen($result['password']);
if (isset($_POST["visible"])) {
    $password = $result['password'];
} else {
    $password = "";
    for ($x = 1; $x <= $dotcount; $x++) {
        $password .= "●";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>OnTopic</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto mt-2">
                <button type="button" class="btn btn-primary"><a href="index.php" style="text-decoration: none; color: white"><i class="bi bi-arrow-return-left"></i></a></button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <i class="bi bi-person-circle" style="font-size: 6rem; color: grey"></i>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h1><?= $name ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><?= $result['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?= $result['age'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $result['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><?= $password ?>
                            <?php if (!isset($_POST['visible'])): ?>
                                <form method="post" id="passwordvisibility" class="d-inline">
                                    <button type="submit" form="passwordvisibility" name="visible" class="btn"><i class="bi bi-eye text-muted"></i></button>
                                </form>
                            <?php else: ?>
                                <a href="profile.php" style="text-decoration: none;"><button class="btn"><i class="bi bi-eye-slash text-muted"></i></button></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-1 d-flex-block">
                <span><a href="profileedit.php">Edit</a></span>
            </div>
            <div class="col-1 d-flex-block">
                <form method="post" id="delete">
                    <button type="submit" form="delete" name="delete" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>