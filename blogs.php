<?php

session_start();
require('connect.php');
$query = $pdo->query("SELECT id, title, content, nameuser FROM blogs");
$results = $query->fetchAll(PDO::FETCH_ASSOC);
$count = count($results);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>OnTopic</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="modal fade" id="logout" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabel">You're going to logout</h1>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="logout.php"><button type="button" class="btn btn-success">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <span class="navbar-brand"><a href="index.php" class="text-white" style="text-decoration: none;">OnTopic</a></span>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="blogs.php" class="nav-link active">
                            Blogs
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (isset($_SESSION["loggedInUser"])): ?>
                                <li><a href="profile.php" class="dropdown-item"><i class="bi bi-person-circle"></i> Profile</a></li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION["loggedInUser"])): ?>
                                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout"><i class="bi bi-box-arrow-left"></i> Log
                                        Out</a></li>
                            <?php else: ?>
                                <li><a href="login.php" class="dropdown-item"><i class="bi bi-person-circle"></i> Log
                                        In</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-1" style="min-height: 100vh;">
        <div class="row">
            <?php foreach ($results as $result): ?>
                <div class='col-md-3 col-sm-6 mt-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'><?= $result['title'] ?></h5>
                            <h6 class='card-subtitle mb-2 text-muted'><?= $result['nameuser'] ?></h6>
                            <p class='card-text'><a href="blog.php?id=<?= $result['id'] ?>">Read more</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (isset($_SESSION["loggedInUser"])): ?>
            <div class="row justify-content-center">
                <div class="col-9 my-3">
                    <a href="blogcreate.php"><button type="button" class="btn btn-primary w-100"><i class="bi bi-plus-lg"></i></button></a>
                </div>
            </div>
        <?php endif; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>