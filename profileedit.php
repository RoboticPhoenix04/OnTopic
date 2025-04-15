<?php

session_start();
if (!isset($_SESSION["loggedInUser"])) {
    header("Location: login.php");
    exit;
}

require('connect.php');
$query = $pdo->query("SELECT name, age, email, password FROM users WHERE id= {$_SESSION["loggedInUser"]}");
$result = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    if (!empty($_POST["age"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $sql = "UPDATE users SET age = ?, email = ?, password = ? WHERE id = {$_SESSION["loggedInUser"]}";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["age"], $_POST["email"], $_POST["password"]]);
        header("Location: profile.php");
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
    <div class="container-fluid" style="min-height: 100vh;">
        <div class="row">
            <div class="col-auto mt-2">
                <button type="button" class="btn btn-primary"><a href="profile.php" style="text-decoration: none; color: white"><i class="bi bi-arrow-return-left"></i></a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm text-white"></div>
            <div class="col-sm align-self-center">
                <div class="p-3">
                </div>
                <form method="post" id="profileeditform">
                    <div class="form-group">
                        <label for="nameinput">Name</label>
                        <input type="text" class="form-control" id="nameinput" name="name" value="<?= $result["name"] ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="ageinput">Age</label>
                        <input type="number" class="form-control" id="ageinput" name="age" value="<?= $result["age"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="emailinput">Email</label>
                        <input type="email" class="form-control" id="emailinput" name="email" value="<?= $result["email"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="wachtwoordinput">Password</label>
                        <input type="password" class="form-control" id="passwordinput" name="password" value="<?= $result["password"] ?>">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" onclick="myFunction()"> Show password
                    </div>
                    <button type="submit" class="btn btn-primary my-3" form="profileeditform" name="save">Save</button>
                </form>
            </div>
            <div class="col-sm"></div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("passwordinput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>