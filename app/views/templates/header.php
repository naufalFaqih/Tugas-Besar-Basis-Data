<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'];?></title>
   <link rel="stylesheet" href="<?= BASEURL ;?>/css/bootstrap.css">
</head>
<body>
<header class="bg-dark text-white p-3 text-center">
        <div class="container">
            <h1 class="display-4">Limbo</h1>
        </div>
    </header>


 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand " href="<?= BASEURL; ?>/home/index">
                <img src="<?= BASEURL; ?>/img/pngegg.png" alt="Nike Logo" width="50px" height="50px" >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/Product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/Category">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>